<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aliment extends Model
{
  protected $fillable = [
      'name', 'weight', 'quantity', 'buy_date', 'expiration_date',
  ];

  public function category()
  {
      return $this->belongsTo('App\Category');
  }
}
