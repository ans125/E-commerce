<?php


namespace App\Interfaces\Repositories;
// namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->paginate();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
        // eturn category::create($data);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($id, array $data)
    {
        $category = $this->find($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        $category = $this->find($id);
        return $category->delete();
    }
     public function searchByName($keyword)
    {
        return $this->model->where('name', 'like', '%' . $keyword . '%')->get();
    }
}
