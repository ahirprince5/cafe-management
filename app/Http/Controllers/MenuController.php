<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        
        $query = MenuItem::with('category')->where('is_available', true);
        
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }
        
        $menuItems = $query->get();
        
        return view('menu', compact('menuItems', 'categories'));
    }

    public function show($id)
    {
        $item = MenuItem::with('category')->findOrFail($id);
        $relatedItems = MenuItem::where('category_id', $item->category_id)
            ->where('id', '!=', $id)
            ->take(3)
            ->get();
            
        return view('menu-detail', compact('item', 'relatedItems'));
    }
}
