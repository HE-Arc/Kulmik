<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodController extends Controller
{
  public function index(){
      return view('pages.food.index');
  }

  public function show(){
      return view('pages.food.show');
  }
}
