<?php

namespace App\Repositories\Cars;

use App\Repositories\Cars\Car;
use App\Repositories\BaseRepository;

class CarRepository implements BaseRepository
{
    /**
     * @var Car
     */
    private $model;
    /**
     * CategorieRepository constructor.
     * @param Car $model
     */
    public function __construct(Car $model)
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
