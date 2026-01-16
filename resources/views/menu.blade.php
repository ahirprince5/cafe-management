@extends('layouts.app')

@section('title', 'Our Menu')

@section('content')
<div class="page-title">
    <h1><i class="fas fa-utensils me-3"></i>Our Menu</h1>
    <p class="mb-0">Discover our delicious offerings</p>
</div>

<div class="container mb-5">
    <!-- Category Filter -->
    <div class="text-center mb-5">
        <a href="{{ route('menu') }}" class="btn {{ !request('category') ? 'btn-primary' : 'btn-outline-primary' }} m-1">
            All Items
        </a>
        @foreach($categories as $category)
            <a href="{{ route('menu', ['category' => $category->id]) }}" 
               class="btn {{ request('category') == $category->id ? 'btn-primary' : 'btn-outline-primary' }} m-1">
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    @if($menuItems->count() > 0)
    <div class="row g-4">
        @foreach($menuItems as $item)
        <div class="col-md-4 col-lg-3">
            <div class="card h-100 menu-card">
                <div class="position-relative">
                    <img src="{{ $item->image ?? 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=400' }}" 
                         class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $item->name }}">
                    @if($item->is_featured)
                        <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">⭐ Featured</span>
                    @endif
                </div>
                <div class="card-body">
                    <span class="badge bg-secondary mb-2">{{ $item->category->name ?? 'Uncategorized' }}</span>
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="text-muted small">{{ Str::limit($item->description, 60) }}</p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="color: var(--primary);">₹{{ number_format($item->price) }}</h5>
                    <a href="{{ route('menu.show', $item->id) }}" class="btn btn-primary btn-sm">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <!-- Sample Menu Items when database is empty -->
    <div class="row g-4">
        <!-- Beverages -->
        <div class="col-md-4 col-lg-3">
            <div class="card h-100 menu-card">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=400" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <span class="badge bg-info mb-2">Beverages</span>
                    <h5 class="card-title">Cappuccino</h5>
                    <p class="text-muted small">Espresso with steamed milk foam</p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="color: var(--primary);">₹150</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card h-100 menu-card">
                <img src="https://images.unsplash.com/photo-1461023058943-07fcbe16d735?w=400" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <span class="badge bg-info mb-2">Beverages</span>
                    <h5 class="card-title">Iced Mocha</h5>
                    <p class="text-muted small">Chilled espresso with chocolate and cream</p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="color: var(--primary);">₹180</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card h-100 menu-card">
                <img src="https://images.unsplash.com/photo-1544787219-7f47ccb76574?w=400" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <span class="badge bg-success mb-2">Snacks</span>
                    <h5 class="card-title">Croissant</h5>
                    <p class="text-muted small">Fresh baked buttery croissant</p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="color: var(--primary);">₹90</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card h-100 menu-card">
                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=400" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <span class="badge bg-warning text-dark mb-2">Main Course</span>
                    <h5 class="card-title">Margherita Pizza</h5>
                    <p class="text-muted small">Classic pizza with mozzarella and basil</p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="color: var(--primary);">₹350</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card h-100 menu-card">
                <img src="https://images.unsplash.com/photo-1481070555726-e2fe8357571d?w=400" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <span class="badge bg-success mb-2">Snacks</span>
                    <h5 class="card-title">Club Sandwich</h5>
                    <p class="text-muted small">Triple decker with chicken and veggies</p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="color: var(--primary);">₹220</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card h-100 menu-card">
                <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <span class="badge bg-danger mb-2">Desserts</span>
                    <h5 class="card-title">Chocolate Cake</h5>
                    <p class="text-muted small">Rich chocolate layers with ganache</p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="color: var(--primary);">₹180</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card h-100 menu-card">
                <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=400" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <span class="badge bg-danger mb-2">Desserts</span>
                    <h5 class="card-title">Blueberry Cheesecake</h5>
                    <p class="text-muted small">Creamy cheesecake with blueberry topping</p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="color: var(--primary);">₹220</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card h-100 menu-card">
                <img src="https://images.unsplash.com/photo-1546793665-c74683f339c1?w=400" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <span class="badge bg-info mb-2">Beverages</span>
                    <h5 class="card-title">Fresh Fruit Smoothie</h5>
                    <p class="text-muted small">Blend of seasonal fruits with yogurt</p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="color: var(--primary);">₹160</h5>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('styles')
<style>
    .menu-card {
        transition: all 0.3s ease;
    }
    .menu-card:hover {
        transform: translateY(-10px);
    }
</style>
@endsection
