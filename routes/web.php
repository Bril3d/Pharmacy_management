<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Models\Medicine;
use App\Http\Controllers\MedicineOrderController;

Route::get('/', function () {
    $latestMedicines = Medicine::latest()->take(value: 5)->get();

    return view('home', compact('latestMedicines'));
});



Auth::routes();

Route::middleware(['auth'])->group(
    function () {
        Route::resource('orders', OrderController::class);
        Route::get('/order/{id}', [MedicineOrderController::class, 'create'])->name('medicine_order.create');
        Route::post('/order_store/{id}', [MedicineOrderController::class, 'store'])->name('medicine_order.store');
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    }
);
Route::middleware(['auth', 'admin'])->group(
    function () {
        Route::resource('medicines', MedicineController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('suppliers', SupplierController::class);
        Route::resource('users', UserController::class);
    }
);
