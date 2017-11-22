@extends('layouts.master')

@section('content')
    <h1>This will show a single food description</h1>
    {{ $aliment->name }}
@endsection
