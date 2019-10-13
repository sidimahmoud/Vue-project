<?php

namespace App\Repositories\Cars;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Categories\Categorie;
use App\Repositories\Users\User;

class Car extends Model
{
  const STATUS = [
      'ACCEPTED' => 1,
      'PENDING' => 2,
      'REFUSED' => 2,
  ];
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'categorie_id','model','year','price','mileage','picture','user_id','status'
  ];
  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function categories()
  {
      return $this->belongsTo(Categorie::class, 'categorie_id', 'id');
  }
  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user()
  {
      return $this->belongsTo(User::class, 'user_id', 'id');
  }
}
