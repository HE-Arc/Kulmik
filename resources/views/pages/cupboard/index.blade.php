@extends('layouts.master')

@section('content')
    <div class="row">
      <h1>Fridges list</h1>
      <button class="btn btn-xs btn-info">Add a container</button>
    </div>
    @foreach ($cupboards as $cupboard)
        <h2>{{ $cupboard->name }}</h2>
        <p>{{ $cupboard->description }}<br/>
            <b>volume: </b>{{$cupboard->volume}}<br/>
            <b>temperature: </b>{{$cupboard->temperature}}
        </p>

        @foreach($categories as $category)
            @foreach ($aliments as $aliment)

                @if($aliment->cupboard_id == $cupboard->id)
                    @if($aliment->category_id == $category->id)
                        <h3>{{$category->name}}</h3>
                        <ul>
                            <div class="row" id={{$category->name}}>
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
                            </div>
                        </ul>
                    @endif
                @endif
            @endforeach
        @endforeach
    @endforeach
@endsection
