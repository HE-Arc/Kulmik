<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function createTempUser()
    {
      //Delete all olds temporary users
      $users = \App\User::where('name', 'Guest')->get();//where('name', '==', 'Guest')->get();
      foreach ($users as $user) {
        $user->delete();
      }

      //Create temporary user, login and redirect
      $user = new \App\User();
      $user->name = 'Guest';
      $user->email = 'guest' . \Carbon\Carbon::now()->toDateTimeString();
      $user->password = Hash::make('123456');
      $user->save();

      Artisan::call('db:seed');

      //$user = DB::table('users')->where('name', 'Guest')->get();

      Auth::login($user);

      return redirect('/');
    }
}
