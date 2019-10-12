<?php

namespace App\Repositories\Users;

use App\User;

class EloquentUser implements UserRepository
{
    /**
     * @var User
     */
    private $model;
    /**
     * EloquentUser constructor.
     * @param User $model
     */
    public function __construct(User $model)
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
}
