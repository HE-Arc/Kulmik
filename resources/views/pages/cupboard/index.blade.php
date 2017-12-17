@extends('layouts.master')

@section('content')
    <div class="row">
      <h1>Containers list</h1>
      Add a new container: <a href="{{ route('containers.create') }}" class="btn btn-xs btn-primary">New container</a>
    </div>
    <hr/>
    @foreach ($cupboards as $cupboard)
    <div class="panel panel-default">
    <!--#region CUPBOARD NAME-->
      <div class="panel-heading">

          <h2>
            <div class="row" id={{$cupboard->name}}>
                <div class="col-sm-4"><b>{{ ucfirst($cupboard->name) }}</b></div>
                <div class="col-sm-2">
                    <div class="col-sm-2"><a href="{{ route('aliments.create', ['cupboard_id' => $cupboard->id]) }}" class="btn btn-xs btn-primary">Add</a></div>
                    <div class="col-sm-2"><a href="{{ route('containers.edit', $cupboard) }}" class="btn btn-xs btn-warning">Edit</a></div>
                    <div class="col-sm-2">
                        {!! Form::open(['method' => 'DELETE', 'url' => route('containers.destroy', $cupboard->id), 'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}
                          <button class="btn btn-xs btn-danger">Delete</button>
                        {!! Form::close() !!}
                    </div>
                    <!--<a href="{{ route('containers.destroy', $cupboard->id) }}" class="btn btn-xs btn-danger">Delete</a>-->
                </div>
            </div>
        </h2>
        <p>{{ $cupboard->description }}<br/>
            <b>volume: </b>{{$cupboard->volume}}<br/>
            <b>temperature: </b>{{$cupboard->temperature}}
        </p>
      </div>
    <!--#endregion CUPBOARD NAME-->
        <div class="panel-body">
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
                                <div class="col-sm-2"><b>bought on: </b>{{ \Carbon\Carbon::parse($aliment->buy_date)->format('d/m/Y') }}</div>
                                <div class="col-sm-2"><b>best until: </b>{{ \Carbon\Carbon::parse($aliment->expiration_date)->format('d/m/Y') }}</div>
                                <div class="col-sm-1">
                                  <div class="col-sm-2"><a href="{{ route('aliments.edit', $aliment) }}" class="btn btn-xs btn-warning">Edit</a></div>
                                  <div class="col-sm-2">
                                      {!! Form::open(['method' => 'DELETE', 'url' => route('aliments.destroy', $aliment->id), 'onsubmit' => 'return ConfirmDelete()']) !!}
                                          <button class="btn btn-xs btn-danger">Delete</button>
                                      {!! Form::close() !!}
                                  </div>
                                </div>
                            </div>
                        </ul>
                    @endif
                @endif
            @endforeach
        @endforeach
      </div>
    @endforeach
@endsection
