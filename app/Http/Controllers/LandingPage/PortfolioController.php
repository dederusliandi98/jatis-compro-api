<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\JsonResponse;
use App\Services\Contracts\PortfolioInterface as PortfolioService;
use App\Http\Resources\PortfolioResource;

class PortfolioController extends Controller
{
    use JsonResponse;

    protected $portfolioService;

    public function __construct(PortfolioService $portfolioService)
    {
        $this->portfolioService = $portfolioService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $portfolios = $this->portfolioService->getAllWithParams($request);
            return $this->sendResponse(PortfolioResource::collection($portfolios), 'list of all portfolios');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage(). ' - file - '.$e->getFile(). ' line '. $e->getLine());
        }
    }
}
