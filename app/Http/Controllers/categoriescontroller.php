<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class categoriescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('adminpanel.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('adminpanel.createcategories');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name'=>'required|unique:categories',
            'slug'=>'nullable',
            'status'=>'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $category =new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->status;

        $category->save();
        return redirect()->route('categories.index');
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
        $category = Category::find($id);
       return view('adminpanel.editcategories',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->status=$request->status;
        $category->update();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category= category::find($id);
        $category->delete($id);
        return redirect()->route('categories.index');
    }
}
