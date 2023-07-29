@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Create Category</h1>
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group" id="options">
                <label for="option">Options</label>
                <div class="input-group mb-3">
                    <input type="text" name="options[]" class="form-control" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" onclick="addOption()">Add Option
                        </button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>
@endsection


