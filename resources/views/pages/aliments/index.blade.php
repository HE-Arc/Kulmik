@extends('layouts.master')

@section('content')

    @foreach($categories as $category)
        <div class="container">
            <h1>{{$category->name}}</h1>
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
                    </div>
                    @endif
                @endforeach
        </div>
    @endforeach
@endsection
