@extends('layouts.master')

@section('content')
    <h1>Aliments list</h1>

    <!-- check whether current user posses at least one cupboard -->
    @if(sizeof($cupboards_id))
        <p>Add a new aliment: <a href="{{ route('aliments.create') }}" class="btn btn-xs btn-primary">New aliment</a></p>
        <hr>
        @foreach($categories as $category)
        <div class="container">
             <div class="panel panel-default">
                <!--#region CATEGORY NAME-->
                <div class="panel-heading">
                    <h2>
                        {{ ucfirst($category->name) }}
                        <a href="{{ route('aliments.create', ['category_id' => $category->id]) }}" class="btn btn-xs btn-primary">Add</a>
                    <!--{!! Form::open(['method' => 'GET', 'url' => route('aliments.create', ['category_id' => $category->id])]) !!}
                    {!! Form::label('name', ucfirst($category->name)) !!}
                            <button class="btn btn-xs btn-primary">Add</button>
                    {!! Form::close() !!}-->
                    </h2>
                </div>
                <!--#endregion CATEGORY NAME-->
                <!--#region ALIMENTS-->
                 <div class="panel-body">
                    @foreach ($aliments as $aliment)
                        @if($aliment->category_id == $category->id)
                            <div class="row">
                                <div class="col-sm-2">{{ $aliment->name }}</div>
                                <div class="col-sm-2"><b>total weight: </b>{{ $aliment->weight * $aliment->quantity }}
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
                        @endif
                    @endforeach
                    <hr>
                </div>
                <!--#endregion ALIMENTS-->
             </div>
        </div>
        @endforeach
    @else
        <p>Create a new container to add aliments: <a class="btn btn-xs btn-primary" href="{{ route('containers.create') }}">Create container</a></p>
        <hr>
    @endif
@endsection
