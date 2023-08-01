<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
//        $products = Product::all();
        $products = Product::with('category.options')->get();
        return view('products.index', compact('products'));


//        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            $category->options = $category->options()->get();
        }
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'colors' => 'nullable|string|max:255',
            'matter' => 'nullable|string|max:255',
            'discount' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:En Stock,Epuise',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'color' => 'nullable|string|max:7', // Assuming the color is stored as a string (hex code)
//            'image' => 'nullable|image|mimes:png,jpg,gif|max:10240', // Max 10MB image file
        ]);

//        if ($request->hasFile('image')) {
//            $imagePath = $request->file('image')->store('products', 'public');
//            $validatedData['image'] = $imagePath;
//        }

        $product = new Product($validatedData);
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'colors' => 'nullable|string|max:255',
            'matter' => 'nullable|string|max:255',
            'discount' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:En Stock,Epuise',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}


