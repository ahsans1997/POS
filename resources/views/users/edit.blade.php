@extends('layouts.app')

@section('content')

<div class="row">

    <div class="card col-md-12">
        <h3 class="mt-3">Edit Profile</h3>
        <div class="card-body">
            <form class="mt-2" action="{{ route('users.update', $user_info->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Name : </label>
                        <input type="text" name="name" class="form-control" value="{{ $user_info->name }}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Email : </label>
                        <input type="text" name="email" class="form-control" value="{{ $user_info->email }}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Message : </label>
                        <input type="text" name="message" class="form-control"
                            value="{{ $user_info->UserDetails->message }}">
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="">Address : </label>
                        <input type="text" name="address" class="form-control"
                            value="{{ $user_info->UserDetails->address }}">
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="">Number : </label>
                        <input type="text" name="mobile_number" class="form-control"
                            value="{{ $user_info->UserDetails->mobile_number }}">
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="">User Status : </label>
                        <select id="user_status" name="user_status" class="form-control">
                            <option {{ ($user_info->UserDetails->user_status == 1 ? 'selected' : '') }} value="1">Active</option>
                            <option {{ ($user_info->UserDetails->user_status == 0 ? 'selected' : '') }} value="0">Deactive</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-4" style="float: right;">Update</button>
            </form>
        </div>
    </div>


</div>

@endsection
