@extends('layouts.app')

@section('title', 'Welcome to Our Pharmacy')

@section('content')
<!-- Hero Section with Background Image -->
<div class="hero-section mb-5">
    <div class="hero-overlay">
        <div class="container">
            <div class="hero-content text-white text-center">
                <h1 class="display-4 fw-bold">Welcome to Our Pharmacy</h1>
                <p class="lead mb-4">Your trusted partner in health and wellness.</p>
                <a href="#services" class="btn btn-primary btn-lg px-5 rounded-pill">
                    Explore Our Services
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Latest Medicines Section -->
    <section id="latest-medicines" class="py-5">
        <div class="section-header text-center mb-5">
            <h2 class="display-6 fw-bold">Latest Medicines</h2>
            <div class="header-line mx-auto"></div>
        </div>
        <div class="row">
            @foreach($latestMedicines as $medicine)
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="medicine-image-wrapper">
                            <img 
                                src="{{ $medicine->image ? asset('storage/' . $medicine->image) : asset('images/default-medicine.png') }}" 
                                class="img-fluid" 
                                alt="{{ $medicine->name }}">
                        </div>
                        <div class="medicine-details p-4">
                            <h5 class="card-title fw-bold mb-3">{{ $medicine->name }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($medicine->description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="price-tag">${{ $medicine->price }}</span>
                                <a href="{{ route('medicine_order.create', $medicine->id) }}" class="btn btn-outline-primary rounded-pill">
                                    <i class="bi bi-cart-plus me-2"></i>Order Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-light rounded-3">
        <div class="section-header text-center mb-5">
            <h2 class="display-6 fw-bold">Our Services</h2>
            <div class="header-line mx-auto"></div>
        </div>
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="service-card p-4">
                    <div class="service-icon mb-4">
                        <i class="bi bi-bag-fill"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Pharmaceutical Sales</h5>
                    <p class="text-muted">We offer a wide range of medicines and health products at competitive prices.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card p-4">
                    <div class="service-icon mb-4">
                        <i class="bi bi-heart-pulse-fill"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Health Consultations</h5>
                    <p class="text-muted">Our experts provide advice to help you choose the right products for your needs.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card p-4">
                    <div class="service-icon mb-4">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Delivery Services</h5>
                    <p class="text-muted">Convenient delivery services for your health products right at your doorstep.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="section-header text-center mb-5">
            <h2 class="display-6 fw-bold">Contact Us</h2>
            <div class="header-line mx-auto"></div>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="contact-info p-4 bg-light rounded-3 h-100">
                    <h5 class="fw-bold mb-4">Get in Touch</h5>
                    <div class="d-flex mb-3">
                        <i class="bi bi-telephone-fill me-3 text-primary"></i>
                        <p class="mb-0">(123) 456-7890</p>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="bi bi-envelope-fill me-3 text-primary"></i>
                        <p class="mb-0">info@pharmacy.com</p>
                    </div>
                    <div class="d-flex">
                        <i class="bi bi-geo-alt-fill me-3 text-primary"></i>
                        <p class="mb-0">123 Main Street, Cityville, Country</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map-container rounded-3 overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509643!2d144.9537353155048!3d-37.81720974202125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577ee4c4f762f0!2sVictoria%20State%20Library!5e0!3m2!1sen!2sau!4v1618885741725!5m2!1sen!2sau" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .hero-section {
        position: relative;
        background: url('/images/pharmacy-hero.jpg') center/cover no-repeat;
        height: 500px;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .header-line {
        width: 50px;
        height: 3px;
        background: #007bff;
        margin-top: 1rem;
    }

    .medicine-card {
        transition: transform 0.3s ease;
    }

    .medicine-card:hover {
        transform: translateY(-5px);
    }

    .medicine-image-wrapper {
        height: 200px;
        overflow: hidden;
    }

    .medicine-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .price-tag {
        font-size: 1.25rem;
        font-weight: bold;
        color: #007bff;
    }

    .service-icon {
        width: 80px;
        height: 80px;
        background: #e7f1ff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    .service-icon i {
        font-size: 2rem;
        color: #007bff;
    }

    .service-card {
        transition: transform 0.3s ease;
    }

    .service-card:hover {
        transform: translateY(-5px);
    }

    .map-container {
        height: 100%;
        min-height: 300px;
    }

    .contact-info i {
        font-size: 1.25rem;
    }
</style>
@endsection