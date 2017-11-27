<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Aliment extends Model
{
  protected $fillable = [
      'name', 'weight', 'quantity', 'buy_date', 'expiration_date', 'cupboard_id', 'category_id'
  ];

  public function category()
  {
      return $this->belongsTo('App\Category');
  }

  public function hasExpired($stage){
      $today = Carbon::now();
      $expire_date = Carbon::createFromFormat("Y-m-d", $this->expiration_date);
      $data_difference = $today->diffInDays($expire_date, false);

      switch ($stage){

          case "expired":   //expired
              if($data_difference < 0){ return $this; }
              break;
          case "today":     //expires today
              if($data_difference == 0){ return $this; }
              break;
          case "stage3":    //2-1
              if($data_difference < 3 && $data_difference > 0){ return $this;}
              break;
          case "stage2":   //3-5
              if($data_difference >= 3 && $data_difference <= 5) { return $this; }
              break;
          case "stage1":   //6-10
              if($data_difference > 5 && $data_difference <= 10){ return $this; }
              break;
          default:  //we're good
              return null;
              break;
      }
      return null;
  }
}
