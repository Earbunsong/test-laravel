@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{__('Show Role')}}</div>
                    <div class="card-body">
                        <a class="btn btn-info" href="{{ route('roles.index') }}"> Back</a>

                        <p><strong>Role:</strong> {{$role->name}}</p>

                        <h2>Permission:</h2>
                        @foreach($role->permissions as $permission)
                            <p><input type="checkbox" checked disabled> {{ $permission->name }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
