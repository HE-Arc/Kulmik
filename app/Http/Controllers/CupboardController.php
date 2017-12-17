<?php

namespace App\Http\Controllers;

use App\Aliment;
use App\Category;
use App\Cupboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CupboardController extends Controller
{
        /** constructor */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** Display cupboard by descendant creation date order */
    public function index(){
        $cupboards = [];
        $categories = [];
        $aliments = [];

        if(Auth::check()){
            $user = Auth::user();
            $cupboards = $user->cupboards();
            $aliments = $user->aliments();
            $categories = Category::all()->sortBy('id');

            $cupboards = $cupboards->get();
            $aliments = $aliments->get();
        }

        return view('pages.cupboard.index', compact('cupboards', 'categories', 'aliments'));
    }

    /** FORM: new Cupboard */
    public function create()
    {
      return view('pages.cupboard.create');
    }

    /** FORM: store Cupboard resources */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'temperature' => 'required',
            'volume' => 'required'
        ]);

        $user = 0;
        if(Auth::check()){
          $user = Auth::user()->id;
        }
        Cupboard::create($request->all() + ['user_id' => $user]);
        return redirect()->route('containers.index')->with('success', 'Cupboard added successfully');
    }

    /** SHOW: show Cupboard using ID */
    public function show($id)
    {
        $cupboard = Cupboard::findOrFail($id);
        return view('pages.cupboard.show', compact('cupboard'));
    }

    /** FORM: edit Cupboard */
    public function edit($id)
    {
        $cupboard = Cupboard::findOrFail($id);
        return view('pages.cupboard.edit', compact('cupboard'));
    }

    /** FORM: update Cupboard */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'temperature' => 'required',
            'volume' => 'required'
        ]);

        $cupboard = Cupboard::find($id);
        $cupboard->update($request->all());
        return redirect()->route('containers.index')->with('success', 'Cupboard updated successfully');
    }

    /** FORM: destroy Cupboard */
    public function destroy($id)
    {
        $cupboard = Cupboard::find($id);
        $cupboard->aliments()->delete();
        $cupboard->delete();
        return redirect()->route('containers.index')->with('success', 'Cupboard deleted successfully');
    }
}
