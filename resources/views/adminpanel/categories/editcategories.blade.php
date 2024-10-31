@extends('adminpanel.adminlayout.layout')
@section('admin-content')

<div class="container">
    <h1>Edit Category</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
            <label for="slug">Slug (Optional)</label>
            <input type="text" name="slug" class="form-control" value="{{ $category->slug }}">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="active" {{ $category->status ? 'selected' : '' }}>Active</option>
                <option value="block" {{ !$category->status ? 'selected' : '' }}>Block</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Category</button>
    </form>
</div>
@endsection
