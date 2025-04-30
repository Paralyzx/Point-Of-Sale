@extends('layout')
@section('title', 'Master Category')
@section('content-title', 'Category')
@section('content')

    @session('CategoryAdd')
    <div class="alert alert-success">{{ session ('CategoryAdd') }}</div>
    @endsession

    @session('CategoryDelete')
    <div class="alert alert-success">{{ session ('CategoryDelete') }}</div>
    @endsession

    @session('CategoryEdit')
    <div class="alert alert-success">{{ session ('CategoryEdit') }}</div>
    @endsession

    

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Data Category</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="{{ route('category.create') }}" class="btn btn-success mb-3">Add New Item</a>
            <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category->name}}</td>
                        <td>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-secondary" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <script>
                setTimeout(() => {
                    const successAlert = document.getElementById('CategoryDelete');
                    if (successAlert) {
                        successAlert.classList.remove('show'); // mulai fade out
                        setTimeout(() => successAlert.remove(), 150); // hapus dari DOM setelah animasi
                    }
            
                    const addAlert = document.getElementById('add-alert');
                    if (addAlert) {
                        addAlert.classList.remove('show');
                        setTimeout(() => addAlert.remove(), 150);
                    }
                }, 3000);
            </script>
        </div>
    </div>
</div>
@endsection