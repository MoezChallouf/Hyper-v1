@extends('layouts.dashboard')
@section('title', 'Products Details')
@section('content')
    <div class="min-h-screen flex mt-8 broder border-gray-700 justify-center bg-gray-100 font-sans overflow-hidden">
        <div class="w-full lg:w-5/6">
            <div
                class="text-gray-700 font-semibold border-2 border-gray-500 w-20 p-2 text-center  justify-start rounded mb-2">
                <a href="{{route('products.index')}}">Retour</a>
            </div>

            <div class="grid grid-cols-2">
                <div class="container bg-white shadow-md rounded  ">
                    <div class="border-l-2 pl-2 mx-6 my-6 h-8  border-gray-500 mb-4">
                        <label class="uppercase text-sm font-bold">Product Images :</label>

                    </div>
                    <div class="justify-center text-center h-auto mb-4 lg:px-32 lg:pt-12">
                        @if (!$product->images->isEmpty())
                            <div class="-m-1 flex flex-wrap md:-m-2">
                                @foreach($product->images as $image)

                                    <div class="flex w-1/4  flex-wrap">

                                        <div class="w-full p-1 md:p-2 mb-8">
                                            <img
                                                class="block mx-4 my-4 h-100 w-100 border-2 border-dashed rounded-lg object-cover object-center"
                                                src="{{ asset('storage/images/' . $image->filename) }}"
                                                alt="Product Image"/>

                                            <h6 class="text-xs text-center p-2 mx-4 px-2">image {{$image->id}}</h6>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>

                <div class="border-l-2 border-gray-700 bg-white shadow-md rounded px-8 pt-6">
                    <div class="border-l-2 pl-2 border-gray-500 mb-4">
                        <label class="uppercase text-sm font-bold">Product Name :</label>
                        <p>{{ $product->name }}</p>
                    </div>

                    <div class="grid grid-cols-2">
                        <div class="border-l-2 pl-2 border-gray-500 mb-4">
                            <label class="uppercase text-sm font-bold">Price :</label>
                            <p>{{ $product->price }} dt</p>
                        </div>
                        <div class="border-l-2 pl-2 border-gray-500 mb-4">
                            <label class="uppercase text-sm font-bold">Quantity :</label>
                            <p>{{ $product->quantity }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2">
                        <div class="border-l-2 pl-2 border-gray-500 mb-4">
                            <label class="uppercase text-sm font-bold">Colors :</label>
                            <p>{{ $product->color }}</p>
                        </div>
                        <div class="border-l-2 pl-2 border-gray-500 mb-4">
                            <label class="uppercase text-sm font-bold">Matière :</label>
                            <p>{{ $product->matter }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2">
                        <div class="border-l-2 pl-2 border-gray-500 mb-4">
                            <label class="uppercase text-sm font-bold">Status :</label>
                            <p>{{ $product->status }}</p>
                        </div>
                        <div class="border-l-2 pl-2 border-gray-500 mb-4">
                            <label class="uppercase text-sm font-bold">Discount :</label>
                            <p>{{ $product->discount }}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="border-l-2 pl-2 border-gray-500 mb-4">
                            <label class="uppercase text-sm font-bold">Category :</label>
                            <p>{{ $product->category ? $product->category->name : 'N/A' }}</p>
                        </div>
                        <div class="border-l-2 pl-2 border-gray-500 mb-4">
                            <label class="uppercase text-sm font-bold">Child Category :</label>
                            @if ($product->category && $product->category->options)
                                @foreach($product->category->options as $category)
                                    <p>{{ $category->name }}</p>
                                @endforeach
                            @else
                                <p>No child categories available</p>
                            @endif
                        </div>

                    </div>
                    <div class="border-l-2 pl-2 border-gray-500 mb-4">
                        <label class="uppercase text-sm font-bold">Product Description :</label>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <a href="{{ route('products.edit', $product->id) }}"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded mr-2">
                    Edit
                </a>

                <button onclick="openDeleteModal()"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded">
                    Delete
                </button>

            </div>
        </div>
        <div id="deleteModal" class="hidden fixed inset-0 flex justify-center items-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded shadow-lg">
                <p class="text-lg font-semibold mb-3">Are you sure you want to delete this product?</p>
                <div class="flex justify-end">
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Delete
                        </button>
                    </form>
                    <button onclick="closeDeleteModal()" class="ml-2 py-2 px-4 text-gray-600 hover:text-gray-800">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

