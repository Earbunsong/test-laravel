@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Users Role</h2>
                </div>
                <div class="pull-right">
                    @can('role-create')
                        <a class="btn btn-success" href="{{ route('roles.create') }}"> Create Role</a>
                    @endcan
                </div>
            </div>
        </div>
        <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="200">Action</th>
        </tr>
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $role->name }}</td>
            <td>

                <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
                    @csrf
                    @method('delete')

                    @can('role-list')
                        <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}">Show</a>
                    @endcan
                    @can('role-edit')
                        <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                    @endcan
                    @can('role-delete')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete it?')" href="{{ route('roles.destroy',$role->id) }}">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
        </table>

        {!! $roles->links('pagination::bootstrap-5') !!}

        <p class="text-center text-primary"><small>User-Role-Permission</small></p>
    </div>
@endsection
