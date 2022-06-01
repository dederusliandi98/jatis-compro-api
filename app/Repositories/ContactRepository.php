<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\Contracts\ContactInterface;
use App\Repositories\BaseRepository;

class ContactRepository extends BaseRepository implements ContactInterface
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Contact $contact)
    {
        $this->model = $contact;
    }

    public function getAllSimplePaginatedWithParams($params, $limit = 10)
    {
        $contact = $this->model;
        if(isset($params->search) && !empty($params->search)) $contact = $contact->where('name', 'like', '%' . $params->search . '%');
        $contact = $contact->orderBy('created_at', 'DESC')->simplePaginate($limit);
        return $contact;
    }

    public function getAllWithParams($params)
    {
        $contact = $this->model;
        if(isset($params->search) && $params->search != null) $contact = $contact->where('name', 'like', '%' . $params->search . '%');
        $contact = $contact->orderBy('created_at', 'DESC');
        return $contact;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
}
