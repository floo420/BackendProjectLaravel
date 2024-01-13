<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function create()
    {
        return view('rentOut');
    }

    public function store(Request $request)
    {
        // Validate and store property data in the database
        $validatedData = $request->validate([
            'condo_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'condo_title' => 'required|string|max:255',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'max_occupancy' => 'required|integer',
            'price' => 'required|numeric',
            'location' => 'required|string|max:255',
        ]);

        // Upload and store condo picture if provided
        if ($request->hasFile('condo_picture')) {
            $imagePath = $request->file('condo_picture')->store('condo_pictures', 'public');
            $validatedData['condo_picture'] = $imagePath;
        }

        try {
            // Create a new property record
            Property::create($validatedData);

            \Log::info('Property created successfully');

            // Success message
            return redirect()->route('property.create')->with('success', 'Property created successfully');
        } catch (\Exception $e) {
            
            \Log::error('Property creation failed: ' . $e->getMessage());

            // Error message
            return redirect()->route('property.create')->with('error', 'Property creation failed');
        }
    }
}
