@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$sub_category->sub_cat_name}}</h1>
        <br><br>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Brands</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sub_category->brands as $brand)
                <tr>
                    <th scope="row">{{$brand->id}}</th>
                    <td>{{$brand->brand_name}}</td>
                </tr>
            @endforeach
        </table>
        <a href="/subcategories/{{$sub_category->id}}/edit" class="btn btn-warning">Edit</a>
    </div>
@endsection