@extends('admin.layout')

@section('title', 'Menu Items')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-utensils"></i> Menu Items</h2>
    <a href="{{ route('admin.menu-items.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New Item
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Featured</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr>
                    <td>
                        <img src="{{ $item->image ?? 'https://via.placeholder.com/50' }}" 
                             alt="{{ $item->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                    </td>
                    <td><strong>{{ $item->name }}</strong></td>
                    <td>{{ $item->category->name ?? 'N/A' }}</td>
                    <td>₹{{ number_format($item->price) }}</td>
                    <td>
                        <span class="badge bg-{{ $item->is_available ? 'success' : 'danger' }}">
                            {{ $item->is_available ? 'Available' : 'Unavailable' }}
                        </span>
                    </td>
                    <td>
                        @if($item->is_featured)
                            <i class="fas fa-star text-warning"></i>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.menu-items.edit', $item->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.menu-items.delete', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this item?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted">No menu items found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
