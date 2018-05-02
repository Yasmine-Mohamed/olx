@extends('layouts.app')

@section('content')
    <h1>Create Category</h1>
    {!! Form::open(['action' => 'CategoriesController@store' , 'method' => 'POST']) !!}
    <div class="form-group">
        {!! Form::label('cat_name','Category Name:') !!}
        {!! Form::text('category_name','',['class' => 'form-control', 'placeholder' => 'category name']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('categories','Choose Parent Category') !!}
        {!! Form::select('parent_cat', ([null => 'Select Category'] + $allCategories) , null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('brand_list','Tags:') !!}
        {!! Form::select('brand_list[]',$brands , null , ['class' => 'form-control' , 'multiple' => 'multiple']) !!}
    </div>

    {!! Form::submit('Add', ['class' => 'btn btn-dark']) !!}

    {!! Form::close() !!}
    <hr>
    <a href="/admin" class="btn btn-dark">Back</a>
@endsection
