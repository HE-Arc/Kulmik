@extends('layouts.master')

@section('content')
  <h1>Bienvenue sur Kulmik</h1>
  <p>Présentation du produit : Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  <p>Essayer le : <a href="{{ url('/containers') }}" class="btn btn-xs btn-info">Essayer</a></p>
  <p>Ça m'intéresse, je signe : <a href="{{ url('/home') }}" class="btn btn-xs btn-info">S'inscrire</a></p>
@endsection
