@extends('layout')
@section('title', 'Edit Category')
@section('content-title', 'Edit Category')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Edit Category</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name">Category Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Enter category name..." required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row pt-2">
                <div class="col">
                    <button type="submit" class="btn btn-info btn-block">Update</button>
                </div>
                <div class="col">
                    <a href="{{ route('category.index') }}" class="btn btn-danger btn-block">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection