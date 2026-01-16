@extends('layouts.app')

@section('title', 'Customer Reviews')

@section('content')
<div class="page-title">
    <h1><i class="fas fa-star me-3"></i>Customer Reviews</h1>
    <p class="mb-0">See what our customers are saying</p>
</div>

<div class="container mb-5">
    <div class="row g-4">
        <!-- Ratings Summary -->
        <div class="col-lg-4">
            <div class="card shadow-lg border-0 text-center" style="border-radius: 20px; background: linear-gradient(135deg, var(--dark), var(--primary)); color: white;">
                <div class="card-body p-5">
                    <h1 class="display-1 fw-bold mb-0">{{ number_format($averageRating, 1) }}</h1>
                    <div class="mb-3">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= round($averageRating) ? 'text-gold' : 'text-light' }} fa-lg"></i>
                        @endfor
                    </div>
                    <p class="mb-0">Based on {{ $ratings->count() }} reviews</p>
                </div>
            </div>

            <!-- Submit Review Form -->
            <div class="card shadow border-0 mt-4" style="border-radius: 20px;">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4"><i class="fas fa-pen me-2" style="color: var(--primary);"></i>Leave a Review</h4>
                    
                    <form method="POST" action="{{ route('ratings.store') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label fw-medium">Your Name</label>
                            <input type="text" name="customer_name" class="form-control" 
                                   placeholder="Your name" required value="{{ auth()->user()->name ?? old('customer_name') }}">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-medium">Your Rating</label>
                            <div class="star-rating" id="starRating">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star star" data-rating="{{ $i }}" style="font-size: 2rem; cursor: pointer;"></i>
                                @endfor
                            </div>
                            <input type="hidden" name="rating" id="ratingInput" value="5" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-medium">Your Review</label>
                            <textarea name="review" class="form-control" rows="4" 
                                      placeholder="Tell us about your experience...">{{ old('review') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-paper-plane me-2"></i>Submit Review
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Reviews List -->
        <div class="col-lg-8">
            <h4 class="fw-bold mb-4">Recent Reviews</h4>
            
            @if($ratings->count() > 0)
                @foreach($ratings as $rating)
                <div class="card shadow-sm border-0 mb-3" style="border-radius: 15px;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="mb-1 fw-bold">{{ $rating->customer_name }}</h5>
                                <small class="text-muted">
                                    <i class="fas fa-clock me-1"></i>{{ $rating->created_at->diffForHumans() }}
                                </small>
                            </div>
                            <div>
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $rating->rating ? 'text-gold' : 'text-muted' }}"></i>
                                @endfor
                            </div>
                        </div>
                        @if($rating->review)
                            <p class="mb-0 text-muted">{{ $rating->review }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            @else
                <!-- Sample Reviews when database is empty -->
                <div class="card shadow-sm border-0 mb-3" style="border-radius: 15px;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="mb-1 fw-bold">Priya Sharma</h5>
                                <small class="text-muted"><i class="fas fa-clock me-1"></i>2 days ago</small>
                            </div>
                            <div>
                                <i class="fas fa-star text-gold"></i>
                                <i class="fas fa-star text-gold"></i>
                                <i class="fas fa-star text-gold"></i>
                                <i class="fas fa-star text-gold"></i>
                                <i class="fas fa-star text-gold"></i>
                            </div>
                        </div>
                        <p class="mb-0 text-muted">Amazing coffee and wonderful ambiance! The staff was incredibly friendly and the food was delicious. Will definitely come back!</p>
                    </div>
                </div>
                <div class="card shadow-sm border-0 mb-3" style="border-radius: 15px;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="mb-1 fw-bold">Rahul Patel</h5>
                                <small class="text-muted"><i class="fas fa-clock me-1"></i>5 days ago</small>
                            </div>
                            <div>
                                <i class="fas fa-star text-gold"></i>
                                <i class="fas fa-star text-gold"></i>
                                <i class="fas fa-star text-gold"></i>
                                <i class="fas fa-star text-gold"></i>
                                <i class="fas fa-star text-muted"></i>
                            </div>
                        </div>
                        <p class="mb-0 text-muted">Great place to work remotely. Fast wifi and the cappuccino is top-notch. The only downside is it gets crowded on weekends.</p>
                    </div>
                </div>
                <div class="card shadow-sm border-0 mb-3" style="border-radius: 15px;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="mb-1 fw-bold">Anita Desai</h5>
                                <small class="text-muted"><i class="fas fa-clock me-1"></i>1 week ago</small>
                            </div>
                            <div>
                                <i class="fas fa-star text-gold"></i>
                                <i class="fas fa-star text-gold"></i>
                                <i class="fas fa-star text-gold"></i>
                                <i class="fas fa-star text-gold"></i>
                                <i class="fas fa-star text-gold"></i>
                            </div>
                        </div>
                        <p class="mb-0 text-muted">Best cheesecake in town! The chocolate cake was heavenly too. Perfect spot for a weekend brunch with friends.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star-rating .star');
    const ratingInput = document.getElementById('ratingInput');
    
    stars.forEach(star => {
        star.addEventListener('click', function() {
            const rating = this.dataset.rating;
            ratingInput.value = rating;
            
            stars.forEach((s, index) => {
                if (index < rating) {
                    s.style.color = '#FFD700';
                } else {
                    s.style.color = '#ddd';
                }
            });
        });
        
        star.addEventListener('mouseenter', function() {
            const rating = this.dataset.rating;
            stars.forEach((s, index) => {
                if (index < rating) {
                    s.style.color = '#FFD700';
                }
            });
        });
    });
    
    document.querySelector('.star-rating').addEventListener('mouseleave', function() {
        const currentRating = ratingInput.value;
        stars.forEach((s, index) => {
            if (index < currentRating) {
                s.style.color = '#FFD700';
            } else {
                s.style.color = '#ddd';
            }
        });
    });
    
    // Set initial stars to gold (default 5)
    stars.forEach(s => s.style.color = '#FFD700');
});
</script>
@endsection
