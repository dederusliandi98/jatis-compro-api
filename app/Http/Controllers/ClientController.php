<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\JsonResponse;
use App\Services\Contracts\ClientInterface as ClientService;
use App\Http\Resources\ClientResource;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    use JsonResponse;

    protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $clients = $this->clientService->getAllSimplePaginatedWithParams($request);
            return $this->sendResponse(ClientResource::collection($clients), 'list of all clients');

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
    public function store(ClientRequest $request)
    {
        try {
            #store
            $client = $this->clientService->create($request);
            return $this->sendResponse(new ClientResource($client), 'client created successfully');

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
            if(!$this->clientService->find($id)) {
                return $this->sendError('client data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }

            return $this->sendResponse(new ClientResource($this->clientService->find($id)), 'client details');

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
            if(!$this->clientService->find($id)) {
                return $this->sendError('client data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }
            
            return $this->sendResponse(new ClientResource($this->clientService->find($id)), 'client detail edit');

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
    public function update(ClientRequest $request, $id)
    {
        try {
            if(!$this->clientService->find($id)) {
                return $this->sendError('client data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }

            #update
            $client = $this->clientService->update($request, $id);
            return $this->sendResponse(new ClientResource($client), 'client updated successfully');

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
            if(!$this->clientService->find($id)) {
                return $this->sendError('client data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }

            #delete
            $this->clientService->delete($id);
            return $this->sendResponse([], 'client deleted successfully');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage(). ' - file - '.$e->getFile(). ' line '. $e->getLine());
        }
    }
}
