<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with(['category', 'subcategory'])->paginate(10);
        return view('adminpanel.product', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('adminpanel.createproduct', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
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
        $product = Product::create([

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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('adminpanel.editproduct', compact('product', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;

        if ($request->hasFile('images')) {
            // Decode existing images
            $existingImages = json_decode($product->images) ?? [];

            // Store new images
            $newImages = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public'); // Store in public disk
                $newImages[] = $path;
            }

            // Combine existing images with new images
            $allImages = array_merge($existingImages, $newImages);
            $product->images = json_encode($allImages); // Convert back to JSON
        }
        $product->status=$request->status;
        $product->update();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product= Product::find($id);
        $product->delete($id);
        return redirect()->route('products.index');
    }


    public function showMenu()
    {
        // Fetch all categories with their products
        $categories = Category::with('products')->get();

        return view('menu', compact('categories'));
    }
}
