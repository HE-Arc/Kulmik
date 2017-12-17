<?php

namespace App\Http\Controllers;

use App\Aliment;
use App\Category;
use App\Cupboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

//http://carbon.nesbot.com/docs/

class AlimentController extends Controller
{
  //Display all by category
  public function index(){
      //In middleware?
      $user = 0;  //It's the non-logged user
      if( Auth::check() ){
          $user = Auth::user()->id;
      }

      $cupboards = Cupboard::where('user_id', $user)->get();
      $cupboards_id = $cupboards->pluck('id');

      $aliments = !$cupboards->isEmpty() ? Aliment::whereIn('cupboard_id', $cupboards_id)->get()->sortBy('expiration_date') : [];
      $categories = Category::has('aliments')->get();

      return view('pages.aliments.index', compact('aliments', 'categories'));
  }

  public function expiredFood(){

      //get cupboard name
      $user = 0;  //It's the non-logged user
      if( Auth::check() ){
          $user = Auth::user()->id;
      }

      $cupboards = Cupboard::where('user_id', $user);
      $cupboards_id = $cupboards->pluck('id');

      //region const

      $d1 = Carbon::today()->startOfDay();
      $d2 = Carbon::today()->endOfDay();

      $tomorrow = Carbon::tomorrow();
      $thisWeek = Carbon::today()->addWeek(1);

      $todayRange = [$d1, $d2];
      $oneWeekRange = [$tomorrow, $thisWeek];

      //endregion const

      //https://laracasts.com/discuss/channels/laravel/where-between-dates-selection
      $expired = Aliment::all()
          ->whereIn('cupboard_id', $cupboards_id)
          ->where('expiration_date', '<', $d1)
          ->sortBy('expiration_date');

      $today = Aliment::query()
          ->whereIn('cupboard_id', $cupboards_id)
          ->whereBetween('expiration_date', $todayRange, 'and', false)
          ->get()->sortBy('expiration_date');

      $expiresThisWeek = Aliment::query()
          ->whereIn('cupboard_id', $cupboards_id)
          ->whereBetween('expiration_date', $oneWeekRange, 'and', false)
          ->get()->sortBy('expiration_date');

      return view('welcome', compact('expired', 'today', 'expiresThisWeek', 'cupboards'));
  }


  //Show the add form
  public function create($default=null)
  {
      $categories = Category::pluck('name', 'id');

      $user = 0;  //It's the non-logged user
      if( Auth::check() ){
          $user = Auth::user()->id;
      }

      $cupboards = Cupboard::where('user_id', $user)->pluck('name', 'id');
      return view('pages.aliments.create', compact('categories', 'cupboards', 'default'));
  }

  //Store an added resource
  public function store(Request $request)
  {
      //TODO more required
      $this->validate($request, [
          'name' => 'required',
          'weight' => 'required',
          'quantity' => 'required',
          'buy_date' => 'required',
          'expiration_date' => 'required'
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
