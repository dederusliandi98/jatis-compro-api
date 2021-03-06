<?php

namespace App\Services;

use App\Repositories\Contracts\ClientInterface as ClientRepo;
use App\Services\Contracts\ClientInterface;
use Illuminate\Support\Facades\DB;
use Auth;
use Ramsey\Uuid\Uuid;
use App\Traits\Uploadable;

class ClientService implements ClientInterface
{    
    use Uploadable;

    protected $clientRepo;

    protected $image_path = 'upload_files/client';

    public function __construct(ClientRepo $clientRepo)
    {
        $this->clientRepo = $clientRepo;
    }

    public function getAllSimplePaginatedWithParams($params, $limit = 10)
    {
       return $this->clientRepo->getAllSimplePaginatedWithParams($params, $limit);
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
        return $this->clientRepo->find($id);
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

            return $this->clientRepo->create($input);
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
            $data = $this->find($id);
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

            return $this->clientRepo->update($input, $id);
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
        return $this->clientRepo->delete($id);
    }

    public function getAllWithParams($params)
    {
        return $this->clientRepo->getAllWithParams($params);
    }
}
