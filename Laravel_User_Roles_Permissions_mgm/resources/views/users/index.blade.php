@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Users Management</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
                </div>
            </div>
        </div>

       {{--  @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif --}}

        <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @foreach($user->getRoleNames() as  $role)
                    <button class="btn btn-success btn-sm">{{$role}}</button>
                @endforeach
            </td>
            <td>

                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}">Show</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}">Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete it?')" href="{{ route('users.destroy',$user->id) }}">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </table>

        {!! $data->render() !!}

        <p class="text-center text-primary"><small>User-Role-Permission</small></p>
    </div>
@endsection
