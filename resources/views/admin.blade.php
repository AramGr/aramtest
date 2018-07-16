@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form>
                            <button class="btn" type="submit" formaction="{{ route('categories') }}">Add Categories</button>
                            <button class="btn" type="submit" formaction="{{ route('products') }}">Add Products</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
