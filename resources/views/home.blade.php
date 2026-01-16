@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="hero" style="background: linear-gradient(135deg, rgba(44, 24, 16, 0.9), rgba(139, 69, 19, 0.8)), url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=1200') center/cover; min-height: 80vh; display: flex; align-items: center; color: white;">
    <div class="container text-center">
        <h1 class="display-2 fw-bold mb-4 animate-fadeInUp" style="font-family: 'Playfair Display', serif;">
            Welcome to <span style="color: #F4A460;">Café Aroma</span>
        </h1>
        <p class="lead mb-5 animate-fadeInUp delay-1" style="font-size: 1.3rem; max-width: 600px; margin: 0 auto;">
            Where every cup tells a story. Experience the finest coffee and delicious treats in a warm, inviting atmosphere.
        </p>
        <div class="animate-fadeInUp delay-2">
            <a href="{{ route('menu') }}" class="btn btn-primary btn-lg me-3">
                <i class="fas fa-utensils me-2"></i>Explore Menu
            </a>
            <a href="{{ route('reservations') }}" class="btn btn-outline-light btn-lg" style="border-radius: 30px;">
                <i class="fas fa-calendar-check me-2"></i>Book a Table
            </a>
        </div>
        
        <!-- Stats -->
        <div class="row mt-5 pt-5 animate-fadeInUp delay-3">
            <div class="col-md-4">
                <div class="p-4" style="background: rgba(255,255,255,0.1); border-radius: 20px; backdrop-filter: blur(10px);">
                    <i class="fas fa-coffee fa-3x mb-3" style="color: #F4A460;"></i>
                    <h3 class="display-5 fw-bold">50+</h3>
                    <p class="mb-0">Menu Items</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4" style="background: rgba(255,255,255,0.1); border-radius: 20px; backdrop-filter: blur(10px);">
                    <i class="fas fa-star fa-3x mb-3" style="color: #FFD700;"></i>
                    <h3 class="display-5 fw-bold">{{ number_format($averageRating, 1) }}</h3>
                    <p class="mb-0">Customer Rating</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4" style="background: rgba(255,255,255,0.1); border-radius: 20px; backdrop-filter: blur(10px);">
                    <i class="fas fa-users fa-3x mb-3" style="color: #F4A460;"></i>
                    <h3 class="display-5 fw-bold">{{ $totalReservations }}+</h3>
                    <p class="mb-0">Happy Customers</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Items -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold" style="color: var(--dark);">Our Specialties</h2>
            <p class="text-muted">Handcrafted with love and passion</p>
        </div>
        
        @if($featuredItems->count() > 0)
        <div class="row g-4">
            @foreach($featuredItems as $item)
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{ $item->image ?? 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=400' }}" 
                         class="card-img-top" style="height: 250px; object-fit: cover;" alt="{{ $item->name }}">
                    <div class="card-body text-center">
                        <span class="badge bg-warning text-dark mb-2">Featured</span>
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="text-muted small">{{ Str::limit($item->description, 80) }}</p>
                        <h4 style="color: var(--primary);">₹{{ number_format($item->price) }}</h4>
                        <a href="{{ route('menu.show', $item->id) }}" class="btn btn-outline-primary btn-sm mt-2">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="row g-4">
            <!-- Sample Featured Items -->
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=400" class="card-img-top" style="height: 250px; object-fit: cover;">
                    <div class="card-body text-center">
                        <span class="badge bg-warning text-dark mb-2">Featured</span>
                        <h5 class="card-title">Signature Latte</h5>
                        <p class="text-muted small">Rich espresso with creamy steamed milk and a touch of caramel</p>
                        <h4 style="color: var(--primary);">₹180</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=400" class="card-img-top" style="height: 250px; object-fit: cover;">
                    <div class="card-body text-center">
                        <span class="badge bg-warning text-dark mb-2">Featured</span>
                        <h5 class="card-title">Margherita Pizza</h5>
                        <p class="text-muted small">Classic Italian pizza with fresh mozzarella and basil</p>
                        <h4 style="color: var(--primary);">₹350</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400" class="card-img-top" style="height: 250px; object-fit: cover;">
                    <div class="card-body text-center">
                        <span class="badge bg-warning text-dark mb-2">Featured</span>
                        <h5 class="card-title">Chocolate Cake</h5>
                        <p class="text-muted small">Decadent chocolate layers with rich ganache frosting</p>
                        <h4 style="color: var(--primary);">₹220</h4>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        <div class="text-center mt-5">
            <a href="{{ route('menu') }}" class="btn btn-primary btn-lg">View Full Menu</a>
        </div>
    </div>
</section>

<!-- Features -->
<section class="py-5" style="background: linear-gradient(135deg, var(--dark) 0%, var(--primary) 100%); color: white;">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3 text-center">
                <div class="p-4">
                    <i class="fas fa-leaf fa-3x mb-3" style="color: #90EE90;"></i>
                    <h5>Fresh Ingredients</h5>
                    <p class="small opacity-75">We use only the freshest, locally-sourced ingredients</p>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="p-4">
                    <i class="fas fa-mug-hot fa-3x mb-3" style="color: #F4A460;"></i>
                    <h5>Premium Coffee</h5>
                    <p class="small opacity-75">Expertly roasted beans from around the world</p>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="p-4">
                    <i class="fas fa-wifi fa-3x mb-3" style="color: #87CEEB;"></i>
                    <h5>Free Wi-Fi</h5>
                    <p class="small opacity-75">Stay connected while you enjoy your coffee</p>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="p-4">
                    <i class="fas fa-couch fa-3x mb-3" style="color: #DDA0DD;"></i>
                    <h5>Cozy Ambiance</h5>
                    <p class="small opacity-75">Relax in our warm and welcoming atmosphere</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reviews -->
@if($recentRatings->count() > 0)
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold" style="color: var(--dark);">What Our Customers Say</h2>
        </div>
        <div class="row g-4">
            @foreach($recentRatings as $rating)
            <div class="col-md-4">
                <div class="card h-100 p-4">
                    <div class="mb-3">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $rating->rating ? 'text-gold' : 'text-muted' }}"></i>
                        @endfor
                    </div>
                    <p class="mb-3">"{{ Str::limit($rating->review, 150) }}"</p>
                    <p class="fw-bold mb-0">— {{ $rating->customer_name }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
