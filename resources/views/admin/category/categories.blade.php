@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(session('response'))
            <div class="alert alert-success">{{ session('response') }}</div>
        @elseif(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
         @endif

        <div class="col-md-12">
            <a href="{{ route('categories.create') }}" class="btn btn-primary float-md-right m-md-4">Nouveau</a>
            <table class="table table-bordered table-light">
                <thead>
                <tr>
                    <th>Category name</th>
                    <th>Category description</th>
                    <th colspan="2">Action</th>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category['categoryName'] }}</td>
                    <td>{{ $category['categoryDescription'] }}</td>
                    <td>
                        <a href="/categories/{{ $category['categoryId'] }}/edit" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('categories.destroy', $category['categoryId']) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">

                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>

                @endforeach
                </tbody>
            </table>
            <nav aria-label="Page navigation"><ul class="pagination pagination-md">{{ $categories->links() }}</ul></nav>
        </div>
    </div>
</div>
@endsection
