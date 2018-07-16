@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Categories</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('addCategories') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter category name" name="name">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        @foreach ($categories as $category)
                            <p>{{ $category->name }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection