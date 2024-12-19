@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Order Medicine: {{ $medicine->name }}</h1>
    <div class="row">
        <div class="col-md-6">
            @if($medicine->image)
                <img src="{{ asset('storage/' . $medicine->image) }}" class="img-fluid rounded" alt="{{ $medicine->name }}">
            @else
                <img src="{{ asset('images/default-medicine.png') }}" class="img-fluid rounded" alt="Default Medicine Image">
            @endif
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $medicine->name }}</h3>
                    <p class="card-text">{{ $medicine->description }}</p>
                    <p class="card-text"><strong>Price:</strong> ${{ number_format($medicine->price, 2) }}</p>
                    
                    <form action="{{ route('medicine_order.store', $medicine) }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input 
                                type="number" 
                                name="quantity" 
                                id="quantity" 
                                class="form-control @error('quantity') is-invalid @enderror" 
                                min="1" 
                                required 
                                value="{{ old('quantity', 1) }}"
                            >
                            @error('quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Customer Name</label>
                            <input 
                                type="text" 
                                name="customer_name" 
                                id="customer_name" 
                                class="form-control @error('customer_name') is-invalid @enderror" 
                                required 
                            >
                            @error('customer_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                                                <div class="mb-3">
                            <label for="name" class="form-label">Customer Address</label>
                            <input 
                                type="text" 
                                name="customer_address" 
                                id="customer_address" 
                                class="form-control @error('customer_address') is-invalid @enderror" 
                                required 
                            >
                            @error('customer_address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                
                        <button type="submit" class="btn btn-primary">Place Order</button>
                        {{-- <a href="{{ route('medicines.show', $medicine) }}" class="btn btn-secondary">Cancel</a> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
