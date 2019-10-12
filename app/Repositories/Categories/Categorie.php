<?php

namespace App\Repositories\Categories;

use Illuminate\Database\Eloquent\Model;

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
}
