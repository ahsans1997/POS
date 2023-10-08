@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @can('user-create')
                <div class="add-user d-block" style="height: 65px;">
                    <a href="{{ route('users.create') }}" class="btn btn-info" style="float: right;">Add User</a>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Basic Datatables</h5>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th data-ordering="false">ID</th>
                                <th data-ordering="false">User</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Created By</th>
                                <th>Edited By</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->userDetails->mobile_number }}</td>
                                    <td>
                                        @if ($user->name == 'Admin')
                                            {{ 'Admin' }}
                                        @else
                                            {{ $users[$user->UserDetails->created_by - 1]->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->name == 'Admin')
                                            {{ 'Admin' }}
                                        @else
                                            {{ $users[$user->UserDetails->edited_by - 1]->name }}
                                        @endif
                                    </td>
                                    <td>{{ $user->userDetails->user_status }}</td>
                                    <td>
                                        @foreach ($user->role as $role)
                                            {{ $role->name }}
                                            @if ($user->role->count() > 1)
                                                {{ ',' }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                @can('user-role-assign')
                                                    <li><a href="{{ route('users.assignRole', $user->id) }}" class="dropdown-item"><i
                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i>Assign Role</a>
                                                    </li>
                                                @endcan
                                                
                                                @can('user-edit')
                                                    <li><a href="{{ route('users.edit', $user->id) }}"
                                                            class="dropdown-item edit-item-btn"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit</a>
                                                    </li>
                                                @endcan

                                                @can('user-delete')
                                                    <li>
                                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="dropdown-item remove-item-btn" href="#"
                                                                onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this user?')) this.closest('form').submit();">
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                Delete
                                                            </a>
                                                        </form>
                                                    </li>
                                                @endcan

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#datatable").DataTable({
                "lengthMenu": [
                    [20, 50, 100, -1],
                    [20, 50, 100, "All"]
                ]
            })
        })
    </script>
@endpush
