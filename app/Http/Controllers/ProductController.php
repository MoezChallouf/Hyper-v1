<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;

class ProductController extends Controller
{
    // Display a listing of the products
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.index', compact('products'));
    }

    // Show the form for creating a new product

    public function create()
    {

        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Store a newly created product in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'status' => 'required|in:En Stock,Epuise',
            'matter' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'discount' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image.*' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:5120',
        ]);

        $product = new Product($validatedData);
        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $filename = $imageFile->getClientOriginalName();
                $path = $imageFile->storeAs('images', $filename, 'public');


                $image = new Image([
                    'filename' => $filename,
                    'path' => $path,
                ]);
                $product->images()->save($image);
                $fullPath = storage_path('app/public/' . $path);
                chmod($fullPath, 0755);
            }
        }

        return redirect()->route('products.index')->with('success', 'Your Product has been created.');
    }

//    public function tmpUpload(Request $request)
//    {
//        // Assuming 'product_id' is sent in the request
//        $productId = $request->input('product_id');
//
//        if ($request->hasFile('image')) {
//            $imageFile = $request->file('image');
//            $filename = uniqid() . '_' . $imageFile->getClientOriginalName();
//            $path = $imageFile->storeAs('images', $filename, 'public');
//
//            // Process and store the filename in the database
//            $image = new Image([
//                'filename' => $filename,
//                'path' => $path,
//            ]);
//            $image->save();
//
//            // Find the product by ID
//            $product = Product::find($productId);
//
//            if ($product) {
//                // Associate the image with the product
//                $product->images()->save($image);
//            } else {
//                return response()->json(['error' => 'Product not found.']);
//            }
//
//            return response()->json(['filename' => $filename]);
//        } else {
//            return response()->json(['error' => 'No file uploaded.']);
//        }
//    }


    // Show the specified product
    public function show($id)
    {
        $product = Product::with('images')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Show the form for editing the specified product
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }


    // Update the specified product in the database
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'quantity' => 'required|integer|min:0',
            'color' => 'nullable|string|max:255',
            'matter' => 'required|string|max:255',
            'discount' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0.01',
            'status' => 'required|in:En Stock,Epuise',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image.*' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:5120',
        ]);

        $product->update($validatedData);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $filename = $imageFile->getClientOriginalName();
                $path = $imageFile->storeAs('images', $filename, 'public');


                $image = new Image([
                    'filename' => $filename,
                    'path' => $path,
                ]);
                $product->images()->save($image);
                $fullPath = storage_path('app/public/' . $path);
                chmod($fullPath, 0755);
            }
        }
        if ($request->has('delete_images')) {
            $imagesToDelete = $request->input('delete_images');
            foreach ($imagesToDelete as $imageId) {
                $image = Image::find($imageId);
                if ($image) {
                    // Delete image from storage
                    Storage::delete('public/' . $image->path);

                    // Remove the image from the database
                    $image->delete();
                }
            }
        }
        return redirect()->route('products.show', $product)->with('success', 'Product updated successfully!');
    }

    // Remove the specified product from the database
    public function destroy(Product $product)
    {

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

    public function getImage($filename)
    {
        $path = storage_path('app/public/images/' . $filename);

        if (file_exists($path)) {
            return response()->file($path);
        }

        abort(404);
    }


}
