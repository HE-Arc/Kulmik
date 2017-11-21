@extends('layouts.master')

@section('content')
  <h1>Welcome to Kulmik!</h1>
  <p>Have you ever felt confused standing before a shelf in a supermarket when doing your groceries? Thinking:
    <br/>
    <i>"Have I some potatoes left at home? Ugh! I can't remember what's in my fridge!"</i>.
    Then bought an extra 1kg thinking there were none left, but you came home discovering worth a month behind your door?
  </p>
  <p>
    Do you have some hard time keeping your food's expiration date in mind? I remember the time my onions began to sprout
   in my fridge, and I felt bad having to throw them away.</p>
  <p>
    If the situations mentioned above sound familiar to you, say no more! This app is made for you!
  </p>
  <p>
    You can list all your fridges, shelves and cupboards' content in one place! <b>Isn't it amazing?</b>
  </p>

  <p>Try it here: <a href="{{ url('/containers') }}" class="btn btn-xs btn-info">Ok, I'm in!</a></p>
  <p>Wow this app is so cool I'm gonna <a href="{{ url('/home') }}" class="btn btn-xs btn-info">register</a></p>

  <!--TODO: Aliments grouped by expiration date with a warning note -->

@endsection
