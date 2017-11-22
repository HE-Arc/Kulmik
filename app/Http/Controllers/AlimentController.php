<?php

namespace App\Http\Controllers;

use App\Aliment;
use App\Category;
use Illuminate\Http\Request;

class AlimentController extends Controller
{
  public function index(){
      $aliments = Aliment::all();
      $categories = Category::has('aliments')->get();
      return view('pages.aliments.index', compact('aliments', 'categories'));
  }

  public function show($id){
      $aliment = Aliment::findOrFail($id);
      return view('pages.aliments.show', compact('aliment'));
  }
}
