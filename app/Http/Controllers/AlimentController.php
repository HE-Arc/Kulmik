<?php

namespace App\Http\Controllers;

use App\Aliment;
use App\Category;
use App\Cupboard;
use Illuminate\Http\Request;

class AlimentController extends Controller
{
  //Display all by category
  public function index(){
      $aliments = Aliment::all();
      $categories = Category::has('aliments')->get();
      return view('pages.aliments.index', compact('aliments', 'categories'));
  }

  //Show the add form
  public function create()
  {
    $categories = Category::pluck('name', 'id');
    $cupboards = Cupboard::pluck('name', 'id');
    return view('pages.aliments.create', compact('categories', 'cupboards'));
  }

  //Store an added resource
  public function store(Request $request)
  {
      //TODO more required
      $this->validate($request, [
          'name' => 'required',
      ]);

      Aliment::create($request->all());
      return redirect()->route('aliments.index')->with('success', 'Aliment added successfully');
  }

  //Display specified resource
  public function show($id)
  {
      $aliment = Aliment::findOrFail($id);
      return view('pages.aliments.show', compact('aliment'));
  }

  //Show the edit form
  public function edit($id)
  {
      $aliment = Aliment::findOrFail($id);
      $categories = Category::pluck('name', 'id');
      $cupboards = Cupboard::pluck('name', 'id');
      return view('pages.aliments.edit', compact('aliment', 'categories', 'cupboards'));
  }

  public function update($id, Request $request)
  {
      //dd($request->all());
      //TODO more required
      $this->validate($request, [
          'name' => 'required',
      ]);

      $aliment = Aliment::find($id);
      $aliment->cupboard_id = $request->cupboard_id;
      $aliment->update($request->all());
      return redirect()->route('aliments.index')->with('success', 'Aliment updated successfully');
  }

  public function destroy($id)
  {
      Aliment::find($id)->delete();
      return redirect()->route('aliments.index')->with('success', 'Aliment deleted successfully');
  }
}
