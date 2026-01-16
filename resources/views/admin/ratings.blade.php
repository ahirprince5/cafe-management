@extends('admin.layout')

@section('title', 'Ratings')

@section('content')
<h2 class="mb-4"><i class="fas fa-star"></i> Customer Ratings</h2>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Rating</th>
                    <th>Review</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ratings as $rating)
                <tr>
                    <td><strong>{{ $rating->customer_name }}</strong></td>
                    <td>
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $rating->rating ? 'text-warning' : 'text-muted' }}"></i>
                        @endfor
                    </td>
                    <td>{{ Str::limit($rating->review, 100) ?? '-' }}</td>
                    <td>{{ $rating->created_at->format('M d, Y') }}</td>
                    <td>
                        <form action="{{ route('admin.ratings.delete', $rating->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" 
                                    onclick="return confirm('Delete this rating?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted">No ratings found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
