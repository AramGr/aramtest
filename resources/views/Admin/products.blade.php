@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Product</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('addProducts') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Category:</label>
                                <select class="form-control" id="category" name="category">
                                    <option disabled selected>Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter product name" name="name" {{ $errors->has('name') ? ' is-invalid' : '' }} value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                <label for="description">Description:</label>
                                <textarea class="form-control" rows="4" cols="50" placeholder="Enter product description" name="description" {{ $errors->has('description') ? ' is-invalid' : '' }} required autofocus>{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                                <label for="image">Image:</label>
                                <input type="file" class="form-control" name="image" id="image">
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                    <div class="card-header">Search With Categories</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('showProductsByCategory') }}">
                            @csrf
                            <select class="form-control" id="category" name="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-default">Search</button>
                        </form>
                    </div>
                    <div class="card-header">All Products</div>
                    <div class="card-body">
                        @foreach ($products as $product)
                        <div class="col-md-10 column productbox">
                                <img src="{{ URL::asset('uploads/'.$product->image) }}" class="img-responsive">
                                <div>{{ $product->description }}</div>
                            <div class="producttitle"><a href="{!! url('/admin/product/'.$product->id); !!}">name: {{ $product->name }}</a></div>
                                <div class="producttitle">category: {{ $product->category->name }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection