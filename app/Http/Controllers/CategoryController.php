<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Category;

class CategoryController extends Controller
{
    /** constructor */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** Display categories */
    public function index(){

        return view('pages.category.index');
    }

    /** SHOW: show Category */
    public function show(){

        return view('pages.category.show');
    }
}
