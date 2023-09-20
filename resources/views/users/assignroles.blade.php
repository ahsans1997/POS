@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="add-user d-block" style="height: 65px;">
                <a href="{{ route('users.create') }}" class="btn btn-info" style="float: right;">Add User</a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Basic Datatables</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.assignRoleToUser', $user->id) }}" method="POST">
                        @csrf
                        <table class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Sl. No.</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Guard</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($roles as $role)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{ $role->name }}</td>
                                        <td class="text-center">{{ $role->guard_name }}</td>
                                        <td class="text-center">

                                            <div class="form-check form-switch form-switch-success text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="SwitchCheck3" value="{{ $role->id }}" name="roles[]" style="font-size: 20px"
                                                    @foreach ($userRoles as $userRole)
                                                        @if ($role->id == $userRole->id)
                                                            {{ 'checked' }}
                                                        @endif
                                                    @endforeach
                                                >
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div style="float: right;">
                            <button type="submit" class="btn btn-primary">Assign Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
@endsection

@push('js')
@endpush
