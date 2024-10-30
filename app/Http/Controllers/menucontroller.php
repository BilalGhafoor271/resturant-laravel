<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class menucontroller extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get(); // Eager load products with categories
        return view('menu', compact('categories')); // Return the view with data
    }

}
