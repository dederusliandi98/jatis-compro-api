<?php

namespace App\Services\Contracts;

interface InformationInterface
{
    public function find($id);
    
    public function create($request);

    public function update($request, $id);

    public function delete($id);
}
