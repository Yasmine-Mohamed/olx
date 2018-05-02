@extends('layouts.app')

@section('content')
    <h1>{{$category->category_name}}</h1>
    {!! Form::model($category, ['method' => 'PATCH', 'action' => ['CategoriesController@update', $category->id ]]) !!}
    <div class="form-group">
        {!! Form::label('cat_name','Category Name:') !!}
        {!! Form::text('category_name', null ,['class' => 'form-control', 'placeholder' => 'category name']) !!}
    </div>

    {!! Form::submit('Edit', ['class' => 'btn btn-dark']) !!}


    {!! Form::close() !!}

    <hr>
    <a href="/admin" class="btn btn-dark">Back</a>

@endsection