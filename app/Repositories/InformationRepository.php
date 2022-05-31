<?php

namespace App\Repositories;

use App\Models\Information;
use App\Repositories\Contracts\InformationInterface;
use App\Repositories\BaseRepository;

class InformationRepository extends BaseRepository implements InformationInterface
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Information $information)
    {
        $this->model = $information;
    }

    public function find($id)
    {
        return $this->model->with(['user'])->find($id);
    }
}
