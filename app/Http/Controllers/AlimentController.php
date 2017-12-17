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
    /** Display food by category */
    public function index(){
      $categories = [];
      $aliments = [];
      $cupboards = [];

      if(Auth::check()){
          $user = Auth::user();
          $aliments = $user->aliments();
          $categories = Category::all()->sortBy('id');

          $cupboards = $user->cupboards();
          $cupboards_id = $cupboards->pluck('id');

          $aliments = $aliments->get();
      }

      return view('pages.aliments.index', compact('aliments', 'categories', 'cupboards_id'));
    }

    /** Get expired food and split them into three categories */
    public function expiredFood(){
      $expired = [];
      $today = [];
      $expiresThisWeek = [];
      $cupboards = [];

      if( Auth::check() ){
        //Get user aliments
        $user = Auth::user();
        $cupboards = $user->cupboards();
        $cupboards_id = $cupboards->pluck('id');
        $aliments = $user->aliments();

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
    }

      return view('welcome', compact('expired', 'today', 'expiresThisWeek', 'cupboards'));
    }

    /** FORM: new Aliment */
    public function create($default=null){
      $cupboards = [];
      $categories = Category::pluck('name', 'id');

      if( Auth::check() ){
          $user = Auth::user();
          $cupboards = $user->cupboards();
      }

      return view('pages.aliments.create', compact('categories', 'cupboards', 'default'));
    }

    /** FORM: store Aliment resources */
    public function store(Request $request){
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

    /** SHOW: show Aliment*/
     public function show($id){
      $aliment = Aliment::findOrFail($id);
      return view('pages.aliments.show', compact('aliment'));
    }

    /** FORM: edit Aliment */
    public function edit($id){
        $aliment = Aliment::findOrFail($id);
        $categories = Category::pluck('name', 'id');
        $cupboards = Cupboard::pluck('name', 'id');
        return view('pages.aliments.edit', compact('aliment', 'categories', 'cupboards'));
    }

    /** FORM: update Aliment */
    public function update($id, Request $request){
      $this->validate($request, [
          'name' => 'required',
          'weight' => 'required',
          'quantity' => 'required',
          'buy_date' => 'required',
          'expiration_date' => 'required'
      ]);

      $aliment = Aliment::find($id);
      $aliment->cupboard_id = $request->cupboard_id;
      $aliment->update($request->all());
      return redirect()->route('aliments.index')->with('success', 'Aliment updated successfully');
    }

    /** FORM: destroy Aliment */
    public function destroy($id){
      Aliment::find($id)->delete();
      return redirect()->route('aliments.index')->with('success', 'Aliment deleted successfully');
    }
}
