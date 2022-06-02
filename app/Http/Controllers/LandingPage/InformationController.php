<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\JsonResponse;
use App\Services\Contracts\InformationInterface as InformationService;
use App\Http\Resources\InformationResource;

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
            return $this->sendResponse(new InformationResource($information), 'Detail Information');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage(). ' - file - '.$e->getFile(). ' line '. $e->getLine());
        }
    }   
}
