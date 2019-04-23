@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Nom de l'article: {{ $product->productName }}</h1> </div>

                    <div class="panel-body">

                        <div>
                            <img class="rounded" src="{{ $product->imageFile }}" height="400em" alt="">
                        </div>

                        <div>
                            <h3 class="col-md-8 control-label">Description de l'article: {{ $product->productDescription }}</h3>
                        </div>

                        <div>
                            <h4 class="col-md-8 control-label">Prix de l'article: {{ $product->productPrice }}</h4>
                        </div>

                        <div>
                            <h4 class="col-md-8">Catégorie de l'article: {{ $product->category_id }}</h4>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-primary btn-large btn-block">Publier un produit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
