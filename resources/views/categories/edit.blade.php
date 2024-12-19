@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Category</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category) }}" method="POST">
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
                        value="{{ old('name', $category->name) }}" 
                        required
                        placeholder="Enter category name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description Field -->
                <div class="form-group mb-4">
                    <label for="description" class="form-label">Description</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        class="form-control @error('description') is-invalid @enderror" 
                        rows="4" 
                        placeholder="Enter category description">{{ old('description', $category->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Update Category</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
