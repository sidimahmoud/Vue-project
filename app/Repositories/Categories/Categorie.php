<?php

namespace App\Repositories\Categories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Cars\Car;
class Categorie extends Model
{
    //categorie
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'categorie'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
