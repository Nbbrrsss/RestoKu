<?php

namespace App\Http\Controllers;


use App\Models\Food;
use App\Models\Category; 

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $foods = Food::where('nama_menu', 'like', '%' . $search . '%')->get();
        // Retrieve categories
        $categories = Category::all(); // Misalnya, mengambil semua kategori dari database

        // Initialize foodsByCategory array
        $foodsByCategory = [];

        // Retrieve foods by category
        foreach ($categories as $category) {
            $foodsByCategory[$category->id] = Food::where('kategori_id', $category->id)->get();
        }

        return view('menu', [
            'foods' => $foods,
            'categories' => $categories,
            'foodsByCategory' => $foodsByCategory,
        ]);
    }

    
}

