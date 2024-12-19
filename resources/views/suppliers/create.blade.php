@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New Supplier</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('suppliers.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Supplier Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter supplier name" required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact Person</label>
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact person" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="address">Supplier Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter address"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Add Supplier</button>
                <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection