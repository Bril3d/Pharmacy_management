@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1>Dashboard</h1>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Total Medicines</h5>
                <p>{{ $totalMedicines }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Low Stock</h5>
                <p>{{ $lowStock }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Total Orders</h5>
                <p>{{ $totalOrders }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Total Revenue</h5>
                <p>${{ $totalRevenue }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
