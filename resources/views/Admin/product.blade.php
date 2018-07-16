@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Products {{ $product->id }}</div>
                    <div class="card-body">
                        <img src="{{ URL::asset('uploads/'.$product->image) }}" class="img-responsive product-image">
                        <div><strong>name: {{ $product->name }}</strong></div>
                        <div><strong>category: {{ $product->category->name }}</strong></div>
                        <div>{{ $product->description }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection