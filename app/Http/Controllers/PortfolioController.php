<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\JsonResponse;
use App\Services\Contracts\PortfolioInterface as PortfolioService;
use App\Http\Resources\PortfolioResource;
use App\Http\Requests\PortfolioRequest;

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
            $portfolios = $this->portfolioService->getAllSimplePaginatedWithParams($request);
            return $this->sendResponse(PortfolioResource::collection($portfolios), 'list of all portfolios');

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
    public function store(PortfolioRequest $request)
    {
        try {
            #store
            $portfolio = $this->portfolioService->create($request);
            return $this->sendResponse(new PortfolioResource($portfolio), 'portfolio created successfully');

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
            if(!$this->portfolioService->find($id)) {
                return $this->sendError('portfolio data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }

            return $this->sendResponse(new PortfolioResource($this->portfolioService->find($id)), 'portfolio details');

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
            if(!$this->portfolioService->find($id)) {
                return $this->sendError('portfolio data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }
            
            return $this->sendResponse(new PortfolioResource($this->portfolioService->find($id)), 'portfolio detail edit');

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
    public function update(PortfolioRequest $request, $id)
    {
        try {
            if(!$this->portfolioService->find($id)) {
                return $this->sendError('portfolio data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }

            #update
            $portfolio = $this->portfolioService->update($request, $id);
            return $this->sendResponse(new PortfolioResource($portfolio), 'portfolio updated successfully');

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
            if(!$this->portfolioService->find($id)) {
                return $this->sendError('portfolio data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }

            #delete
            $this->portfolioService->delete($id);
            return $this->sendResponse([], 'portfolio deleted successfully');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage(). ' - file - '.$e->getFile(). ' line '. $e->getLine());
        }
    }
}
