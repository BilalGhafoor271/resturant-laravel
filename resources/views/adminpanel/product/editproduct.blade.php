@extends('adminpanel.adminlayout.layout')

@section('admin-content')

<div class="container">
    <h1>Edit Product</h1>

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

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Product Information Fields -->
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>

        <!-- Short Description -->
        <div class="form-group">
            <label for="short_description">Short Description</label>
            <input type="text" name="short_description" id="short_description" class="form-control" value="{{ old('short_description', $product->short_description) }}" required>
        </div>

        <!-- Long Description -->
        <div class="form-group">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" class="form-control" required>{{ old('long_description', $product->long_description) }}</textarea>
        </div>

        <!-- Price -->
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" step="0.01" required>
        </div>

        <!-- Category -->
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Subcategory -->
        <div class="form-group">
            <label for="subcategory_id">Subcategory</label>
            <select name="subcategory_id" id="subcategory_id" class="form-control" required>
                <option value="">-- Select Subcategory --</option>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Existing Images -->
        <div class="form-group">
            <label>Current Product Images</label>
            <div class="row">
                @foreach (json_decode($product->images, true) as $index => $image)
                    <div class="col-md-3 text-center">
                        <img src="{{ asset('storage/' . $image) }}" alt="Product Image" class="img-thumbnail" width="100">
                        {{-- <label>Replace Image {{ $index + 1 }}</label>
                        <input type="file" name="images[{{ $index }}]" class="form-control mt-2"> --}}
                        <input type="checkbox" name="delete_images[]" value="{{ $image}}" class="form-check-input">
                        <label class="form-check-label">Delete</label>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- New Images Upload -->
        <div class="form-group">
            <label for="images">Add New Images (Optional)</label>
            <input type="file" name="new_images[]" id="images" class="form-control" multiple>
            <small class="form-text text-muted">Leave blank if you do not want to change the images.</small>
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="active" {{ $product->status ? 'selected' : '' }}>Active</option>
                <option value="block" {{ !$product->status ? 'selected' : '' }}>Block</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-3">Update Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Products</a>
    </form>
</div>

@endsection
