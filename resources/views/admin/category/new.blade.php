@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-4"></div>
    <h2>Nouvelle catégorie</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-md-4">
                <label class="form-label col-sm-3" for="categoryName">Name:</label>
                <input type="text" class="form-control" id="categoryName" name="categoryName" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label class="form-label col-sm-3" for="categoryDescription">Description:</label>
                <textarea class="form-control" id="categoryDescription" name="categoryDescription" required></textarea>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-lg btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
