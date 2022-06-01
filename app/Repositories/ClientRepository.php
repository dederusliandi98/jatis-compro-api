<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Contracts\ClientInterface;
use App\Repositories\BaseRepository;

class ClientRepository extends BaseRepository implements ClientInterface
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Client $client)
    {
        $this->model = $client;
    }

    public function getAllSimplePaginatedWithParams($params, $limit = 10)
    {
        $client = $this->model->with(['user']);
        if(isset($params->search) && !empty($params->search)) $client->where('title', 'like', '%' . $params->search . '%');
        $client = $client->orderBy('created_at', 'DESC')->simplePaginate($limit);
        return $client;
    }

    public function getAllWithParams($params)
    {
        $client = $this->model->with(['user']);
        if(isset($params->search) && $params->search != null) $client = $client->where('title', 'like', '%' . $params->search . '%');
        $client = $client->orderBy('created_at', 'DESC')->get();
        return $client;
    }

    public function find($id)
    {
        return $this->model->with(['user'])->find($id);
    }
}
