<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;


use App\Models\Category;
use App\Models\Partner;
use Illuminate\Http\Request;


// Make sure to import the Partner model

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::with('products', 'category')->get();
        return view('partners.index', compact('partners'));
    }

    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        return view('partners.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'partner_name' => 'required|max:255',
            'contact_email' => 'required|email',
            'contact_phone' => 'required',
            'contact_address' => 'required',
            'payment_info' => 'nullable',
            'contract_details' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logo', 'public');
            $validatedData['logo'] = $logoPath;
        }

        Partner::create($validatedData);

        return redirect()->route('partners.index')->with('success', 'Partner created successfully.');
    }

    public function edit($id)

    {
        $partner = Partner::findOrFail($id);
        $categories = Category::all();
        return view('partners.edit', compact('partner', 'categories'));
    }

    public function update(Request $request, Partner $partner)
    {
        $validatedData = $request->validate([
            'partner_name' => 'required|max:255',
            'contact_email' => 'required|email',
            'contact_phone' => 'required',
            'contact_address' => 'required',
            'payment_info' => 'nullable',
            'contract_details' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->hasFile('logo')) {
            // Delete the previous logo if it exists
            if ($partner->logo) {
                Storage::delete('public/logo/' . $partner->logo);
            }

            // Upload and store the new logo
            $logoPath = $request->file('logo')->store('logo', 'public');
            $partner->logo = $logoPath;
        }

        // Handle logo deletion
        if ($request->has('delete_images')) {
            $imagePathToDelete = $request->input('delete_images');
            Storage::delete('public/logo/' . $imagePathToDelete);
            $partner->logo = null; // Or set it to a default image path
        }

        $partner->save();


        $partner->update($validatedData);

        return redirect()->route('partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);

        // Delete the partner
        $partner->delete();

        return redirect()->route('partners.index')->with('success', 'Partner deleted successfully.');
    }

    public function show($id)
    {
        $partner = Partner::findOrFail($id);

        return view('partners.show', compact('partner'));
    }

}

