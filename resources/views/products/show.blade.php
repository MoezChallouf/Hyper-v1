@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
        <div class="w-full lg:w-5/6">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h2 class="text-2xl font-bold mb-4">Product Details</h2>
                <div class="mb-4">
                    <label class="uppercase text-sm font-bold">Name:</label>
                    <p>{{ $product->name }}</p>
                </div>
                <div class="mb-4">
                    <label class="uppercase text-sm font-bold">Price:</label>
                    <p>{{ $product->price }} dt</p>
                </div>
                <div class="mb-4">
                    <label class="uppercase text-sm font-bold">Quantity:</label>
                    <p>{{ $product->quantity }}</p>
                </div>
                <div class="mb-4">
                    <label class="uppercase text-sm font-bold">Colors:</label>
                    <p>{{ $product->colors }}</p>
                </div>
                <div class="mb-4">
                    <label class="uppercase text-sm font-bold">Matière:</label>
                    <p>{{ $product->matiere }}</p>
                </div>
                <div class="mb-4">
                    <label class="uppercase text-sm font-bold">Discount:</label>
                    <p>{{ $product->discount }}</p>
                </div>
                <div class="mb-4">
                    <label class="uppercase text-sm font-bold">Status:</label>
                    <p>{{ $product->status }}</p>
                </div>
                <div class="mb-4">
                    <label class="uppercase text-sm font-bold">Category:</label>
                    <p>{{ $product->category->name }}</p>
                </div>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('products.edit', $product->id) }}"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded mr-2">
                    Edit
                </a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this product?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
