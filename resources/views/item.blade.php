@extends('layout')
@section('title', 'item')
@section('content-title', 'Item')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Data Item</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="{{ route('item.create') }}" class="btn btn-success mb-3">Add New Item</a>
            <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price</th>  
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->price}}</td>
                        <td>{{ $item->stock}}</td>
                        <td>
                            <a href="{{ route('item.edit', $item->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('item.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-secondary" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection