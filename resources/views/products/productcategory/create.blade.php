@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="card col-md-12">
            <h3 class="mt-3">Create User</h3>
            <div class="card-body">
                <form action="{{ route('productcategory.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Category Name">
                        </div>
                        <div class="col-md-6">
                            <label for="name">Category Code</label>
                            <input type="text" class="form-control" name="code"
                                placeholder="Enter Category Code">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="description">Product Category Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-4">Create Product Category</button>
                </form>
            </div>
        </div>

    </div>
@endsection
