<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with(['category', 'subcategory'])->paginate(10);
        return view('adminpanel.product.product', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('adminpanel.product.createproduct', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'long_description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate images
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        // Handle file upload
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public'); // Store in public disk
                $images[] = $path;
            }
        }

        // Create the product
        Product::create([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'images' => json_encode($images), // Store images as JSON
            'status' => $request->status
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('adminpanel.product.editproduct', compact('product', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    /**
 * Update the specified resource in storage.
 */
/**
 * Update the specified resource in storage.
 */
/**
 * Update the specified resource in storage.
 */
// public function update(Request $request, string $id)
// {
//     $product = Product::findOrFail($id);

//     // Validate input data
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'short_description' => 'required|string|max:255',
//         'long_description' => 'required|string',
//         'price' => 'required|numeric',
//         'category_id' => 'required|exists:categories,id',
//         'subcategory_id' => 'required|exists:subcategories,id',
//         'new_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate new images
//         'status' => 'required'
//     ]);

//     // Update product details
//     $product->name = $request->name;
//     $product->short_description = $request->short_description;
//     $product->long_description = $request->long_description;
//     $product->price = $request->price;
//     $product->category_id = $request->category_id;
//     $product->subcategory_id = $request->subcategory_id;
//     $product->status = $request->status;

//     // Decode current images from JSON or set to empty array if none
//     $currentImages = json_decode($product->images, true) ?? [];

//     // Handle image deletion
//     if ($request->has('delete_images')) {
//         foreach ($request->delete_images as $imageToDelete) {
//             if (($key = array_search($imageToDelete, $currentImages)) !== false) {
//                 // Remove the image path from the array
//                 unset($currentImages[$key]);

//                 // Delete the image file from storage
//                 Storage::disk('public')->delete($imageToDelete);
//             }
//         }
//     }

//     // Handle new additional images
//     if ($request->hasFile('new_images')) {
//         foreach ($request->file('new_images') as $newImage) {
//             $newPath = $newImage->store('products', 'public'); // Store in public disk
//             $currentImages[] = $newPath; // Append new images
//         }
//     }

//     // Update the images field with the updated image list
//     $product->images = json_encode(array_values($currentImages));
//     $product->save();

//     return redirect()->route('products.index')->with('success', 'Product updated successfully.');
// }


/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    $product = Product::findOrFail($id);

    // Validate input data
    $request->validate([
        'name' => 'required|string|max:255',
        'short_description' => 'required|string|max:255',
        'long_description' => 'required|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'subcategory_id' => 'required|exists:subcategories,id',
        'new_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate new images
        'status' => 'required'
    ]);

    // Update product details
    $product->name = $request->name;
    $product->short_description = $request->short_description;
    $product->long_description = $request->long_description;
    $product->price = $request->price;
    $product->category_id = $request->category_id;
    $product->subcategory_id = $request->subcategory_id;
    $product->status = $request->status;

    // Decode current images from JSON or set to empty array if none
    $currentImages = json_decode($product->images, true) ?? [];

    // Handle image deletion
    if ($request->has('delete_images')) {
        foreach ($request->delete_images as $imageToDelete) {
            if (($key = array_search($imageToDelete, $currentImages)) !== false) {
                // Remove the image path from the array
                unset($currentImages[$key]);

                // Delete the image file from storage
                Storage::disk('public')->delete($imageToDelete);
            }
        }
    }

    // Handle new additional images
    if ($request->hasFile('new_images')) {
        foreach ($request->file('new_images') as $newImage) {
            $newPath = $newImage->store('products', 'public'); // Store in public disk
            $currentImages[] = $newPath; // Append new images
        }
    }

    // Update the images field with the updated image list
    $product->images = json_encode(array_values($currentImages));
    $product->save();

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // Delete associated images from storage
        $images = json_decode($product->images, true) ?? [];
        foreach ($images as $image) {
            Storage::disk('public')->delete($image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    /**
     * Display the menu with products filtered by category.
     */
    public function showMenu()
    {
        $categories = Category::with(['products' => function ($query) {
            $query->where('status', 'active');
        }])->get();

        return view('menu', compact('categories'));
    }
}
