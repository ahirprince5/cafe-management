@extends('admin.layout')

@section('title', 'Categories')

@section('content')
<h2 class="mb-4"><i class="fas fa-tags"></i> Categories</h2>

<div class="row">
    <!-- Add Category Form -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-white">
                <h6 class="mb-0">Add New Category</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Category Name *</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="2"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-plus"></i> Add Category
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Categories List -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white">
                <h6 class="mb-0">All Categories</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Items</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $cat)
                        <tr>
                            <td><strong>{{ $cat->name }}</strong></td>
                            <td>{{ $cat->description ?? '-' }}</td>
                            <td>{{ $cat->menu_items_count }} items</td>
                            <td>
                                <form action="{{ route('admin.categories.delete', $cat->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                            onclick="return confirm('Delete this category?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center text-muted">No categories found</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
