@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<h2 class="mb-4"><i class="fas fa-tachometer-alt"></i> Dashboard</h2>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card stat-card p-3">
            <h3>{{ $stats['total_items'] }}</h3>
            <p class="mb-0">Menu Items</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-3">
            <h3>{{ $stats['total_categories'] }}</h3>
            <p class="mb-0">Categories</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-3">
            <h3>{{ $stats['total_tables'] }}</h3>
            <p class="mb-0">Tables</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-3">
            <h3>{{ $stats['pending_reservations'] }}</h3>
            <p class="mb-0">Pending Reservations</p>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h4>{{ $stats['total_reservations'] }}</h4>
            <p class="text-muted mb-0">Total Reservations</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h4>{{ number_format($stats['avg_rating'], 1) }} <i class="fas fa-star text-warning"></i></h4>
            <p class="text-muted mb-0">Avg Rating</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h4>{{ $stats['total_ratings'] }}</h4>
            <p class="text-muted mb-0">Total Reviews</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h4>{{ $stats['total_users'] }}</h4>
            <p class="text-muted mb-0">Registered Users</p>
        </div>
    </div>
</div>

<!-- Recent Reservations -->
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0"><i class="fas fa-clock"></i> Recent Reservations</h5>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Table</th>
                    <th>Date & Time</th>
                    <th>Guests</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recent_reservations as $res)
                <tr>
                    <td>{{ $res->customer_name }}</td>
                    <td>Table {{ $res->cafeTable->table_number ?? 'N/A' }}</td>
                    <td>{{ $res->reservation_date }} at {{ $res->reservation_time }}</td>
                    <td>{{ $res->guests }}</td>
                    <td>
                        <span class="badge bg-{{ $res->status == 'confirmed' ? 'success' : ($res->status == 'pending' ? 'warning' : 'secondary') }}">
                            {{ ucfirst($res->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted">No reservations yet</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
