@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Medicine Details</h1>
    <div class="card mb-4">
        <div class="card-body">
            <h5>Name: {{ $medicine->name }}</h5>
            <h5>Price: ${{ $medicine->price }}</h5>
            <p>Description: {{ $medicine->description }}</p>
            <p>Stock: {{ $medicine->stock }}</p>
        </div>
    </div>

    <h4>Orders Containing This Medicine</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Quantity</th>
                <th>Price (Each)</th>
                <th>Subtotal</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td><a href="{{ route('orders.show', $order) }}">{{ $order->id }}</a></td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->pivot->quantity }}</td>
                <td>${{ $order->pivot->price }}</td>
                <td>${{ $order->pivot->quantity * $order->pivot->price }}</td>
                <td>{{ $order->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
