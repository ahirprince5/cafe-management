@extends('admin.layout')

@section('title', 'Reservations')

@section('content')
<h2 class="mb-4"><i class="fas fa-calendar-check"></i> Reservations</h2>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Phone</th>
                    <th>Table</th>
                    <th>Date & Time</th>
                    <th>Guests</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservations as $res)
                <tr>
                    <td>#{{ $res->id }}</td>
                    <td><strong>{{ $res->customer_name }}</strong></td>
                    <td>{{ $res->customer_phone }}</td>
                    <td>Table {{ $res->cafeTable->table_number ?? 'N/A' }}</td>
                    <td>{{ $res->reservation_date }} at {{ $res->reservation_time }}</td>
                    <td>{{ $res->guests }}</td>
                    <td>
                        <span class="badge bg-{{ $res->status == 'confirmed' ? 'success' : ($res->status == 'pending' ? 'warning' : ($res->status == 'cancelled' ? 'danger' : 'secondary')) }}">
                            {{ ucfirst($res->status) }}
                        </span>
                    </td>
                    <td>
                        <form action="{{ route('admin.reservations.status', $res->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <select name="status" class="form-select form-select-sm d-inline" style="width: auto;" onchange="this.form.submit()">
                                <option value="pending" {{ $res->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $res->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="cancelled" {{ $res->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                <option value="completed" {{ $res->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center text-muted">No reservations found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
