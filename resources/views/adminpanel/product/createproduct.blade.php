@extends('adminpanel.adminlayout.layout')
@section('admin-content')

<div class="container">
    <h1>Add New Product</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="short_description">Short Description</label>
            <input type="text" name="short_description" id="short_description" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subcategory_id">Subcategory</label>
            <select name="subcategory_id" id="subcategory_id" class="form-control" required>
                <option value="">-- Select Subcategory --</option>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="images">Product Images (Multiple)</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active">Active</option>
                <option value="block">Block</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Add Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Products</a>
    </form>
</div>
@endsection
