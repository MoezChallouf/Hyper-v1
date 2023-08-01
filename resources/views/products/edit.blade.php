@extends('layouts.dashboard')
@section('title', 'Edit Product')
@section('content')
    <div class="min-h-screen bg-gray-100 flex  justify-center m-auto mt-8 font-sans overflow-hidden">
        <div class="w-full lg:w-1/2 mb-5">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label class="block mb-2 text-md font-bold text-black-700 ">Product Name</label>
                <input type="text" id="name" name="name"
                       class=" border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5 "
                       value="{{$product->name}}">
                <label for="price" class="block mb-2 text-md font-bold text-black-700 ">Price</label>
                <input type="text" id="price"
                       class=" border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5 "
                       name="price"
                       value="{{ $product->price }}"
                >
                <label for="quantity" class="block mb-2 text-md font-bold text-black-700 ">Quantity</label>
                <input type="text" id="quantity"
                       class=" border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5 "
                       name="price"
                       value="{{ $product->quantity }}"
                >
                <label for="colors" class="block mb-2 text-md font-bold text-black-700 ">Colors</label>
                <input type="text" id="colors"
                       class=" border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5 "
                       name="colors"
                       value="{{ $product->colors }}">
                <label for="matter" class="block mb-2 text-md font-bold text-black-700 ">Matter</label>
                <input type="text" id="matter"
                       class=" border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5 "
                       name="matter"
                       value="{{ $product->matter }}">
                <label for="discount" class="block mb-2 text-md font-bold text-black-700 ">Discount</label>
                <input type="text" id="discount"
                       class=" border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5 "
                       name="discount"
                       value="{{ $product->discount }}">
                <label for="status" class="block mb-2 text-md font-bold text-black-700 ">Status</label>
                <select name="status"
                        class="form-control form-control border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5">
                    <option value="En Stock" {{ $product->status === 'En Stock' ? 'selected' : '' }}>En Stock
                    </option>
                    <option value="Epuise" {{ $product->status === 'Epuise' ? 'selected' : '' }}>Epuise
                    </option>
                </select>
               
                <label for="category_id" class="block mb-2 text-md font-bold text-black-700">Category</label>
                <select name="category_id"
                        class="form-control block border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5">
                    <option value="" disabled>Select a category</option>
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}" {{ $category->id === $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>

                <label for="option" class="block mb-2 text-md font-bold text-black-700">Child Category</label>
                <select name="option"
                        class="form-control border mt-3 border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5">
                    <option value="" disabled>Select a child category</option>
                    @foreach($categories as $category)
                        @foreach($category->options as $option)
                            <option
                                value="{{ $option->id }}" {{ $option->id === $product->option ? 'selected' : '' }}>{{ $option->name }}</option>
                        @endforeach
                    @endforeach
                </select>

                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                        Update Product
                    </button>

                </div>
            </form>

        </div>
    </div>
@endsection
