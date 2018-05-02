@extends('layouts.app')

@section('content')
    <h1>{{$product->title}}</h1>
    <img style="width: 25%" src="/images/{{$product->photo}}">
    <br><br>
    <div>
        Category: {!! $product->category['category_name'] !!}
    </div>
    <hr>
    @if( !empty($product->subCategory) )
    <div>
        Sub Category: {!! $product->subCategory['sub_cat_name'] !!}
    </div>
    <hr>
    @endif
    @if( !empty($product->brand) )
    <div>
        Brand: {!! $product->brand['brand_name'] !!}
    </div>
    <hr>
    @endif
    <div>
        Description: {!! $product->description !!}
    </div>
    <hr>
    <div>
        Price: {!! $product->price !!}
    </div>
    <hr>
    <div>
        Condition: {!! $product->condition !!}
    </div>
    <hr>
    <div>
        Name: {!! $product->name !!}
    </div>
    <hr>
    <div>
        City: {!! $product->city !!}
    </div>
    <hr>
    <div>
        Phone: {!! $product->phone !!}
    </div>
    <hr>
    <small>Posted {{$product->created_at}} by {{$product->user['name']}}</small>
    <hr>

    @if(!Auth::guest())
        @if(Auth::user()->id == $product->user_id)
            <a href="/products/{{$product->id}}/edit" class="btn btn-warning">Edit</a>
            <hr>
            {!! Form::open(['action' => ['ProductsController@destroy', $product->id] , 'method' => 'POST' , 'class' => 'pull-right']) !!}
            {!! Form::hidden('_method','DELETE') !!}
            {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif
    @endif
@endsection