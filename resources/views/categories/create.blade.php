@extends('layouts.app')

@section('title', 'Add Category')

@section('content')
<h1>Add Category</h1>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success mt-3">Add</button>
</form>
@endsection