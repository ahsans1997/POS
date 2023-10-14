@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="">Company Logo : </label>
                        <img width="200px;"
                            src="https://images.unsplash.com/photo-1696362400148-f0ab0dc31c46?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2092&q=80"
                            alt="">
                        <br>
                        <input class="mt-5" type="file" name="logo">

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="">Company Name : </label>
                                <input class="form-control" type="text" name="name" value="{{ $setting->name }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Company Email : </label>
                                <input class="form-control" type="email" name="email" value="{{ $setting->email }}" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Company Number : </label>
                                <input class="form-control" type="phone" name="number" value="{{ $setting->phone }}">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Company Address : </label>
                                <input class="form-control" name="address" value="{{ $setting->address }}" type="text">
                            </div>
                        </div>

                        <div class="mt-3">
                            <button style="float: right" type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
