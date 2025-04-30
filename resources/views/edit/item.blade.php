@extends('layout')
@section('title', 'Edit Item')
@section('content-title', 'Edit Item Data')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Edit Item Form</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('item.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group mb-3">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" id="category_id" required>
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="name">Item Name</label>
                <input class="form-control" type="text" name="name" id="name" 
                       value="{{ old('name', $item->name) }}" placeholder="Enter item name..." required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="price">Price</label>
                <input class="form-control" type="number" name="price" id="price" 
                       value="{{ old('price', $item->price) }}" placeholder="Enter price..." min="0" required>
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="stock">Stock</label>
                <input class="form-control" type="number" name="stock" id="stock" 
                       value="{{ old('stock', $item->stock) }}" placeholder="Enter stock quantity..." min="0" required>
                @error('stock')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row pt-2">
                <div class="col">
                    <button type="submit" class="btn btn-info btn-block">Update</button>
                </div>
                <div class="col">
                    <a href="{{ route('item.index') }}" class="btn btn-danger btn-block">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer"></div>
</div>

@endsection