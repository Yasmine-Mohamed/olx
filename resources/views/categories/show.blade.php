@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Sub Category</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subCategories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td><a href="/subcategories/{{$category->id}}">{{$category->sub_cat_name}}</a></td>
                    <td><a href="" class="btn btn-warning">Edit</a></td>
                    <td>
                        {!! Form::open(['action' => ['SubCategoriesController@destroy', $category->id], 'method' => 'POST']) !!}
                        {!! Form::hidden('_method','DELETE') !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="/admin" class="btn btn-dark">Back</a>
    </div>
@endsection