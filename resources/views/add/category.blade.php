@extends('layout')
@section('title', 'Add Category')
@section('content-title', 'Add Content in Category')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Data Category</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Category Name</label>
                <input class="form-control" @error('name') is invalid @enderror type="text" name="name" id="name" value="{{ old('name') }}" placeholder="isi disini....">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row pt-2">
                <div class="col">
                    <button type="submit" class="btn btn-info btn-block">Save</button>
                </div>
                <div class="col">
                    <button type="reset" class="btn btn-danger btn-block">Reset</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer"></div>
</div>

@endsection

