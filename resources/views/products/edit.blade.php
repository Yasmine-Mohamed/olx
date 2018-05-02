@extends('layouts.app')

@section('content')
    <h1>Add Product</h1>
    <div class="row">
        <div class="col-lg-4"></div>
        {!! Form::model($product, ['method' => 'PATCH', 'enctype' => 'multipart/form-data' ,'action' => ['ProductsController@update', $product->id ]]) !!}
        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title',null,['class' => 'form-control', 'placeholder' => 'title' , 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('categories','Main Category') !!}
            {!! Form::select('category', $categories , $product->category_id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sub_categories','Sub Category') !!}
            {!! Form::select('sub_category',$sub_categories , $product->sub_category_id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('brands','Brands') !!}
            {!! Form::select('brand', $brands , $product->brand_id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('desc','Description:') !!}
            {!! Form::textarea('description',null,['class' => 'form-control','placeholder' => 'description','required']) !!}
        </div>
        <div class="form-group">
            {{Form::file('image')}}
        </div>
        <div class="form-group">
            {!! Form::label('price','Price:') !!}
            {!! Form::text('price',null,['class' => 'form-control', 'placeholder' => 'price','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('city','City:') !!}
            {!! Form::text('city',null,['class' => 'form-control', 'placeholder' => 'city' , 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'name' , 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('phone','Phone:') !!}
            {!! Form::text('phone',null,['class' => 'form-control', 'placeholder' => 'phone' , 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('condition','Conditions: ') !!}
            {!! Form::radio('condition','new') !!} New
            {!! Form::radio('condition','used') !!} Used
        </div>

        {!! Form::hidden('_method', 'PUT') !!}
        {!! Form::submit('Edit Product', ['class' => 'btn btn-dark']) !!}

        {!! Form::close() !!}
    </div>
@endsection