<?php

namespace App\Http\Controllers;

use App\Models\CafeTable;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $tables = CafeTable::where('status', 'available')->get();
        $userReservations = [];
        
        if (Auth::check()) {
            $userReservations = Reservation::where('user_id', Auth::id())
                ->with('cafeTable')
                ->orderBy('reservation_date', 'desc')
                ->get();
        }
        
        return view('reservations', compact('tables', 'userReservations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cafe_table_id' => 'required|exists:cafe_tables,id',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'reservation_date' => 'required|date|after_or_equal:today',
            'reservation_time' => 'required',
            'guests' => 'required|integer|min:1',
            'special_requests' => 'nullable|string'
        ]);

        $validated['user_id'] = Auth::id() ?? 1;
        $validated['status'] = 'pending';

        Reservation::create($validated);

        return redirect()->back()->with('success', 'Table reserved successfully!');
    }
}
