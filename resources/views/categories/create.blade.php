@extends('layouts.dashboard')
@section('title', 'Categories Management')
@section('content')

    <div class="flex justify-center items-center mt-16 h-auto">
        <div class="w-full max-w-md p-6 bg-white  border border-gray-500 rounded ">
            <h1 class="flex text-center justify-center text-gray-500 font-semibold mb-5 text-xl ">Create New
                Category</h1>
            <form method="POST" action="{{ route('categories.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block font-semibold text-gray-700">Category Name</label>
                    <input type="text" name="name" class="w-full mt-1 p-2 border rounded-lg"
                           placeholder="Parent Category"
                           required>
                </div>

                <div class="space-y-2">
                    <label for="options" class="block font-semibold text-gray-700">Child Category Name</label>
                    <div class="flex items-center space-x-2">
                        <input type="text" name="options[]" class="flex-1 mt-1 p-2 border rounded-lg"
                               placeholder="Child Category 1">
                    </div>
                    <div id="optionFields"></div>
                </div>
                <button type="button" id="addOption"
                        class="px-4 py-2 text-blue-500 font-semibold border rounded-lg hover:bg-blue-100 focus:outline-none focus:shadow-outline-blue active:bg-blue-200 transition duration-300">
                    Add Option
                </button>
                <button type="submit"
                        class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition duration-300">
                    Create Category
                </button>
            </form>
        </div>
    </div>

@endsection





