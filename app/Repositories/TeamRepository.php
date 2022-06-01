<?php

namespace App\Repositories;

use App\Models\Team;
use App\Repositories\Contracts\TeamInterface;
use App\Repositories\BaseRepository;

class TeamRepository extends BaseRepository implements TeamInterface
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Team $team)
    {
        $this->model = $team;
    }

    public function getAllSimplePaginatedWithParams($params, $limit = 10)
    {
        $team = $this->model->with(['user']);
        if(isset($params->search) && !empty($params->search)) $team->where('name', 'like', '%' . $params->search . '%');
        $team = $team->orderBy('created_at', 'DESC')->simplePaginate($limit);
        return $team;
    }

    public function getAllWithParams($params)
    {
        $team = $this->model->with(['user']);
        if(isset($params->search) && $params->search != null) $team = $team->where('name', 'like', '%' . $params->search . '%');
        $team = $team->orderBy('created_at', 'DESC')->get();
        return $team;
    }

    public function find($id)
    {
        return $this->model->with(['user'])->find($id);
    }
}
