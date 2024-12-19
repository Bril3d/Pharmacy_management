@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Orders</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-success mb-3">Create Order</a>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Customer Address</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->customer_address }}</td>
                    <td>${{ number_format($order->total_price, 2) }}</td>
                <td>
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-info btn-sm">View</a>
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
