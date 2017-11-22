@extends('layouts.master')

@section('content')

    <h1>All your food is here</h1>
    Do you wan't to add an aliment : <button class="btn btn-xs btn-info">Add an aliment</button>

    @foreach($categories as $category)
        <div class="container">
            <h2>{{$category->name}} <button class="btn btn-xs btn-info">+</button></h2>
                @foreach ($aliments as $aliment)
                    @if($aliment->category_id == $category->id)
                    <div class="row">
                        <div class="col-sm-2">{{ $aliment->name }}</div>
                        @if($category->id == 7)
                            <div class="col-sm-2">{{ $aliment->description}}</div>
                        @endif
                        @if($category->id == 6 || $category->id == 7 || $category->id == 9)
                            <div class="col-sm-1">{{ $aliment->weight}} [L]</div>
                        @elseif($category->id != 6 && $category->id != 7 && $category->id != 9)
                            <div class="col-sm-1">{{ $aliment->weight}} [g]</div>
                        @endif
                        <div class="col-sm-2"><b>quantity: </b>{{ $aliment->quantity}}</div>
                        <div class="col-sm-2"><b>bought on: </b>{{ $aliment->buy_date}}</div>
                        <div class="col-sm-2"><b>best until: </b>{{ $aliment->expiration_date}}</div>
                        <div class="col-sm-1"><button class="btn btn-xs btn-info">Edit</button></div>
                        <div class="col-sm-1"><button class="btn btn-xs btn-info">Delete</button></div>
                    </div>
                    @endif
                @endforeach
        </div>
    @endforeach
@endsection
