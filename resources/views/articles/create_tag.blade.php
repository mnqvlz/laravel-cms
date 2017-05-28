@extends('layout')

@section('content')

    <h1>Create New Category</h1>

    <hr>

    {!! Form::open(['url' => '/tags']) !!}
    <div class="form-group">
        {!! Form::label('categories', 'Categories:' ) !!}
        {!! Form::text('categories', null, ['class' => 'form-control'] ) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Category', ['class' => 'btn btn-primary form-control'] ) !!}
    </div>

    @include('errors.list')
    <br><br>
    <h1>List of Categories</h1>
    <hr>

@stop