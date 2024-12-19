@extends('layouts.app')

@section('title', 'Medicines')

@section('content')
<div class="container">
    <h1 class="mb-4">Medicines</h1>
    <a href="{{ route('medicines.create') }}" class="btn btn-primary mb-3">Add Medicine</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($medicines->count())
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price ($)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medicines as $medicine)
                <tr>
                    <td>
                        @if($medicine->image)
                            <img src="{{ asset('storage/' . $medicine->image) }}" alt="{{ $medicine->name }}" width="50">
                        @else
                            <img src="{{ asset('images/default-medicine.png') }}" alt="Default Image" width="50">
                        @endif
                    </td>
                    <td>{{ $medicine->name }}</td>
                    <td>{{ $medicine->quantity }}</td>
                    <td>{{ number_format($medicine->price, 2) }}</td>
                    <td>
                        <a href="{{ route('medicines.edit', $medicine) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('medicines.destroy', $medicine) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this medicine?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $medicines->links() }}
    @else
        <div class="alert alert-info">No medicines found.</div>
    @endif
</div>
@endsection
