<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\JsonResponse;
use App\Services\Contracts\ContactInterface as ContactService;
use App\Http\Resources\ContactResource;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    use JsonResponse;

    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $contacts = $this->contactService->getAllSimplePaginatedWithParams($request);
            return $this->sendResponse(ContactResource::collection($contacts), 'list of all contacts');

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
    public function store(ContactRequest $request)
    {
        try {
            #store
            $contact = $this->contactService->create($request);
            return $this->sendResponse(new ContactResource($contact), 'contact created successfully');

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
            if(!$this->contactService->find($id)) {
                return $this->sendError('contact data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }

            return $this->sendResponse(new ContactResource($this->contactService->find($id)), 'contact details');

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
            if(!$this->contactService->find($id)) {
                return $this->sendError('contact data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }

            #delete
            $this->contactService->delete($id);
            return $this->sendResponse([], 'contact deleted successfully');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage(). ' - file - '.$e->getFile(). ' line '. $e->getLine());
        }
    }
}
