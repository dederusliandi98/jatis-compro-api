<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\JsonResponse;
use App\Services\Contracts\InformationInterface as InformationService;
use App\Http\Resources\InformationResource;
use App\Http\Requests\InformationRequest;

class InformationController extends Controller
{
    use JsonResponse;

    protected $informationService;

    public function __construct(InformationService $informationService)
    {
        $this->informationService = $informationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $information = $this->informationService->first();
            return $this->sendResponse(new InformationResource($information), 'list of all information');

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
    public function update(InformationRequest $request, $id)
    {
        try {
            if(!$this->informationService->find($id)) {
                return $this->sendError('information data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }

            #update
            $information = $this->informationService->update($request, $id);
            return $this->sendResponse(new InformationResource($information), 'information updated successfully');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage(). ' - file - '.$e->getFile(). ' line '. $e->getLine());
        }
    }
}
