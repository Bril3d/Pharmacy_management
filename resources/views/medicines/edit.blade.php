@extends('layouts.app')

@section('title', 'Edit Medicine')

@section('content')
<h1>Edit Medicine</h1>
<form action="{{ route('medicines.update', $medicine) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $medicine->name }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control">{{ $medicine->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $medicine->quantity }}" required>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $medicine->price }}" required>
    </div>
    <button type="submit" class="btn btn-success mt-3">Update</button>
</form>
@endsection
