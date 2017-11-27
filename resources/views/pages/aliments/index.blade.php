@extends('layouts.master')

@section('content')

    <h1>All your food is here</h1>
    Do you wan't to add an aliment : <a href="{{ route('aliments.create') }}" class="btn btn-xs btn-info">Add an aliment</a>

    <!--TODO: refactor -->
    @foreach($categories as $category)
        <div class="container">
            <h2>{{$category->name}} <button class="btn btn-xs btn-info">+</button></h2>
                @foreach ($aliments as $aliment)
                    @if($aliment->category_id == $category->id)
                    <div class="row">
                        <div class="col-sm-2">{{ $aliment->name }}</div>
                        @if($aliment->description == "")
                            <div class="col-sm-2">no description</div>
                        @elseif($aliment->description != "")
                            <div class="col-sm-2">{{ $aliment->description}}</div>
                        @endif
                        <div class="col-sm-1">{{ $aliment->weight}}
                            {{ ($category->name == "drinks" || $category->name == "alcohol" || $category->name == "sweet beverage" || $category->name == "juice") ? "[L]" : "[g]" }}</div>
                        <div class="col-sm-2"><b>quantity: </b>{{ $aliment->quantity}}</div>
                        <div class="col-sm-2"><b>bought on: </b>{{ $aliment->buy_date}}</div>
                        <div class="col-sm-2"><b>best until: </b>{{ $aliment->expiration_date}}</div>
<<<<<<< HEAD
                        <div class="col-sm-1"><a href="{{ route('aliments.show', $aliment) }}" class="btn btn-xs btn-info">Edit</a></div>
=======

                        <div class="col-sm-1"><a href="{{ action('AlimentController@show', ['id' => $aliment->id]) }}" class="btn btn-xs btn-info">Edit</a></div
>>>>>>> 1e137600fd5f9768fcd271ca46277eb2df985447
                        <div class="col-sm-1"><button class="btn btn-xs btn-info">Delete</button></div>
                    </div>
                    @endif
                @endforeach
        </div>
    @endforeach
@endsection
