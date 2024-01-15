<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Rental;

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
        $isRented = Rental::where('property_id', $id)->exists();
        return view('propertyInfo', compact('property', 'isRented'));
    }

    public function rent(Request $request, $id)
{
    $property = Property::findOrFail($id);

    // Check if property is already rented
    if (Rental::where('property_id', $id)->exists()) {
        \Log::info('Attempted to rent an already rented property.');
        return response()->json(['error' => 'Property is already rented.'], 409); // 409 Conflict
    }

    try {
        $rental = new Rental;
        $rental->property_id = $id;

        if(auth()->check()) {
            // Logic for logged-in users
            $user = auth()->user(); // Getting the authenticated user
            $rental->user_id = $user->id; // Storing user ID
            $rental->user_email = $user->email; // Storing user email from authenticated user
            \Log::info('Rental stored for user ID: ' . $user->id);
        } else {
            // User is not logged in, capture their email
            $request->validate(['email' => 'required|email']);
            $rental->user_email = $request->input('email'); // Storing user email from form input
            \Log::info('Rental stored for email: ' . $request->input('email'));
        }

        $rental->save();
        return response()->json(['success' => 'Property rented successfully.']);
    } catch (\Exception $e) {
        \Log::error('Rent Error: ' . $e->getMessage());
        return response()->json(['error' => 'An error occurred.'], 500);
    }
}
public function manageProperties()
    {
        // Retrieve properties along with rental status and user email
        $properties = Property::leftJoin('rentals', 'properties.id', '=', 'rentals.property_id')
            ->select('properties.*', 'rentals.user_email')
            ->get();

        return view('manageProperties', compact('properties'));
    }

}
