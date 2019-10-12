<?php

namespace App\Repositories\Categories;

use App\Repositories\Categories\Categorie;
use App\Repositories\BaseRepository;
class CategorieRepository implements BaseRepository
{
    /**
     * @var Categorie
     */
    private $model;
    /**
     * EloquentUser constructor.
     * @param Categorie $model
     */
    public function __construct(Categorie $model)
    {
        $this->model = $model;
    }
    public function getAll()
    {
        return $this->model->all();
    }
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }
    public function update($id, array $attributes)
    {
        $todo = $this->getById($id);
        $todo->update($attributes);
        return $todo;
    }
    public function delete($id)
    {
        $this->getById($id)->delete();
        return true;
    }
    public function paginate(){
      return $this->model->paginate();
    }
}
