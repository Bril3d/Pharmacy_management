<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicineOrderController extends Controller
{
    public function create($id)
    {
        // Find the medicine by id
        $medicine = Medicine::findOrFail($id);

        // Show the medicine details and order form
        return view('medicine_order.create', compact('medicine'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Find the medicine by id
        $medicine = Medicine::findOrFail($id);

        // Calculate the total price
        $totalPrice = $medicine->price * $request->quantity;

        // Create the order
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'total_price' => $totalPrice,
        ]);

        // Attach the ordered medicine to the order with quantity and price
        $order->medicines()->attach($medicine->id, [
            'quantity' => $request->quantity,
            'price' => $medicine->price,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }
}
