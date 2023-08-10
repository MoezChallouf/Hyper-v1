{{--@extends('layouts.dashboard')--}}
{{--@section('title', 'Edit Product')--}}
{{--@section('content')--}}
{{--    <div class="min-h-screen bg-gray-100 flex  justify-center m-auto mt-8 font-sans overflow-hidden">--}}
{{--        <div class="w-full lg:w-1/2 mb-5">--}}
{{--@if(isset($product))--}}
{{--    <div--}}
{{--        id="EditProductModal"--}}
{{--        class="hidden fixed z-10 inset-0 overflow-y-auto"--}}
{{--    >--}}
{{--        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">--}}
{{--            <div class="fixed inset-0 transition-opacity">--}}
{{--                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>--}}
{{--            </div>--}}
{{--            <!-- This element is to trick the browser into centering the modal contents. -->--}}
{{--            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>--}}
{{--            &#8203;--}}
{{--            <div--}}
{{--                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"--}}
{{--            >--}}
{{--                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">--}}
{{--                    <div id="edit_data">--}}
{{--                        <form id="updateProductForm" data-product-id="{{ $product->id }}"--}}
{{--                              action="{{ route('products.update', $product->id) }}">--}}
{{--                            @csrf--}}
{{--                            <label class="block mb-2 text-md font-bold text-black-700 ">Product Name</label>--}}
{{--                            <input type="text" id="name" name="name"--}}
{{--                                   class=" border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5 "--}}
{{--                                   value="{{$product->name}}">--}}
{{--                            <label for="price" class="block mb-2 text-md font-bold text-black-700 ">Price</label>--}}
{{--                            <input type="text" id="price"--}}
{{--                                   class=" border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5 "--}}
{{--                                   name="price"--}}
{{--                                   value="{{ $product->price }}"--}}
{{--                            >--}}
{{--                            <label for="quantity" class="block mb-2 text-md font-bold text-black-700 ">Quantity</label>--}}
{{--                            <input type="text" id="quantity"--}}
{{--                                   class=" border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5 "--}}
{{--                                   name="quantity"--}}
{{--                                   value="{{ $product->quantity }}"--}}
{{--                            >--}}
{{--                            <label for="colors" class="block mb-2 text-md font-bold text-black-700 ">Colors</label>--}}
{{--                            <input type="text" id="colors"--}}
{{--                                   class=" border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5 "--}}
{{--                                   name="color"--}}
{{--                                   value="{{ $product->colors }}">--}}
{{--                            <label for="matter" class="block mb-2 text-md font-bold text-black-700 ">Matter</label>--}}
{{--                            <input type="text" id="matter"--}}
{{--                                   class=" border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5 "--}}
{{--                                   name="matter"--}}
{{--                                   value="{{ $product->matter }}">--}}
{{--                            <label for="discount" class="block mb-2 text-md font-bold text-black-700 ">Discount</label>--}}
{{--                            <input type="text" id="discount"--}}
{{--                                   class=" border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5 "--}}
{{--                                   name="discount"--}}
{{--                                   value="{{ $product->discount }}">--}}
{{--                            <label for="status" class="block mb-2 text-md font-bold text-black-700 ">Status</label>--}}
{{--                            <select name="status"--}}
{{--                                    class="form-control form-control border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5">--}}
{{--                                <option value="En Stock" {{ $product->status === 'En Stock' ? 'selected' : '' }}>En--}}
{{--                                    Stock--}}
{{--                                </option>--}}
{{--                                <option value="Epuise" {{ $product->status === 'Epuise' ? 'selected' : '' }}>Epuise--}}
{{--                                </option>--}}
{{--                            </select>--}}

{{--                            --}}{{--                            <label for="category_id"--}}
{{--                            --}}{{--                                   class="block mb-2 text-md font-bold text-black-700">Category</label>--}}
{{--                            --}}{{--                            <select name="category_id"--}}
{{--                            --}}{{--                                    class="form-control block border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5">--}}
{{--                            --}}{{--                                <option value="" disabled>Select a category</option>--}}
{{--                            --}}{{--                                @foreach($categories as $category)--}}
{{--                            --}}{{--                                    <option--}}
{{--                            --}}{{--                                        value="{{ $category->id }}" {{ $category->id === $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>--}}
{{--                            --}}{{--                                @endforeach--}}
{{--                            --}}{{--                            </select>--}}

{{--                            --}}{{--                            <label for="option" class="block mb-2 text-md font-bold text-black-700">Child--}}
{{--                            --}}{{--                                Category</label>--}}
{{--                            --}}{{--                            <select name="option"--}}
{{--                            --}}{{--                                    class="form-control border mt-3 border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5">--}}
{{--                            --}}{{--                                <option value="" disabled>Select a child category</option>--}}
{{--                            --}}{{--                                @foreach($categories as $category)--}}
{{--                            --}}{{--                                    @foreach($category->options as $option)--}}
{{--                            --}}{{--                                        <option--}}
{{--                            --}}{{--                                            value="{{ $option->id }}" {{ $option->id === $product->option ? 'selected' : '' }}>{{ $option->name }}</option>--}}
{{--                            --}}{{--                                    @endforeach--}}
{{--                            --}}{{--                                @endforeach--}}
{{--                            --}}{{--                            </select>--}}

{{--                            <div class="flex justify-end">--}}
{{--                                <input type="submit"--}}
{{--                                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"--}}
{{--                                       value="Update Product">--}}

{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    @push('scripts')--}}
{{--        <script>--}}
{{--            $(document).ready(function () {--}}
{{--                debugger--}}
{{--                $('#EditProductModal').on('shown.bs.modal', function () {--}}
{{--                    debugger--}}
{{--                    $('#updateProductForm').on('submit', function (e) {--}}
{{--                        debugger--}}
{{--                        e.preventDefault(); // Prevent the default form submission--}}

{{--                        const form = $(this);--}}
{{--                        const productId = form.data('product-id');--}}
{{--                        const url = form.attr('action');--}}

{{--                        $.ajax({--}}
{{--                            headers: {--}}
{{--                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                            },--}}
{{--                            type: 'PUT',--}}
{{--                            url: url,--}}
{{--                            data: form.serialize(), // Serialize the form data--}}
{{--                            success: function (response) {--}}
{{--                                // Handle the success response, if needed--}}
{{--                                console.log('Product updated successfully:', response);--}}
{{--                                $('#EditProductModal').hide();--}}
{{--                            },--}}
{{--                            error: function (xhr, status, error) {--}}
{{--                                // Handle the error response, if needed--}}
{{--                                console.error('Error updating product:', error);--}}
{{--                            }--}}
{{--                        });--}}
{{--                    });--}}
{{--                });--}}
{{--            });--}}
{{--        </script>--}}
{{--    @endpush--}}
{{--@endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
{{--<div class="container">--}}
<h2>Edit Product</h2>
<form action="{{ route('products.update', $product->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}"
               required>
    </div>

    <label for="status" class="block mb-2 text-md font-bold text-black-700 ">Status</label>
    <select name="status" id="status"
            class="form-control form-control border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5">
        <option value="En Stock" {{ $product->status === 'En Stock' ? 'selected' : '' }}> En Stock</option>
        <option value="Epuise" {{ $product->status === 'Epuise' ? 'selected' : '' }}> Epuise</option>
    </select>

    <div class="form-group">
        <label for="matter">Matter:</label>
        <input type="text" class="form-control" id="matter" name="matter" value="{{ $product->matter }}" required>
    </div>
    <div class="form-group">
        <label for="color">Color:</label>
        <input type="text" class="form-control" id="color" name="color" value="{{ $product->color }}" required>
    </div>
    <div class="form-group">
        <label for="discount">Discount:</label>
        <input type="text" class="form-control" id="discount" name="discount" value="{{ $product->discount }}"
               required>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" class="form-control" id="description" name="description"
               value="{{ $product->description }}"
               required>
    </div>

    {{-- Other fields go here --}}

    <button type="submit" class="btn btn-primary">Update Product</button>
</form>
{{--</div>--}}

