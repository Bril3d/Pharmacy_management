
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Supplier</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('suppliers.update', $supplier) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Supplier Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $supplier->name }}" required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact Person</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="{{ $supplier->contact }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $supplier->email }}" required>
                </div>
                <div class="form-group">
                    <label for="address">Supplier Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3">{{ $supplier->address }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Supplier</button>
                <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection