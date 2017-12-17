<?php

namespace App\Http\Controllers;

use App\Aliment;
use App\Category;
use App\Cupboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CupboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        //In middleware?
        $user = 0;  //It's the non-logged user
        if( Auth::check() ){
            $user = Auth::user()->id;
        }

        $cupboards = Cupboard::where('user_id', $user)->get();
        $cupboards_id = $cupboards->pluck('id');

        $aliments = !$cupboards->isEmpty() ? Aliment::whereIn('cupboard_id', $cupboards_id)->get()->sortBy('expiration_date') : [];
        $categories = Category::all()->sortBy('id');

        return view('pages.cupboard.index', compact('cupboards', 'categories', 'aliments'));
    }

    //Show the add form
    public function create()
    {
      return view('pages.cupboard.create');
    }

    //Store an added resource
    public function store(Request $request)
    {
        //TODO more required
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

    //Display specified resource
    public function show($id)
    {
        $cupboard = Cupboard::findOrFail($id);
        return view('pages.cupboard.show', compact('cupboard'));
    }

    //Show the edit form
    public function edit($id)
    {
        $cupboard = Cupboard::findOrFail($id);
        return view('pages.cupboard.edit', compact('cupboard'));
    }

    public function update($id, Request $request)
    {
        //TODO more required
        $this->validate($request, [
            'name' => 'required',
        ]);

        $cupboard = Cupboard::find($id);
        $cupboard->update($request->all());
        return redirect()->route('containers.index')->with('success', 'Cupboard updated successfully');
    }

    public function destroy($id)
    {
        $cupboard = Cupboard::find($id);
        $cupboard->aliments()->delete();
        $cupboard->delete();
        return redirect()->route('containers.index')->with('success', 'Cupboard deleted successfully');
    }
}
