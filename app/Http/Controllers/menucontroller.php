<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class menucontroller extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Retrieve all categories
        $products = Product::all(); // Retrieve all
        // dd($products);
        return view('/menu', compact(['categories', 'products'])); // Return the view with data
    }

}
