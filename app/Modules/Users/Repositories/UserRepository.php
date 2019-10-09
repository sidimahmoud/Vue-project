<?php

namespace App\Modules\Users\Repositories;

use App\Modules\BaseRepository;
use League\Fractal\TransformerAbstract;
use App\Modules\Users\User;
use App\Modules\Users\Transfomers\UserTransfomer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository implements BaseRepository{
    /**
     * @var Model
     */
    protected $model;
    /**
     * @var array
     */
    protected $allowedIncludes = [];

    /**
     * @var array
     */
    protected $allowedFilters = [];

    /**
     * @var array
     */
    protected $exactFilters = [
        'id'
    ];

    /**
     * @var array
     */
    protected $allowedAppends = [];

    /**
     * @var array
     */
    protected $allowedSorts = [];

    /**
     * @var bool
     */
    protected $queryBuilderEnabled = true;


    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    /**
     * @return TransformerAbstract
     */
    public function getTransformer(): TransformerAbstract
    {
        return new UserTransformer;
    }

    /**
     * @return string
     */
    public function getResourceKey(): string
    {
        return 'users';
    }


    public function get(){
      return $this->model::all();
    }
    public function paginate(): LengthAwarePaginator{
      return $this->model::jsonPaginate();
    }
}
