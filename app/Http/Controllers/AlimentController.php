<?php

namespace App\Http\Controllers;

use App\Aliment;
use App\Category;
use App\Cupboard;
use Illuminate\Http\Request;
use Carbon\Carbon;

//http://carbon.nesbot.com/docs/

class AlimentController extends Controller
{
  //Display all by category
  public function index(){
      $aliments = Aliment::all();
      $categories = Category::has('aliments')->get();
      return view('pages.aliments.index', compact('aliments', 'categories'));
  }

  public function expiredFood(){

      //region const
      $d1 = Carbon::today()->startOfDay();
      $d2 = Carbon::today()->endOfDay();

      $tomorrow = Carbon::tomorrow()->endOfDay();


      $thisWeek = Carbon::today()->addWeek(1);
      //endregion const

      $expired = Aliment::all()->where('expiration_date', '<=', $tomorrow);  //future

      $today = Aliment::all()->where('expiration_date', '>=', $d1)       //past
                                ->where('expiration_date', '<', $d2);   //future

      $expiresThisWeek = Aliment::all()
          ->where('expiration_date', '>=', $d2)         //'past'
          ->where('expiration_date', '<', $thisWeek);   //future

      return view('welcome', compact('expired', 'today', 'expiresThisWeek',
          'd1', 'd2', 'tomorrow', 'thisWeek'));
  }


  //Show the add form
  public function create($default=null)
  {
    $categories = Category::pluck('name', 'id');
    $cupboards = Cupboard::pluck('name', 'id');
    return view('pages.aliments.create', compact('categories', 'cupboards', 'default'));
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
