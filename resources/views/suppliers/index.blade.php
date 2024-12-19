@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Suppliers</h1>
    <a href="{{ route('suppliers.create') }}" class="btn btn-primary mb-3">Add Supplier</a>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->contact }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->address }}</td>
                        <td>
                            <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this supplier?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $suppliers->links() }}
        </div>
    </div>
</div>
@endsection