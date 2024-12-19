@extends('layouts.app')

@section('title', 'Edit Medicine')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Medicine</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('medicines.update', $medicine) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{ old('name', $medicine->name) }}" 
                        required
                        placeholder="Enter medicine name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description Field -->
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        class="form-control @error('description') is-invalid @enderror" 
                        rows="4" 
                        placeholder="Enter medicine description">{{ old('description', $medicine->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Quantity Field -->
                <div class="form-group mb-3">
                    <label for="quantity" class="form-label">Quantity <span class="text-danger">*</span></label>
                    <input 
                        type="number" 
                        name="quantity" 
                        id="quantity" 
                        class="form-control @error('quantity') is-invalid @enderror" 
                        value="{{ old('quantity', $medicine->quantity) }}" 
                        required 
                        min="0"
                        placeholder="Enter available quantity">
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Price Field -->
                <div class="form-group mb-3">
                    <label for="price" class="form-label">Price ($) <span class="text-danger">*</span></label>
                    <input 
                        type="number" 
                        name="price" 
                        id="price" 
                        class="form-control @error('price') is-invalid @enderror" 
                        value="{{ old('price', $medicine->price) }}" 
                        required 
                        step="0.01" 
                        min="0"
                        placeholder="Enter price per unit">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Image Field -->
                <div class="form-group mb-4">
                    <label for="image" class="form-label">Image</label>
                    <input 
                        type="file" 
                        name="image" 
                        id="image" 
                        class="form-control @error('image') is-invalid @enderror"
                        accept="image/*">
                    @if($medicine->image)
                        <small class="form-text text-muted">Current Image:</small>
                        <img src="{{ asset('storage/' . $medicine->image) }}" alt="{{ $medicine->name }}" class="img-thumbnail mt-2" width="150">
                    @endif
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Update Medicine</button>
                    <a href="{{ route('medicines.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
