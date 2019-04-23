@extends('layouts.shop')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Pricing</h1>
    <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
</div>

<div class="col-md-8">
    @if (count($products) > 0)
        @foreach($products->all() as $product)
            <div class="card-deck mb-1 text-center">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        @foreach($categories as $category)
                            @if($product->category_id === $category->categoryId)
                                <h4 class="my-0 font-weight-normal">{{ $category->categoryName }}</h4>
                            @endif
                        @endforeach
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">{{ $product->productPrice }} XAF<small class="text-muted"></small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><img class="rounded" src="{{ $product->imageFile }}" height="200em" alt=""></li>
                        </ul>

                        <p>{{ $product->productDescription }}</p>
                    </div>
                </div>
            </div>
        @endforeach
        <nav aria-label="Page navigation"><ul class="pagination pagination-md">{{ $products->links() }}</ul></nav>
    @endif
</div>

@endsection
