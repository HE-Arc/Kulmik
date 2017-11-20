<?php

namespace App\Http\Controllers;

use App\Aliment;
use Illuminate\Http\Request;

class AlimentController extends Controller
{
  public function index(){

      $aliments = Aliment::all();
      return view('pages.aliments.index', compact('aliments'));
  }

  public function show(){
      return view('pages.aliments.show');
  }
}
