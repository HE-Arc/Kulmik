@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add new Aliment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('aliments.index') }}">Back</a>
            </div>
        </div>
    </div>

    <!-- error check -->
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- form management -->
    {!! Form::open(array('route' => 'aliments.store', 'method'=>'POST')) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('weight', 'Weight') !!}
            {!! Form::number('weight', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('quantity', 'Quantity') !!}
            {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('buy_date', 'Buy Date') !!}
            {!! Form::date('buy_date', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('expiration_date', 'Expiration Date') !!}
            {!! Form::date('expiration_date', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id', 'Category') !!}
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cupboard_id', 'Cupboard') !!}
            {!! Form::select('cupboard_id', $cupboards, null, ['class' => 'form-control']) !!}
        </div>
        <button class="btn btn-primary">Add</button>
    {!! Form::close() !!}

@endsection
