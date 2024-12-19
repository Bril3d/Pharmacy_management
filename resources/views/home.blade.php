@extends('layouts.app')

@section('title', 'Welcome to Our Pharmacy')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <section class="hero bg-light py-5 text-center">
        <h1>Welcome to Our Pharmacy</h1>
        <p class="lead">Your trusted partner in health and wellness.</p>
        <a href="#services" class="btn btn-primary btn-lg">Explore Our Services</a>
    </section>

    <!-- Latest Medicines Section -->
    <section id="latest-medicines" class="py-5">
        <h2 class="text-center mb-4">Latest Medicines</h2>
        <div class="row">
            @foreach($latestMedicines as $medicine)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                    <div class="col-md-12 mb-2">
                        @if($medicine->image)
                            <img 
                                src="{{ asset('storage/' . $medicine->image) }}" 
                                class="img-fluid rounded same-size" 
                                alt="{{ $medicine->name }}">
                        @else
                            <img 
                                src="{{ asset('images/default-medicine.png') }}" 
                                class="img-fluid rounded same-size" 
                                alt="Default Medicine Image">
                        @endif
                    </div>
                        <h5 class="card-title">{{ $medicine->name }}</h5>
                        <p class="card-text">{{ Str::limit($medicine->description, 100) }}</p>
                        <p><strong>Price:</strong> ${{ $medicine->price }}</p>
                         <a href="{{ route('medicine_order.create', $medicine->id) }}" class="btn btn-primary">Order Medicine</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="bg-light py-5">
        <h2 class="text-center mb-4">Our Services</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <i class="bi bi-bag-fill display-4 text-primary"></i>
                <h5>Pharmaceutical Sales</h5>
                <p>We offer a wide range of medicines and health products at competitive prices.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-heart-pulse-fill display-4 text-primary"></i>
                <h5>Health Consultations</h5>
                <p>Our experts provide advice to help you choose the right products for your needs.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-truck display-4 text-primary"></i>
                <h5>Delivery Services</h5>
                <p>Convenient delivery services for your health products right at your doorstep.</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <h2 class="text-center mb-4">Contact Us</h2>
        <div class="row">
            <div class="col-md-6">
                <h5>Get in Touch</h5>
                <p>We are here to assist you with all your health and wellness needs. Feel free to reach out to us.</p>
                <p><strong>Phone:</strong> (123) 456-7890</p>
                <p><strong>Email:</strong> info@pharmacy.com</p>
            </div>
            <div class="col-md-6">
                <h5>Location</h5>
                <p>123 Main Street, Cityville, Country</p>
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509643!2d144.9537353155048!3d-37.81720974202125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577ee4c4f762f0!2sVictoria%20State%20Library!5e0!3m2!1sen!2sau!4v1618885741725!5m2!1sen!2sau" 
                    width="100%" 
                    height="200" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </section>
</div>

<style>
    .same-size {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
</style>
@endsection
