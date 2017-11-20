@extends('layouts.master')

@section('content')
    <h1>This page will show all food, sorted</h1>
    Classification by:
    @foreach ($aliments as $aliment)
        <h2>{{ $aliment->name }}</h2>
        <p>{{ $aliment->description }}</p>
    @endforeach
@endsection
