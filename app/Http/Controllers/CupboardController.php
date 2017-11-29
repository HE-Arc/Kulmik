<?php

namespace App\Http\Controllers;

use App\Aliment;
use App\Category;
use App\Cupboard;
use Illuminate\Http\Request;

class CupboardController extends Controller
{
    public function index(){

        $cupboards = Cupboard::all()->sortBy('id');
        $categories = Category::all()->sortBy('id');
        $aliments = Aliment::all()->sortBy('expiration_date');

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
        ]);

        Cupboard::create($request->all());
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
