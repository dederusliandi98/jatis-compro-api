<?php

namespace App\Services\Contracts;

interface TestimonialInterface
{
    public function find($id);
    
    public function create($request);

    public function update($request, $id);

    public function delete($id);
}
