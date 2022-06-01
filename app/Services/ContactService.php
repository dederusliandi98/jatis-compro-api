<?php

namespace App\Services;

use App\Repositories\Contracts\ContactInterface as ContactRepo;
use App\Services\Contracts\ContactInterface;
use Illuminate\Support\Facades\DB;
use Auth;
use Ramsey\Uuid\Uuid;

class ContactService implements ContactInterface
{    
    protected $contactRepo;

    public function __construct(ContactRepo $contactRepo)
    {
        $this->contactRepo = $contactRepo;
    }

    public function getAllSimplePaginatedWithParams($params, $limit = 10)
    {
       return $this->contactRepo->getAllSimplePaginatedWithParams($params, $limit);
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
        return $this->contactRepo->find($id);
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
            return $this->contactRepo->create($input);
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
            return $this->contactRepo->update($input, $id);
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
        return $this->contactRepo->delete($id);
    }
}
