<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\JsonResponse;
use App\Services\Contracts\TestimonialInterface as TestimonialService;
use App\Http\Resources\TestimonialResource;
use App\Http\Requests\TestimonialRequest;

class TestimonialController extends Controller
{
    use JsonResponse;

    protected $testimonialService;

    public function __construct(TestimonialService $testimonialService)
    {
        $this->testimonialService = $testimonialService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $testimonials = $this->testimonialService->getAllSimplePaginatedWithParams($request);
            return $this->sendResponse(TestimonialResource::collection($testimonials), 'list of all testimonials');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage(). ' - file - '.$e->getFile(). ' line '. $e->getLine());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        try {
            #store
            $testimonial = $this->testimonialService->create($request);
            return $this->sendResponse(new TestimonialResource($testimonial), 'testimonial created successfully');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage(). ' - file - '.$e->getFile(). ' line '. $e->getLine());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            if(!$this->testimonialService->find($id)) {
                return $this->sendError('testimonial data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }

            return $this->sendResponse(new TestimonialResource($this->testimonialService->find($id)), 'testimonial details');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage(). ' - file - '.$e->getFile(). ' line '. $e->getLine());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
       try {
            if(!$this->testimonialService->find($id)) {
                return $this->sendError('testimonial data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }
            
            return $this->sendResponse(new TestimonialResource($this->testimonialService->find($id)), 'testimonial detail edit');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage(). ' - file - '.$e->getFile(). ' line '. $e->getLine());
        }
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, $id)
    {
        try {
            if(!$this->testimonialService->find($id)) {
                return $this->sendError('testimonial data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }

            #update
            $testimonial = $this->testimonialService->update($request, $id);
            return $this->sendResponse(new TestimonialResource($testimonial), 'testimonial updated successfully');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage(). ' - file - '.$e->getFile(). ' line '. $e->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if(!$this->testimonialService->find($id)) {
                return $this->sendError('testimonial data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }

            #delete
            $this->testimonialService->delete($id);
            return $this->sendResponse([], 'testimonial deleted successfully');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage(). ' - file - '.$e->getFile(). ' line '. $e->getLine());
        }
    }
}
