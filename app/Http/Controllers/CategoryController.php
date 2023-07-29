<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryOption;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            $category->options = $category->options()->get();
        }

        return view('categories.index', compact('categories'));
    }


    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'options.*' => 'nullable|string|max:255',
        ]);

        $category = Category::create([
            'name' => $request->input('name'),
        ]);

        $options = $request->input('options');

        if ($options) {
            foreach ($options as $option) {
                CategoryOption::create([
                    'name' => $option,
                    'category_id' => $category->id,
                ]);
            }
        }

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }


    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'option' => 'required|string|max:255',
            // Add any other validation rules for the columns if needed
        ]);

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
