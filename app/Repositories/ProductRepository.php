<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductInterface;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductInterface
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getAllSimplePaginatedWithParams($params, $limit = 10)
    {
        $product = $this->model->with(['user']);
        if(isset($params->search) && !empty($params->search)) $product->where('title', 'like', '%' . $params->search . '%');
        $product = $product->orderBy('created_at', 'DESC')->simplePaginate($limit);
        return $product;
    }

    public function getAllWithParams($params)
    {
        $product = $this->model->with(['user']);
        if(isset($params->search) && $params->search != null) $product = $product->where('title', 'like', '%' . $params->search . '%');
        $product = $product->orderBy('created_at', 'DESC');
        return $product;
    }

    public function find($id)
    {
        return $this->model->with(['user'])->find($id);
    }
}
