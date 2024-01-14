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
    // Validation rules for property creation
    $request->validate([
        'condo_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'condo_title' => 'required|string|max:255',
        'bedrooms' => 'required|integer',
        'bathrooms' => 'required|integer',
        'max_occupancy' => 'required|integer',
        'price' => 'required|numeric',
        'location' => 'required|string|max:255',
    ]);

    // Handle file upload (if a condo picture is provided)
    if ($request->hasFile('condo_picture')) {
        $imagePath = $request->file('condo_picture')->store('condo_pictures', 'public');
    } else {
        $imagePath = null;
    }

    // Create and save the property
    Property::create([
        'condo_picture' => $imagePath,
        'condo_title' => $request->input('condo_title'),
        'bedrooms' => $request->input('bedrooms'),
        'bathrooms' => $request->input('bathrooms'),
        'max_occupancy' => $request->input('max_occupancy'),
        'price' => $request->input('price'),
        'location' => $request->input('location'),
    ]);

    // Log success and redirect
    \Log::info('Property created successfully');
    return redirect()->route('property.create')->with('success', 'Property created successfully');
}

public function index()
    {
        $properties = Property::all();
        return view('properties', compact('properties'));
    }

    public function show($id)
{
    $property = Property::findOrFail($id);
    return view('propertyInfo', compact('property'));
}

public function rent(Request $request, $id)
{
    $property = Property::findOrFail($id);

    if(auth()->check()) {
        // User is logged in
        $userId = auth()->id();
        // Add logic to store the rental information with the user ID
    } else {
        // User is not logged in, capture their email from the request
        $userEmail = $request->input('email');
        // Validate the email or any other required fields
        $request->validate([
            'email' => 'required|email',
        ]);
        // Validate the email or any other required fields
        $request->validate([
            'email' => 'required|email',
        ]);

        // Add logic to store the rental information with the user email
        // You might want to create a Rental model and table to store this data
        $rental = new Rental; // Assuming you have a Rental model
        $rental->property_id = $id;
        $rental->user_email = $userEmail; // Store email if user is not logged in
        $rental->save();
    }

    // Redirect back with a success message
    return redirect()->route('properties.index')->with('success', 'Property rented successfully.');
}


}
