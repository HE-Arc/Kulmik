@extends('layouts.master')

@section('content')
    <h1>Fridges list</h1>
    @foreach ($cupboards as $cupboard)
        <h2>{{ $cupboard->name }}</h2>
        <p>{{ $cupboard->description }}</p>
    @endforeach

@endsection