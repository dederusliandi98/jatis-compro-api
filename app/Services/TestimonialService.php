<?php

namespace App\Services;

use App\Repositories\Contracts\TestimonialInterface as TestimonialRepo;
use App\Services\Contracts\TestimonialInterface;
use Illuminate\Support\Facades\DB;
use Auth;
use Ramsey\Uuid\Uuid;
use App\Traits\Uploadable;

class TestimonialService implements TestimonialInterface
{    
    use Uploadable;

    protected $testimonialRepo;

    protected $image_path = 'upload_files/testimonial';

    public function __construct(TestimonialRepo $testimonialRepo)
    {
        $this->testimonialRepo = $testimonialRepo;
    }

    public function getAllSimplePaginatedWithParams($params, $limit = 10)
    {
       return $this->testimonialRepo->getAllSimplePaginatedWithParams($params, $limit);
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
        return $this->testimonialRepo->find($id);
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
            $input['user_id'] = Auth::user()->id;

            if($request->hasFile('image')) {
                $file = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $filename = $this->uploadFile($request->file('image'), $filename, $this->image_path);
                $input['image'] = $filename;
            }

            return $this->testimonialRepo->create($input);
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
            $input['user_id'] = Auth::user()->id;

            if($request->hasFile('image')) {
                #remove image
                $this->deleteFile($data->image, $this->image_path);
                #upload file
                $file = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $filename = $this->uploadFile($request->file('image'), $filename, $this->image_path);
                $input['image'] = $filename;
            }

            return $this->testimonialRepo->update($input, $id);
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
        return $this->testimonialRepo->delete($id);
    }
}
