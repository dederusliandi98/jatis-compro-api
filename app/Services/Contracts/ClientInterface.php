<?php

namespace App\Services\Contracts;

interface ClientInterface
{
    public function find($id);
    
    public function create($request);

    public function update($request, $id);

    public function delete($id);
}
