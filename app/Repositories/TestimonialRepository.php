<?php

namespace App\Repositories;

use App\Models\Testimonial;
use App\Repositories\Contracts\TestimonialInterface;
use App\Repositories\BaseRepository;

class TestimonialRepository extends BaseRepository implements TestimonialInterface
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Testimonial $testimonial)
    {
        $this->model = $testimonial;
    }

    public function getAllSimplePaginatedWithParams($params, $limit = 10)
    {
        $testimonial = $this->model->with(['user']);
        if(isset($params->search) && !empty($params->search)) $testimonial->where('name', 'like', '%' . $params->search . '%');
        $testimonial = $testimonial->orderBy('created_at', 'DESC')->simplePaginate($limit);
        return $testimonial;
    }

    public function getAllWithParams($params)
    {
        $testimonial = $this->model->with(['user']);
        if(isset($params->search) && $params->search != null) $testimonial = $testimonial->where('name', 'like', '%' . $params->search . '%');
        $testimonial = $testimonial->orderBy('created_at', 'DESC');
        return $testimonial;
    }

    public function find($id)
    {
        return $this->model->with(['user'])->find($id);
    }
}
