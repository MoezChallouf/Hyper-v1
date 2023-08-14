@extends('layouts.dashboard')
@section('title', 'Product Management')
@section('content')

    <div class="justify-center bg-gray-200/40 min-h-screen"><!-- Comment Form -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="mx-auto justify-center items-center max-w-4xl">
                <h1 class="px-3 text-xl justify-center items-center font-bold text-center text-gray-500">
                    Create New Product</h1>

                <div
                    class="mt-5 p-4 relative z-10 bg-white border rounded-xl sm:mt-10 md:p-10 dark:bg-gray-100 dark:border-gray-700">
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="block mb-2 text-md font-medium text-black-500"
                                   for="name">Name :</label>
                            <input
                                class=" form-control  border border-gray-700 text-black text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 mt-3"
                                type="text" placeholder="Product Name" id="name" name="name" value="{{old('name')}}"
                                required>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                            <div>
                                <label for="price"
                                       class="block text-md font-medium mb-2 mt-3">Price :</label>
                                <div class="relative">
                                    <input type="text" id="price"
                                           name="price"
                                           class="py-3 px-4 pr-16 block w-full border-gray-50 shadow-sm rounded-lg text-md focus:z-10 focus:border-blue-500 focus:ring-blue-500  dark:border-gray-700 dark:placeholder-gray-400 mt-3"
                                           placeholder="0.00"
                                           required
                                           value="{{old('price')}}">
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center pointer-events-none z-20 pr-4">
                                        <span class="text-gray-500">TND</span>
                                    </div>
                                </div>

                            </div>

                            <div>
                                <label for="quantity"
                                       class="block text-md font-medium mb-2 mt-3">Quantity :</label>
                                <div class="relative">
                                    <input type="text" id="quantity"
                                           name="quantity"
                                           class="py-3 px-2 pl-3 pr-16 block w-full border-gray-50 shadow-sm rounded-lg text-md focus:z-10 focus:border-blue-500 focus:ring-blue-500  dark:border-gray-700 dark:placeholder-gray-400 mt-3"
                                           placeholder="Quantity"
                                           required
                                           value="{{old('quantity')}}">
                                </div>
                            </div>

                        </div>


                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">

                            <div class="form-group">
                                <label for="matter"
                                       class="block mb-2 text-md font-medium text-gray-900 mt-3">Matter :</label>
                                <input type="text"
                                       class=" form-control bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 mt-3"
                                       id="matter" placeholder="Product Matter" name="matter" required
                                       value="{{old('matter')}}">
                            </div>

                            <div class="form-group">
                                <label for="color"
                                       class="block mb-2 text-md font-medium text-gray-900 mt-3">Color :</label>
                                <input type="text"
                                       class=" form-control pl-3 bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 mt-3"
                                       id="color" name="color"
                                       placeholder="Product Color"
                                       required
                                       value="{{old('color')}}">
                            </div>

                        </div>
                        <div>
                            <label for="discount"
                                   class="block text-md font-medium mb-2 mt-3">Discount :</label>
                            <div class="relative">
                                <input type="text" id="discount"
                                       name="discount"
                                       class="py-3 px-2 pl-3 pr-16 block w-full border-gray-50 shadow-sm rounded-lg text-md focus:z-10 focus:border-blue-500 focus:ring-blue-500  dark:border-gray-700 dark:placeholder-gray-400 mt-3"
                                       placeholder="Is there any discount for this product ?"
                                       required
                                       value="{{old('discount')}}">
                                <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none z-20 pr-4">
                                    <span class="text-gray-100">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status"
                                   class="block mb-2 text-md font-medium text-gray-900 mt-3">Status :</label>
                            <select
                                class=" form-control bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 mt-3"
                                id="status" name="status">
                                <option value="En Stock">En Stock</option>
                                <option value="Epuise">Epuise</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">

                            <div class="form-group">
                                <label class="block mt-3 mb-2 text-md font-medium text-gray-900"
                                       for="category_id">Category :</label>
                                <select
                                    class=" form-control mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 "
                                    id="category_id" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="option" class="block mt-3 mb-2 text-md font-medium text-gray-900">Child
                                    Category</label>
                                <select
                                    class=" form-control mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 "
                                    id="option" name="option" required>
                                    <option selected disabled>Select Child Category</option>
                                    @foreach($categories as $category)
                                        @foreach($category->options as $option)
                                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description"
                                   class="block mb-2 text-md font-medium text-gray-900 mt-3">Description :</label>
                            <textarea
                                class=" form-control bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 mt-3"
                                id="description" name="description" placeholder="Add some description for this product!"
                                value="{{old('description')}}"
                                rows="2"></textarea>
                        </div>
                        <div class="flex ">
                            <div>
                                <label class="block mt-3 mb-2 text-md font-medium text-gray-900">Images</label>
                                <input type="file" name="images[]" multiple accept="image/*"
                                       class="text-md border border-gray-200 rounded-lg p-10">
                            </div>
                        </div>

                        <div class="mt-3 grid">
                            <button type="submit"
                                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all dark:focus:ring-offset-gray-800">
                                Create Product
                            </button>
                        </div>
                        @foreach($errors->all() as $error)
                            <li class="mt-2 text-md text-red-600 dark:text-red-500">{{$error}}</li>
                        @endforeach
                    </form>
                </div>

                @endsection

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    // functionality of displaying only the child categories that are associated with the selected parent category when a user chooses a category

                    $(function () {
                        $("input[type='submit']").click(function () {
                            debugger
                            var $fileUpload = $("input[type='file']");
                            if (parseInt($fileUpload.get(0).files.length) > 2) {
                                alert("You can only upload a maximum of 2 files");
                            }
                        });
                    });

                    $(document).ready(function () {
                        // When the parent category dropdown value changes
                        $('#category_id').change(function () {
                            var selectedCategoryId = $(this).val();

                            // Clear previous child category options
                            $('#option').empty();

                            // Add a default disabled option
                            $('#option').append('<option selected disabled>Select Child Category</option>');

                            // Loop through categories to find the selected parent's child categories
                            @foreach($categories as $category)
                                @if($category->parent_id == old('category_id'))
                                @foreach($category->options as $option)
                            if ({{ $category->id }} == selectedCategoryId) {
                                $('#option').append('<option value="{{ $option->id }}">{{ $option->name }}</option>');
                            }
                            @endforeach
                            @endif
                            @endforeach
                        });
                    });
                </script>
