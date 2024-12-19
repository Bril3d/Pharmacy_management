@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Orders</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Create Order</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Customer Address</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->customer_address }}</td>
                <td>${{ $order->total_price }}</td>
                <td>
                    <a href="{{ route('orders.show', $order) }}" class="btn btn-info">View</a>
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
