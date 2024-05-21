<?php

// app/Interfaces/CategoryRepositoryInterface

namespace App\Interfaces;

interface CategoryRepositoryInterface
{
    public function all();
    public function create(array $data);
    public function find($id);
    public function update($id, array $data);
    public function delete($id);

    public function searchByName($keyword);
}
