@extends('layouts.master')

@section('content')
    <h1>All your food is here</h1>
    Do you wan't to add an aliment : <a href="{{ route('aliments.create') }}" class="btn btn-xs btn-primary">Add an aliment</a>

    <!--TODO: refactor -->
    @foreach($categories as $category)
        <div class="container">
            <h2>
                {!! Form::open(['method' => 'GET', 'url' => route('aliments.create', ['category_id' => $category->id])]) !!}
                    {!! Form::label('name', ucfirst($category->name)) !!}
                    <button class="btn btn-xs btn-primary">Add</button>
                {!! Form::close() !!}
            </h2>
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
                    <div class="col-sm-1">
                      <div class="col-sm-2"><a href="{{ route('aliments.edit', $aliment) }}" class="btn btn-xs btn-warning">Edit</a></div>
                      <div class="col-sm-2">
                          {!! Form::open(['method' => 'DELETE', 'url' => route('aliments.destroy', $aliment->id), 'onsubmit' => 'return ConfirmDelete()']) !!}
                              <button class="btn btn-xs btn-danger">Delete</button>
                          {!! Form::close() !!}
                      </div>
                    </div>
                </div>
                @endif
            @endforeach
            <hr>
        </div>
    @endforeach
@endsection
