@extends('layouts.app')

@section('content')
    <h1>{{$sub_category->sub_cat_name}}</h1>
    {!! Form::model($sub_category, ['method' => 'PATCH','action' => ['SubCategoriesController@update', $sub_category->id ]]) !!}
    <div class="form-group">
        {!! Form::label('sub_category','Sub Category:') !!}
        {!! Form::text('sub_cat_name',null,['class' => 'form-control', 'placeholder' => 'sub category name']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('brand_list','Tags:') !!}
        {!! Form::select('brand_list[]',$brands , null , ['class' => 'form-control', 'multiple'=>'multiple']) !!}
    </div>

    {!! Form::submit('Edit', ['class' => 'btn btn-dark']) !!}

    {!! Form::close() !!}
    <hr>
    <a href="/subcategories/{{$sub_category->id}}" class="btn btn-dark">Back</a>

@endsection