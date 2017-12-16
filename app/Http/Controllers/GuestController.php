<?php

namespace App\Http\Controllers;

use App\User;

use Carbon\Carbon;

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
      $user->email = 'guest' . Carbon::now()->toDateTimeString();
      $user->password = Hash::make('123456');
      $user->save();

      Auth::login($user);

      return redirect()->route('containers.index');
    }
}
