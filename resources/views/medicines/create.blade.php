@extends('layouts.app')

@section('title', 'Add Medicine')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New Medicine</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('medicines.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Medicine Name</label>
                    <input 
                        type="text" 
                        class="form-control @error('name') is-invalid @enderror" 
                        id="name" 
                        name="name" 
                        value="{{ old('name') }}" 
                        required
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <!-- Quantity Field -->
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input 
                        type="number" 
                        class="form-control @error('quantity') is-invalid @enderror" 
                        id="quantity" 
                        name="quantity" 
                        value="{{ old('quantity') }}" 
                        required 
                        min="1"
                    >
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Price Field -->
                <div class="mb-3">
                    <label for="price" class="form-label">Price ($)</label>
                    <input 
                        type="number" 
                        step="0.01" 
                        class="form-control @error('price') is-invalid @enderror" 
                        id="price" 
                        name="price" 
                        value="{{ old('price') }}" 
                        required 
                        min="0"
                    >
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Image Upload Field -->
                <div class="mb-3">
                    <label for="image" class="form-label">Medicine Image</label>
                    <input 
                        type="file" 
                        class="form-control @error('image') is-invalid @enderror" 
                        id="image" 
                        name="image" 
                        accept="image/*"
                    >
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">Add Medicine</button>
                <a href="{{ route('medicines.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
