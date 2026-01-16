@extends('layouts.app')

@section('title', 'Reserve a Table')

@section('content')
<div class="page-title">
    <h1><i class="fas fa-calendar-check me-3"></i>Reserve a Table</h1>
    <p class="mb-0">Book your perfect spot at Café Aroma</p>
</div>

<div class="container mb-5">
    <div class="row g-4">
        <!-- Reservation Form -->
        <div class="col-lg-7">
            <div class="card shadow-lg border-0" style="border-radius: 20px;">
                <div class="card-body p-5">
                    <h3 class="fw-bold mb-4"><i class="fas fa-edit me-2" style="color: var(--primary);"></i>Make a Reservation</h3>
                    
                    <form method="POST" action="{{ route('reservations.store') }}">
                        @csrf
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Your Name</label>
                                <input type="text" name="customer_name" class="form-control" 
                                       placeholder="Enter your name" required value="{{ auth()->user()->name ?? old('customer_name') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Phone Number</label>
                                <input type="tel" name="customer_phone" class="form-control" 
                                       placeholder="+91 98765 43210" required value="{{ old('customer_phone') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Select Table</label>
                                <select name="cafe_table_id" class="form-select" required>
                                    <option value="">Choose a table</option>
                                    @forelse($tables as $table)
                                        <option value="{{ $table->id }}">
                                            Table {{ $table->table_number }} ({{ $table->capacity }} seats) - {{ $table->location ?? 'Main Area' }}
                                        </option>
                                    @empty
                                        <option value="1">Table 1 (2 seats) - Window</option>
                                        <option value="2">Table 2 (4 seats) - Center</option>
                                        <option value="3">Table 3 (4 seats) - Corner</option>
                                        <option value="4">Table 4 (6 seats) - Private</option>
                                        <option value="5">Table 5 (8 seats) - Group</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Number of Guests</label>
                                <input type="number" name="guests" class="form-control" 
                                       min="1" max="10" placeholder="2" required value="{{ old('guests', 2) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Date</label>
                                <input type="date" name="reservation_date" class="form-control" 
                                       min="{{ date('Y-m-d') }}" required value="{{ old('reservation_date') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Time</label>
                                <select name="reservation_time" class="form-select" required>
                                    <option value="">Choose time</option>
                                    <option value="09:00">9:00 AM</option>
                                    <option value="10:00">10:00 AM</option>
                                    <option value="11:00">11:00 AM</option>
                                    <option value="12:00">12:00 PM</option>
                                    <option value="13:00">1:00 PM</option>
                                    <option value="14:00">2:00 PM</option>
                                    <option value="15:00">3:00 PM</option>
                                    <option value="16:00">4:00 PM</option>
                                    <option value="17:00">5:00 PM</option>
                                    <option value="18:00">6:00 PM</option>
                                    <option value="19:00">7:00 PM</option>
                                    <option value="20:00">8:00 PM</option>
                                    <option value="21:00">9:00 PM</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-medium">Special Requests (Optional)</label>
                                <textarea name="special_requests" class="form-control" rows="3" 
                                          placeholder="Any special requirements or notes...">{{ old('special_requests') }}</textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">
                            <i class="fas fa-check me-2"></i>Confirm Reservation
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Info Sidebar -->
        <div class="col-lg-5">
            <div class="card shadow border-0 mb-4" style="border-radius: 20px; background: linear-gradient(135deg, var(--dark), var(--primary)); color: white;">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4"><i class="fas fa-clock me-2"></i>Opening Hours</h4>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex justify-content-between mb-2">
                            <span>Monday - Friday</span>
                            <span>8:00 AM - 10:00 PM</span>
                        </li>
                        <li class="d-flex justify-content-between mb-2">
                            <span>Saturday</span>
                            <span>9:00 AM - 11:00 PM</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Sunday</span>
                            <span>10:00 AM - 9:00 PM</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card shadow border-0 mb-4" style="border-radius: 20px;">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3"><i class="fas fa-info-circle me-2" style="color: var(--primary);"></i>Reservation Policy</h4>
                    <ul class="text-muted">
                        <li>Reservations are held for 15 minutes</li>
                        <li>For parties larger than 8, please call us</li>
                        <li>Cancellations must be made 2 hours in advance</li>
                        <li>Special dietary needs? Let us know!</li>
                    </ul>
                </div>
            </div>

            @if(count($userReservations ?? []) > 0)
            <div class="card shadow border-0" style="border-radius: 20px;">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3"><i class="fas fa-history me-2" style="color: var(--primary);"></i>Your Reservations</h4>
                    @foreach($userReservations as $res)
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <div>
                            <strong>Table {{ $res->cafeTable->table_number ?? 'N/A' }}</strong><br>
                            <small class="text-muted">{{ $res->reservation_date }} at {{ $res->reservation_time }}</small>
                        </div>
                        <span class="badge bg-{{ $res->status == 'confirmed' ? 'success' : ($res->status == 'pending' ? 'warning' : 'secondary') }}">
                            {{ ucfirst($res->status) }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
