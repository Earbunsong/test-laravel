@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{__('Show Product')}}</div>
                    <div class="card-body">
                        <a class="btn btn-info" href="{{ route('products.index') }}"> Back</a>

                        <p><strong>Product:</strong> {{$product->name}}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
