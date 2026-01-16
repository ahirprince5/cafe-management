<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::orderBy('created_at', 'desc')->take(20)->get();
        $averageRating = Rating::avg('rating') ?? 0;
        
        return view('ratings', compact('ratings', 'averageRating'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
            'customer_name' => 'required|string|max:255'
        ]);

        $validated['user_id'] = Auth::id() ?? 1;

        Rating::create($validated);

        return redirect()->back()->with('success', 'Thank you for your rating!');
    }
}
