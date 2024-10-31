<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class shopcontroller extends Controller
{
    public function index()
    {
        // Fetch all products with their related categories
        $products = Product::with('category')->where('status',"active")->paginate(9);

        // Return the shop view with products
        return view('shop.shop', compact('products'));
    }

    public function show($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id); // Fetch product along with its images
        $images = $product->images;
        return view('shop.shop_detail', compact('product','images')); // Pass the product to the view
    }
}
