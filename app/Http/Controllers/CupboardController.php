<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CupboardController extends Controller
{
    public function index(){
        return view('pages.cupboard.index');
    }
}
