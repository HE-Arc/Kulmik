<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Category;

class CategoryController extends Controller
{
    public function index(){

        return view('pages.category.index');
    }

    public function show(){

        return view('pages.category.show');
    }
}
