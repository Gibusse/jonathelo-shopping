@extends('layouts.shop')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Pricing</h1>
    <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
</div>

@if (count($products) > 0)
    @foreach($products->all() as $product)
        <div class="card-deck mb-1 text-center">
            <div class="card mb-2 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">{{ $product->productName }}</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">{{ $product->productDescription }} <small class="text-muted"></small></h1>
                    <ul class="list-unstyled mt-1 mb-2">
                        <li><img src="{{ $product->imageFile }}" height="250em" alt=""></li>
                    </ul>
                    <span class="btn btn-lg btn-primary">
                        <cite style="float: left;">Posted on: {{ date('M j, Y H:i', strtotime($product->updated_at)) }} </cite>
                    </span>
                </div>
            </div>
        </div>
    @endforeach
    <nav aria-label="Page navigation"><ul class="pagination pagination-md">{{ $products->links() }}</ul></nav>
@endif
@endsection
