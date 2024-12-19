@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order Details</h1>
    <div class="card mb-4">
        <div class="card-body">
            <h5>Customer Name: {{ $order->customer_name }}</h5>
            <h5>Customer Address: {{ $order->customer_address }}</h5>
            <h5>Total Price: ${{ $order->total_price }}</h5>
        </div>
    </div>

    <h4>Medicines</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Medicine</th>
                <th>Quantity</th>
                <th>Price (Each)</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->medicines as $medicine)
            <tr>
                <td><a href="{{ route('medicines.show', $medicine) }}">{{ $medicine->name }}</a></td>
                <td>{{ $medicine->pivot->quantity }}</td>
                <td>${{ $medicine->price }}</td>
                <td>${{ $medicine->pivot->quantity * $medicine->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-end mt-4">
        <button class="btn btn-secondary" onclick="window.print()">Print Invoice</button>
    </div>
</div>
@endsection
