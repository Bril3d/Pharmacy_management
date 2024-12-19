<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::paginate(10);
        return view('medicines.index', compact('medicines'));
    }

    public function show(Medicine $medicine)
    {
        $orders = $medicine->orders()->withPivot('quantity', 'price')->get();
        return view('medicines.show', compact('medicine', 'orders'));
    }

    public function create()
    {
        return view('medicines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'requried|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('medicines', 'public');
        }

        Medicine::create($data);

        return redirect()->route('medicines.index')->with('success', 'Medicine added successfully.');
    }

    public function edit(Medicine $medicine)
    {
        return view('medicines.edit', compact('medicine'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($medicine->image && Storage::disk('public')->exists($medicine->image)) {
                Storage::disk('public')->delete($medicine->image);
            }

            $data['image'] = $request->file('image')->store('medicines', 'public');
        }

        $medicine->update($data);

        return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully.');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('medicines.index')->with('success', 'Medicine deleted successfully.');
    }
}
