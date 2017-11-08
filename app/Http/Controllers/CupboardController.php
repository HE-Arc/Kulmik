<?php

namespace App\Http\Controllers;

use App\Cupboard;
use Illuminate\Http\Request;

class CupboardController extends Controller
{
    public function index(){

        $cupboards = Cupboard::all();

        return view('pages.cupboard.index', compact('cupboards'));
    }
}
