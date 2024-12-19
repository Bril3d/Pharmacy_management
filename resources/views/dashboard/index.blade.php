@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Dashboard</h1>
<div class="row">
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Medicines</h5>
                    <p class="display-4">{{ $totalMedicines }}</p>
            </div>
        </div>
    </div>
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 bg-warning text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Low Stock</h5>
                    <p class="display-4">{{ $lowStock }}</p>
            </div>
        </div>
    </div>
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Orders</h5>
                    <p class="display-4">{{ $totalOrders }}</p>
            </div>
        </div>
    </div>
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 bg-success text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Revenue</h5>
                    <p class="display-4">${{ $totalRevenue }}</p>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
