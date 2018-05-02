@extends('layouts.app')

@section('content')
    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Welcome To OLX</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Action 1</a>
                    <a href="#" class="btn btn-secondary my-2">Action 2</a>
                </p>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="/images/{{$product->photo}}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">{{ $product->title }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="/products/{{$product->id}}">View</a></button>
                                        </div>
                                        <small class="text-muted">{{$product->created_at}} by {{$product->user['name']}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <nav aria-label="...">
           {{ $products->links() }}
        </nav>

    </main>


@endsection

