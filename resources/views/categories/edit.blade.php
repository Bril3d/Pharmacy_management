@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<h1>Edit Category</h1>
<form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-success mt-3">Update</button>
</form>
@endsection
