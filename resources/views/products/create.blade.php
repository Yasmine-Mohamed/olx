@extends('layouts.app')

@section('content')
    <h1>Add Product</h1>
    <div class="row">
        <div class="col-lg-4"></div>
          {!! Form::open(['action' => 'ProductsController@store' , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('title','Title:') !!}
                {!! Form::text('title','',['class' => 'form-control', 'placeholder' => 'title' , 'required']) !!}
            </div>

        <div class="form-group">
             {!! Form::label('categories','Main Category') !!}
             {!! Form::select('category', ([null => 'Select Category'] + $categories) , null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sub_categories','Sub Category') !!}
            {!! Form::select('sub_category', ([null => 'Select Category'] + $sub_categories) , null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('brands','Brands') !!}
            {!! Form::select('brand', ([null => 'Select Brand'] + $brands) , null, ['class' => 'form-control']) !!}
        </div>

            <div class="form-group">
                {!! Form::label('desc','Description:') !!}
                {!! Form::textarea('description','',['class' => 'form-control','placeholder' => 'description','required']) !!}
            </div>
            <div class="form-group">
                {{Form::file('image')}}
            </div>
            <div class="form-group">
                {!! Form::label('price','Price:') !!}
                {!! Form::text('price','',['class' => 'form-control', 'placeholder' => 'price','required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('city','City:') !!}
                {!! Form::text('city','',['class' => 'form-control', 'placeholder' => 'city' , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name','',['class' => 'form-control', 'placeholder' => 'name' , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('phone','Phone:') !!}
                {!! Form::text('phone','',['class' => 'form-control', 'placeholder' => 'phone' , 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('condition','Conditions: ') !!}
                {!! Form::radio('condition','new') !!} New
                {!! Form::radio('condition','used') !!} Used
            </div>

        {!! Form::submit('Add Product', ['class' => 'btn btn-dark']) !!}

        {!! Form::close() !!}
    </div>
@endsection