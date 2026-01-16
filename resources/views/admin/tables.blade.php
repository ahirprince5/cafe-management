@extends('admin.layout')

@section('title', 'Tables')

@section('content')
<h2 class="mb-4"><i class="fas fa-chair"></i> Café Tables</h2>

<div class="row">
    <!-- Add Table Form -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-white">
                <h6 class="mb-0">Add New Table</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tables.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Table Number *</label>
                        <input type="number" name="table_number" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Capacity (seats) *</label>
                        <input type="number" name="capacity" class="form-control" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" placeholder="e.g., Window Side">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-plus"></i> Add Table
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Tables List -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white">
                <h6 class="mb-0">All Tables</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Table #</th>
                            <th>Capacity</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tables as $table)
                        <tr>
                            <td><strong>Table {{ $table->table_number }}</strong></td>
                            <td>{{ $table->capacity }} seats</td>
                            <td>{{ $table->location ?? '-' }}</td>
                            <td>
                                <span class="badge bg-{{ $table->status == 'available' ? 'success' : 'warning' }}">
                                    {{ ucfirst($table->status) }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('admin.tables.delete', $table->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                            onclick="return confirm('Delete this table?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center text-muted">No tables found</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
