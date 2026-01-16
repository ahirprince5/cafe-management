@extends('admin.layout')

@section('title', isset($item) ? 'Edit Menu Item' : 'Add Menu Item')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.menu-items') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left"></i> Back to Menu Items
    </a>
</div>

<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">{{ isset($item) ? 'Edit Menu Item' : 'Add New Menu Item' }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ isset($item) ? route('admin.menu-items.update', $item->id) : route('admin.menu-items.store') }}" method="POST">
            @csrf
            @if(isset($item))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Item Name *</label>
                    <input type="text" name="name" class="form-control" required
                           value="{{ old('name', $item->name ?? '') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Category *</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ (old('category_id', $item->category_id ?? '') == $cat->id) ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Description *</label>
                <textarea name="description" class="form-control" rows="3" required>{{ old('description', $item->description ?? '') }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Price (₹) *</label>
                    <input type="number" name="price" class="form-control" step="0.01" required
                           value="{{ old('price', $item->price ?? '') }}">
                </div>
                <div class="col-md-8 mb-3">
                    <label class="form-label">Image URL</label>
                    <input type="text" name="image" class="form-control" placeholder="https://..."
                           value="{{ old('image', $item->image ?? '') }}">
                    <small class="text-muted">Enter image URL (e.g., from unsplash.com)</small>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-check">
                        <input type="checkbox" name="is_available" class="form-check-input" id="is_available"
                               {{ old('is_available', $item->is_available ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_available">Available for order</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input type="checkbox" name="is_featured" class="form-check-input" id="is_featured"
                               {{ old('is_featured', $item->is_featured ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">Featured Item (shown on homepage)</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> {{ isset($item) ? 'Update Item' : 'Add Item' }}
            </button>
        </form>
    </div>
</div>
@endsection
