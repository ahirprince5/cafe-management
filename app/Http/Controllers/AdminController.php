<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;
use App\Models\CafeTable;
use App\Models\Reservation;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_items' => MenuItem::count(),
            'total_categories' => Category::count(),
            'total_tables' => CafeTable::count(),
            'total_reservations' => Reservation::count(),
            'pending_reservations' => Reservation::where('status', 'pending')->count(),
            'total_ratings' => Rating::count(),
            'avg_rating' => Rating::avg('rating') ?? 0,
            'total_users' => User::count(),
        ];
        
        $recent_reservations = Reservation::with('cafeTable')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        return view('admin.dashboard', compact('stats', 'recent_reservations'));
    }

    public function menuItems()
    {
        $items = MenuItem::with('category')->orderBy('id', 'desc')->get();
        $categories = Category::all();
        return view('admin.menu-items', compact('items', 'categories'));
    }

    public function createMenuItem()
    {
        $categories = Category::all();
        return view('admin.menu-item-form', compact('categories'));
    }

    public function storeMenuItem(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
        ]);

        MenuItem::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $request->image,
            'is_available' => $request->has('is_available'),
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('admin.menu-items')->with('success', 'Menu item added!');
    }

    public function editMenuItem($id)
    {
        $item = MenuItem::findOrFail($id);
        $categories = Category::all();
        return view('admin.menu-item-form', compact('item', 'categories'));
    }

    public function updateMenuItem(Request $request, $id)
    {
        $item = MenuItem::findOrFail($id);
        
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
        ]);

        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $request->image ?? $item->image,
            'is_available' => $request->has('is_available'),
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('admin.menu-items')->with('success', 'Menu item updated!');
    }

    public function deleteMenuItem($id)
    {
        MenuItem::findOrFail($id)->delete();
        return redirect()->route('admin.menu-items')->with('success', 'Menu item deleted!');
    }

    public function categories()
    {
        $categories = Category::withCount('menuItems')->get();
        return view('admin.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->only('name', 'description'));
        return redirect()->route('admin.categories')->with('success', 'Category added!');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        if ($category->menuItems()->count() > 0) {
            return redirect()->route('admin.categories')->with('error', 'Cannot delete - has menu items!');
        }
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Category deleted!');
    }

    public function tables()
    {
        $tables = CafeTable::orderBy('table_number')->get();
        return view('admin.tables', compact('tables'));
    }

    public function storeTable(Request $request)
    {
        $request->validate([
            'table_number' => 'required|integer|unique:cafe_tables',
            'capacity' => 'required|integer',
        ]);

        CafeTable::create($request->only('table_number', 'capacity', 'location'));
        return redirect()->route('admin.tables')->with('success', 'Table added!');
    }

    public function deleteTable($id)
    {
        CafeTable::findOrFail($id)->delete();
        return redirect()->route('admin.tables')->with('success', 'Table deleted!');
    }

    public function reservations()
    {
        $reservations = Reservation::with(['cafeTable', 'user'])
            ->orderBy('reservation_date', 'desc')
            ->get();
        return view('admin.reservations', compact('reservations'));
    }

    public function updateReservationStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => $request->status]);
        return redirect()->route('admin.reservations')->with('success', 'Status updated!');
    }

    public function ratings()
    {
        $ratings = Rating::orderBy('created_at', 'desc')->get();
        return view('admin.ratings', compact('ratings'));
    }

    public function deleteRating($id)
    {
        Rating::findOrFail($id)->delete();
        return redirect()->route('admin.ratings')->with('success', 'Rating deleted!');
    }
}
