@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Order</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="customer_name" class="form-label">Customer Name</label>
            <input type="text" class="form-control" name="customer_name" id="customer_name" required>
        </div>
        <div class="mb-3">
            <label for="customer_phone" class="form-label">Customer Address</label>
            <input type="text" class="form-control" name="customer_address" id="customer_address" required>
        </div>
        <h4>Medicines</h4>
        <div id="medicine-list">
            <div class="mb-3">
                <select name="medicines[0][id]" class="form-control" required>
                    <option value="">Select Medicine</option>
                    @foreach ($medicines as $medicine)
                    <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                    @endforeach
                </select>
                <input type="number" name="medicines[0][quantity]" class="form-control mt-2" placeholder="Quantity" required>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" id="add-medicine">Add More</button>
        <button type="submit" class="btn btn-primary mt-3">Create Order</button>
    </form>
</div>
<script>
    let medicineCount = 1;
    document.getElementById('add-medicine').addEventListener('click', () => {
        const medicineList = document.getElementById('medicine-list');
        const newMedicine = document.createElement('div');
        newMedicine.classList.add('mb-3');
        newMedicine.innerHTML = `
            <select name="medicines[${medicineCount}][id]" class="form-control" required>
                <option value="">Select Medicine</option>
                @foreach ($medicines as $medicine)
                <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                @endforeach
            </select>
            <input type="number" name="medicines[${medicineCount}][quantity]" class="form-control mt-2" placeholder="Quantity" required>
        `;
        medicineList.appendChild(newMedicine);
        medicineCount++;
    });
</script>
@endsection
