@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{__('Create Role')}}</div>
                    <div class="card-body">
                        <a class="btn btn-info" href="{{ route('roles.index') }}"> Back</a>

                        <form action="{{route('roles.store')}}" method="POST">

                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" class="form-control">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <h2>Permission:</h2>
                                        @foreach($permissions as $key => $permission)
                                            <label>
                                                <input type="checkbox" name="permissions[{{ $permission->name }}]" value="{{$permission->name}}">
                                                {{ $permission->name }}
                                            </label> <br/>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
