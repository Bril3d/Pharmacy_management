<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Order;
use App\Models\Supplier;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMedicines = Medicine::count();
        $lowStock = Medicine::where('quantity', '<', 10)->count();
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total_price');
        $totalSuppliers = Supplier::count();

        return view('dashboard.index', compact('totalMedicines', 'lowStock', 'totalOrders', 'totalRevenue', 'totalSuppliers'));
    }
}
