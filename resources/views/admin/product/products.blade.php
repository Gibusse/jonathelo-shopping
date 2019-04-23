@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <a href="{{ route('products.create') }}" class="btn btn-primary float-md-right m-md-4">Nouveau</a>

        </div>

        <div class="col-md-10">
            @if (count($products) > 0)
                @foreach($products->all() as $product)
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4>{{ $product->productName }}</h4></div>

                            <div class="panel-body">
                                <img class="rounded" src="{{ $product->imageFile }}" alt="" height="185em">
                                <p>{{ $product->productDescription }}</p>

                                <span>
                                        <a href="{{ route('products.show', $product->productId) }}">
                                            <button class="btn btn-md btn-secondary">VIEW</button>
                                        </a>
                                    &emsp14;
                                        <a href="{{ route('products.edit', $product->productId) }}">
                                            <button class="btn btn-md btn-warning">EDIT</button>
                                        </a>

                                        <a href="">
                                            <span class="btn btn-md btn-danger">DELETE</span>
                                        </a>
                                </span>
                                <cite style="float: left;">Posted on: {{ date('M j, Y H:i', strtotime($product->updated_at)) }} </cite>
                            </div>
                        </div>

                    </div>

                    <hr>
                @endforeach
            @else
                <p>Pas d'articles</p>
            @endif
        </div>
        <nav aria-label="Page navigation"><ul class="pagination pagination-md">{{ $products->links() }}</ul></nav>
    </div>
</div>
@endsection

