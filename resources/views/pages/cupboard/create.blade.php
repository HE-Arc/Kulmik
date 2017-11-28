@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add new Cupboard</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('containers.index') }}">Back</a>
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

    {!! Form::open(array('route' => 'containers.store', 'method'=>'POST')) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::text('description', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('temperature', 'Temperature') !!}
            {!! Form::number('temperature', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('volume', 'Volume') !!}
            {!! Form::number('volume', null, ['class' => 'form-control']) !!}
        </div>
        <button class="btn btn-primary">Add</button>
    {!! Form::close() !!}

@endsection
