<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupboard extends Model
{
  protected $fillable = [
      'name', 'description', 'temperature', 'volume',
  ];
}
