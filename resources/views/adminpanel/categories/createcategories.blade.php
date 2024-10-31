
@extends('adminpanel.adminlayout.layout')
@section('admin-content')

<div class="container ">
    <h1>Add New Category</h1>

    <!-- Display success or error messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form to add new category -->
    <div class="col-6">
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="slug">Slug (Optional)</label>
            <input type="text" name="slug" id="slug" class="form-control" placeholder="">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active">Active</option>
                <option value="block">Block</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save Category</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back to Categories</a>
    </form>
</div>
</div>

@endsection
