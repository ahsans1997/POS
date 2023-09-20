@extends('layouts.app')

@section('content')
<div class="row ">
    <div class="card col-md-12">
        <div class="card-body">
            <h4>Create Role</h4>
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="col-md-5 mt-4">
                    <label for="">Role Name :</label>
                    <input type="text" class="form-control" name="name" placeholder="Role Name">
                </div>
                <div class="col-md-12 mt-5">
                    <div class="row">
                        @foreach ($permissions as $permission)
                            <div class="col-md-3 n-chk">
                                <label class="new-control new-checkbox checkbox-primary">
                                    <input type="checkbox" class="new-control-input" value="{{ $permission->id }}" name="permissions[]">
                                    <span class="new-control-indicator"></span>{{ $permission->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Add Role</button>
            </form>
        </div>
    </div>
</div>
@endsection
