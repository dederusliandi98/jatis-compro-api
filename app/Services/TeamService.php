<?php

namespace App\Services;

use App\Repositories\Contracts\TeamInterface as TeamRepo;
use App\Services\Contracts\TeamInterface;
use Illuminate\Support\Facades\DB;
use Auth;
use Ramsey\Uuid\Uuid;
use App\Traits\Uploadable;

class TeamService implements TeamInterface
{    
    use Uploadable;

    protected $teamRepo;

    protected $image_path = 'upload_files/team';

    public function __construct(TeamRepo $teamRepo)
    {
        $this->teamRepo = $teamRepo;
    }

    public function getAllSimplePaginatedWithParams($params, $limit = 10)
    {
       return $this->teamRepo->getAllSimplePaginatedWithParams($params, $limit);
    }

     /**
     * Find data by id
     *
     * @param $id
     * @param array $columns
     * 
     * @return mixed
     */
    public function find($id)
    {
        return $this->teamRepo->find($id);
    }
    
    /**
     * @param $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function create($request)
    {
        $permissions = DB::transaction(function () use ($request) {
            $input = $request->all();
            $input['id'] = Uuid::uuid4()->getHex();
            $input['user_id'] = 1;

            if($request->hasFile('image')) {
                $file = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $filename = $this->uploadFile($request->file('image'), $filename, $this->image_path);
                $input['image'] = $filename;
            }

            return $this->teamRepo->create($input);
        });

        return $permissions;
    }

     /**
     * @param $id
     * @param $request
     *
     * @return mixed
     * @throws \Throwable
    */
    public function update($request, $id)
    {
        $permissions = DB::transaction(function () use ($request, $id) {
            $input = $request->except('_token','_method');
            $input['user_id'] = 1;

            if($request->hasFile('image')) {
                #remove image
                $this->deleteFile($data->image, $this->image_path);
                #upload file
                $file = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $filename = $this->uploadFile($request->file('image'), $filename, $this->image_path);
                $input['image'] = $filename;
            }
            
            return $this->teamRepo->update($input, $id);
        });

        return $permissions;
    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function delete($id)
    {
        return $this->teamRepo->delete($id);
    }
}
