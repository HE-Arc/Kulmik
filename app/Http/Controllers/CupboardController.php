<?php

namespace App\Http\Controllers;

use App\Aliment;
use App\Category;
use App\Cupboard;
use Illuminate\Http\Request;

class CupboardController extends Controller
{
    public function index(){

        $cupboards = Cupboard::all();
        $categories = Category::all();
        $aliments = Aliment::all();

        return view('pages.cupboard.index', compact('cupboards', 'categories', 'aliments'));
    }
}
