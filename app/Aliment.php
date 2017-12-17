<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Aliment extends Model
{
  protected $fillable = [
      'name', 'weight', 'quantity', 'buy_date', 'expiration_date', 'cupboard_id', 'category_id'
  ];

  protected $dates = ['buy_date', 'expiration_date'];

  public function category()
  {
      return $this->belongsTo('App\Category');
  }

  public function cupboard()
  {
      return $this->belongsTo('App\Cupboard');
  }
}
