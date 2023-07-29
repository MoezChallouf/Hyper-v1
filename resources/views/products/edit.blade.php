@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen from-teal-100 via-teal-300 to-teal-500 bg-gradient-to-br">
        <div class="w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl">
            <div class="max-w-md mx-auto space-y-6">

                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h2 class="text-2xl font-bold">Edit Product</h2>
                    <hr class="my-6">
                    <label class="uppercase text-sm font-bold opacity-70">Name</label>
                    <input type="text" name="name" value="{{ $product->name }}"
                           class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                    <label class="uppercase text-sm font-bold opacity-70">Price</label>
                    <input type="text" name="price" value="{{ $product->price }}"
                           class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded">
                    <label class="uppercase text-sm font-bold opacity-70">Quantity</label>
                    <input type="text" name="quantity" value="{{ $product->quantity }}"
                           class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded">
                    <label class="uppercase text-sm font-bold opacity-70">Colors</label>
                    <input type="text" name="colors" value="{{ $product->colors }}"
                           class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded">
                    <label class="uppercase text-sm font-bold opacity-70">matière</label>
                    <input type="text" name="matter" value="{{ $product->matter }}"
                           class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded">
                    <label class="uppercase text-sm font-bold opacity-70">Discount</label>
                    <input type="text" name="discount" value="{{ $product->discount }}"
                           class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded">
                    <label class="uppercase text-sm font-bold opacity-70">Status</label>
                    <select name="status"
                            class="w-full p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                        <option value="In Stock" {{ $product->status === 'In Stock' ? 'selected' : '' }}>In Stock
                        </option>
                        <option value="Sold Out" {{ $product->status === 'Sold Out' ? 'selected' : '' }}>Sold Out
                        </option>
                    </select>
                    <label class="uppercase text-sm font-bold opacity-70">Category</label>
                    <select name="category_id"
                            class="w-full p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                        <option value="" disabled>Select a category</option>
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}" {{ $category->id === $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <input type="submit"
                           class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300"
                           value="Update Product">
                </form>

            </div>
        </div>
    </div>
@endsection
