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

    {!! Form::open(array('route' => 'aliments.store', 'method'=>'POST')) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('weight', 'Weight') !!}
            {!! Form::text('weight', null, ['class' => 'form-control']) !!}
        </div>
        <button class="btn btn-primary">Add</button>
    {!! Form::close() !!}

@endsection
