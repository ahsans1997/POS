@extends('layouts.app')

@section('content')

<div class="row">

    <div class="card col-md-12">
        <div class="card-body">
            <h4>Edit Role</h4>
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-5 mt-4">
                    <label for="">Role Name :</label>
                    <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                </div>
                <div class="col-md-12 mt-5">
                    <div class="row">
                        @foreach ($permissions as $permission)
                            <div class="col-md-2 n-chk">
                                <label class="new-control new-checkbox checkbox-primary">
                                    <input type="checkbox" class="new-control-input" value="{{ $permission->id }}" name="permissions[]"
                                    @foreach ($rolePermissions as $rolePermission)
                                        @if ($permission->id == $rolePermission->id)
                                            {{ 'checked' }}
                                        @endif
                                    @endforeach>
                                    <span class="new-control-indicator"></span>{{ $permission->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button class="btn btn-success mt-4" type="submit">Update Role</button>
            </form>
        </div>
    </div>
</div>

@endsection
