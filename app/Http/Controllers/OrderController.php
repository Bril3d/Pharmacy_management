<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $orders = Order::with('medicines')->latest()->get();
            return view('orders.index', compact('orders'));
        } else {
            $orders = Order::with(['user', 'medicines'])->where('user_id', auth()->id())->paginate(10);
            return view('orders.index', compact('orders'));
        }
    }

    public function create()
    {
        $medicines = Medicine::all();
        return view('orders.create', compact('medicines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_address' => 'required|string|max:255',
            'medicines' => 'required|array',
            'medicines.*.id' => 'required|exists:medicines,id',
            'medicines.*.quantity' => 'required|integer|min:1',
        ]);

        $totalPrice = 0;

        foreach ($request->medicines as $medicine) {
            $medicineModel = Medicine::find($medicine['id']);
            $totalPrice += $medicineModel->price * $medicine['quantity'];
        }

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'total_price' => $totalPrice,
            'user_id' => auth()->id(),
        ]);

        foreach ($request->medicines as $medicine) {
            $order->medicines()->attach($medicine['id'], [
                'quantity' => $medicine['quantity'],
                'price' => Medicine::find($medicine['id'])->price,
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        $order->load('medicines');
        return view('orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
