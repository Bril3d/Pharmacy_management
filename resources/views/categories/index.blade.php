@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Categories</h1>
<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add Category</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover table-responsive">
                <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i> Delete</button>
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
