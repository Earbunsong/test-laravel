@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Product Management</h2>
                </div>
                <div class="pull-right">
                    @can('product-create')
                        <a class="btn btn-success" href="{{ route('products.create') }}"> Create Product</a>
                    @endcan
                </div>
            </div>
        </div>
        <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $key => $product)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $product->name }}</td>
            <td>

                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    @csrf
                    @method('delete')

                    @can('product-list')
                        <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}">Show</a>
                    @endcan

                    @can('product-edit')
                        <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @endcan

                    @can('product-delete')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete it?')" href="{{ route('products.destroy',$product->id) }}">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
        </table>

       {{--  {!! $data->render() !!} --}}

        <p class="text-center text-primary"><small>User-Role-Permission</small></p>
    </div>
@endsection
