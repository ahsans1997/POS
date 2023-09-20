@extends('layouts.app')

@section('content')

<div class="row">

    <div class="card col-md-12">
        <div class="card-body">
            <h4>Assign Permission To Role</h4>
            <form action="{{ route('roles.assignPermissionToRole', $role->id) }}" method="POST">
                @csrf
                <div class="col-md-5 mt-4">
                    <h5>Role Name : {{ $role->name }}</h5>
                    {{-- <label for="">Role Name :</label>
                    <span><strong>{{ $role->name }}</strong></span> --}}
                </div>
                <div class="col-md-12 mt-4">
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
                <button class="btn btn-success mt-4" type="submit">Assign Permission</button>
            </form>
        </div>
    </div>
</div>

@endsection
