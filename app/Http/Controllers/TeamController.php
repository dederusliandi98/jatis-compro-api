<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\JsonResponse;
use App\Services\Contracts\TeamInterface as TeamService;
use App\Http\Resources\TeamResource;
use App\Http\Requests\TeamRequest;

class TeamController extends Controller
{
    use JsonResponse;

    protected $teamService;

    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $teams = $this->teamService->getAllSimplePaginatedWithParams($request);
            return $this->sendResponse(TeamResource::collection($teams), 'list of all teams');

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
    public function store(TeamRequest $request)
    {
        try {
            #store
            $team = $this->teamService->create($request);
            return $this->sendResponse(new TeamResource($team), 'team created successfully');

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
            if(!$this->teamService->find($id)) {
                return $this->sendError('team data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }

            return $this->sendResponse(new TeamResource($this->teamService->find($id)), 'team details');

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
            if(!$this->teamService->find($id)) {
                return $this->sendError('team data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }
            
            return $this->sendResponse(new TeamResource($this->teamService->find($id)), 'team detail edit');

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
    public function update(TeamRequest $request, $id)
    {
        try {
            if(!$this->teamService->find($id)) {
                return $this->sendError('team data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }

            #update
            $team = $this->teamService->update($request, $id);
            return $this->sendResponse(new TeamResource($team), 'team updated successfully');

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
            if(!$this->teamService->find($id)) {
                return $this->sendError('team data not found', 404, config('constants.STATUS.CODE.NOT_FOUND'));
            }

            #delete
            $this->teamService->delete($id);
            return $this->sendResponse([], 'team deleted successfully');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage(). ' - file - '.$e->getFile(). ' line '. $e->getLine());
        }
    }
}
