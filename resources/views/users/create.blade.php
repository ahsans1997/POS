@extends('layouts.app')

@section('content')

<div class="row">

    <div class="card col-md-12">
        <h3 class="mt-3">Create User</h3>
        <div class="card-body">
            <form class="" action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Name : </label>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="col-md-4">
                        <label for="">Email : </label>
                        <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="col-md-4">
                        <label for="">Password : </label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="">Confirm Password : </label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="">Message : </label>
                        <input type="text" name="message" class="form-control" placeholder="Message">
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="">Address : </label>
                        <input type="text" name="address" class="form-control" placeholder="Address">
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="">Number : </label>
                        <input type="text" name="mobile_number" class="form-control" placeholder="Mobile Number">
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="">User Status : </label>
                        <select id="user_status" name="user_status" class="form-control">
                            <option selected value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-4" style="float: right;">Add User</button>
            </form>
        </div>
    </div>

</div>


@endsection
