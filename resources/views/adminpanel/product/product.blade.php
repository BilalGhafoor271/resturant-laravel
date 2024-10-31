@extends('adminpanel.adminlayout.layout')
@section('admin-content')
    <div class="container">
        <h1>All Products</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Short Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Images</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->short_description }}</td>
                        <td>{{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->subcategory->name }}</td>
                        <td>
                            @if ($product->images)
                                @php
                                    $images = json_decode($product->images);
                                @endphp
                                @foreach ($images as $image)
                                    <img src="{{ asset('storage/' . $image) }}" alt="Product Image"
                                        style="width: 50px; height: auto; margin-right: 5px;">
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $product->status }}</td>

                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
