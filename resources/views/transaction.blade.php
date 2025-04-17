@extends('layout')
@section('title', 'Transaction')
@section('content-title', 'Transaction')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Data Transaction</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="{{ route('transaction.create') }}" class="btn btn-success mb-3">Add New Item</a>
            <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Paytotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $index => $transaction)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $transaction->date}}</td>
                        <td>{{ $transaction->total}}</td>
                        <td>{{ $transaction->pay_total}}</td>
                        <td>
                            <a href="{{ route('transaction.edit', $transaction->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('transaction.destroy', $transaction->id) }}" method="POST" style="display:inline;">
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