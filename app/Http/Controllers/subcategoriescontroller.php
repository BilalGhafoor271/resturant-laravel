<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class subcategoriescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = subCategory::all();
        return view('adminpanel.subcategories', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
       return view('adminpanel.createsubcategories',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name'=>'required|unique:categories',
            'category_id' => 'required|exists:categories,id',
            'slug'=>'nullable',
            'status'=>'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $subcategory =new subCategory();
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->slug = $request->slug;
        $subcategory->status = $request->status;

        $subcategory->save();
        return redirect()->route('subcategories.index');

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
        $subcategory = subCategory::find($id);
        $categories = Category::all();
       return view('adminpanel.editsubcategories',compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subcategory = subCategory::find($id);

        $subcategory->name=$request->name;
        $subcategory->category_id=$request->category_id;
        $subcategory->slug=$request->slug;
        $subcategory->status=$request->status;
        $subcategory->update();

        return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory= subcategory::find($id);
        $subcategory->delete($id);
        return redirect()->route('subcategories.index');
    }
}
