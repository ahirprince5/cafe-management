<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Rating;
use App\Models\Reservation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredItems = MenuItem::where('is_featured', true)->take(6)->get();
        $averageRating = Rating::avg('rating') ?? 4.5;
        $totalReservations = Reservation::count();
        $recentRatings = Rating::orderBy('created_at', 'desc')->take(3)->get();
        
        return view('home', compact('featuredItems', 'averageRating', 'totalReservations', 'recentRatings'));
    }
}
