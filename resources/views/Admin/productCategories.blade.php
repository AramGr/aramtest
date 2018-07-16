@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Products by {{ $products[0]->categoryName }}</div>
                    <div class="card-body">
                        @foreach ($products as $product)
                            <img src="{{ URL::asset('uploads/'.$product->image) }}" class="img-responsive product-image">
                            <div><strong>name: {{ $product->productName }}</strong></div>
                            <div><strong>category: {{ $product->categoryName }}</strong></div>
                            <div>{{ $product->description }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection