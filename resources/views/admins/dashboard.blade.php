@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/categories/create" class="btn btn-success">+Add Category</a>
        <br><br><br>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td><a href="/categories/{{$category->id}}">{{$category->category_name}}</a></td>
                    <td><a href="" class="btn btn-warning">Edit</a></td>
                    <td>
                        {!! Form::open(['action' => ['CategoriesController@destroy', $category->id], 'method' => 'POST']) !!}
                        {!! Form::hidden('_method','DELETE') !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection