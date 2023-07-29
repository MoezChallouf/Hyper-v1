@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Category</h1>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            <div class="mb-3">
                <label for="option" class="form-label">Option</label>
                <input type="text" class="form-control" id="option" name="option" value="{{ $category->option }}"
                       required>
            </div>
            <!-- You can add any other fields specific to the Category model here -->

            <button type="submit" class="btn btn-primary">Update Category</button>
            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
