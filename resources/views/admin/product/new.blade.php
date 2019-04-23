@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Produit</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group{{$errors->has('productName') ? 'has-error' : ''}}">
                            <label for="productName" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" id="productName" name="productName"
                                       value="{{ old('productName') }}" class="form-control" required>

                                @if ($errors->has('productName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('productName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{$errors->has('productDescription') ? 'has-error' : ''}}">
                            <label for="productDescription" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea id="productDescription" name="productDescription"
                                          value="{{ old('productDescription') }}" class="form-control" required></textarea>

                                @if ($errors->has('productDescription'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('productDescription') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{$errors->has('imageFile') ? 'has-error' : ''}}">
                            <label for="imageFile" class="col-md-4 control-label">Image</label>

                            <div class="col-md-6">
                                <input type="file" id="imageFile" name="imageFile"
                                       value="{{ old('imageFile') }}" class="form-control" required>

                                @if ($errors->has('imageFile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('imageFile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{$errors->has('productPrice') ? 'has-error' : ''}}">
                            <label for="productPrice" class="col-md-4 control-label">Prix</label>

                            <div class="col-md-6">
                                <input type="number" id="productPrice" name="productPrice"
                                       value="{{ old('productPrice') }}" class="form-control" required>

                                @if ($errors->has('productPrice'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('productPrice') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{$errors->has('category_id') ? 'has-error' : ''}}">
                            <label for="category_id" class="col-md-4 control-label">Catégorie</label>

                            <div class="col-md-6">
                                <select id="category_id" name="category_id" class="form-control" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category['categoryId'] }}">{{ $category['categoryName'] }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-large btn-block">Publier un produit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
