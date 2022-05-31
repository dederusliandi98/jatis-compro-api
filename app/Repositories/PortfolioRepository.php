<?php

namespace App\Repositories;

use App\Models\Portfolio;
use App\Repositories\Contracts\PortfolioInterface;
use App\Repositories\BaseRepository;

class PortfolioRepository extends BaseRepository implements PortfolioInterface
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Portfolio $portfolio)
    {
        $this->model = $portfolio;
    }

    public function getAllSimplePaginatedWithParams($params, $limit = 10)
    {
        $portfolio = $this->model->with(['user']);
        if(isset($params->search) && !empty($params->search)) $portfolio->where('title', 'like', '%' . $params->search . '%');
        $portfolio = $portfolio->orderBy('created_at', 'DESC')->simplePaginate($limit);
        return $portfolio;
    }

    public function getAllWithParams($params)
    {
        $portfolio = $this->model->with(['user']);
        if(isset($params->search) && $params->search != null) $portfolio = $portfolio->where('title', 'like', '%' . $params->search . '%');
        $portfolio = $portfolio->orderBy('created_at', 'DESC');
        return $portfolio;
    }

    public function find($id)
    {
        return $this->model->with(['user'])->find($id);
    }
}
