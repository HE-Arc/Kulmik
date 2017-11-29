@extends('layouts.master')

@section('content')
    <div class="row">
      <h1>Fridges list</h1>
      Do you wan't to add a cupboard : <a href="{{ route('containers.create') }}" class="btn btn-xs btn-primary">Add a container</a>
    </div>
    @foreach ($cupboards as $cupboard)
        <h2>
            <b>{{ ucfirst($cupboard->name) }}</b>
            <div class="btn-group">
                <a href="{{ route('aliments.create', ['cupboard_id' => $cupboard->id]) }}" class="btn btn-xs btn-primary">Add</a>
                <a href="{{ route('containers.edit', $cupboard) }}" class="btn btn-xs btn-warning">Edit</a>
                {!! Form::open(['method' => 'DELETE', 'url' => route('containers.destroy', $cupboard->id), 'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}
                  <button class="btn btn-xs btn-danger">Delete</button>
                {!! Form::close() !!}
                <!--<a href="{{ route('containers.destroy', $cupboard->id) }}" class="btn btn-xs btn-danger">Delete</a>-->
            </div>
        </h2>
        <p>{{ $cupboard->description }}<br/>
            <b>volume: </b>{{$cupboard->volume}}<br/>
            <b>temperature: </b>{{$cupboard->temperature}}
        </p>

        @foreach($categories as $category)
            @foreach ($aliments as $aliment)

                @if($aliment->cupboard_id == $cupboard->id)
                    @if($aliment->category_id == $category->id)
                        <ul>
                            <div class="row" id={{$category->name}}>
                                <div class="col-sm-2">{{ $aliment->name }}</div>
                                <div class="col-sm-2"><b>total weight: </b>{{ $aliment->weight * $aliment->quantity}}
                                    {{ ($category->name == "drinks" || $category->name == "alcohol" || $category->name == "sweet beverage" || $category->name == "juice") ? "[ml]" : "[g]" }}</div>
                                <div class="col-sm-2"><b>quantity: </b>{{ $aliment->quantity}}</div>
                                <div class="col-sm-2"><b>bought on: </b>{{ $aliment->buy_date}}</div>
                                <div class="col-sm-2"><b>best until: </b>{{ $aliment->expiration_date}}</div>
                            </div>
                        </ul>
                    @endif
                @endif
            @endforeach
        @endforeach

        <hr>
    @endforeach
@endsection
