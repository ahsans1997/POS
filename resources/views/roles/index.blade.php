@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="add-user d-block" style="height: 65px;">
                <a href="{{ route('roles.create') }}" class="btn btn-info" style="float: right;">Add Role</a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Basic Datatables</h5>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center" data-ordering="false">SR No.</th>
                                <th class="text-center">Role Name</th>
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
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="{{ route('roles.assignPermission', $role->id) }}" class="dropdown-item"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>Assign Permission</a>
                                                </li>
                                                <li><a href="{{ route('roles.edit', $role->id) }}" class="dropdown-item edit-item-btn"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item remove-item-btn">
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                        Delete
                                                    </a>
                                                </li>
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
