@extends('layouts.app')

@section('title', $item->name)

@section('content')
<div class="container py-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('menu') }}">Menu</a></li>
            <li class="breadcrumb-item active">{{ $item->name }}</li>
        </ol>
    </nav>

    <div class="row g-5">
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <img src="{{ $item->image ?? 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=600' }}" 
                     class="img-fluid" style="width: 100%; height: 400px; object-fit: cover;" alt="{{ $item->name }}">
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="mb-3">
                <span class="badge bg-primary mb-2" style="font-size: 0.9rem;">{{ $item->category->name ?? 'Uncategorized' }}</span>
                @if($item->is_featured)
                    <span class="badge bg-warning text-dark mb-2" style="font-size: 0.9rem;">⭐ Featured</span>
                @endif
            </div>
            
            <h1 class="display-4 fw-bold mb-3" style="color: var(--dark);">{{ $item->name }}</h1>
            
            <div class="mb-4">
                <span class="display-5 fw-bold" style="color: var(--primary);">₹{{ number_format($item->price) }}</span>
            </div>
            
            <p class="lead text-muted mb-4">{{ $item->description }}</p>
            
            <div class="mb-4">
                <h6 class="text-muted mb-2">Availability</h6>
                @if($item->is_available)
                    <span class="badge bg-success fs-6"><i class="fas fa-check me-1"></i> In Stock</span>
                @else
                    <span class="badge bg-danger fs-6"><i class="fas fa-times me-1"></i> Out of Stock</span>
                @endif
            </div>
            
            <hr>
            
            <div class="d-flex gap-3 mt-4">
                <a href="{{ route('menu') }}" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-arrow-left me-2"></i>Back to Menu
                </a>
                <a href="{{ route('reservations') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-calendar-check me-2"></i>Reserve Table
                </a>
            </div>
        </div>
    </div>
    
    @if($relatedItems->count() > 0)
    <div class="mt-5 pt-5">
        <h3 class="fw-bold mb-4">You Might Also Like</h3>
        <div class="row g-4">
            @foreach($relatedItems as $related)
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{ $related->image ?? 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=400' }}" 
                         class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $related->name }}</h5>
                        <p class="text-muted small">{{ Str::limit($related->description, 60) }}</p>
                    </div>
                    <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0" style="color: var(--primary);">₹{{ number_format($related->price) }}</h5>
                        <a href="{{ route('menu.show', $related->id) }}" class="btn btn-primary btn-sm">View</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
