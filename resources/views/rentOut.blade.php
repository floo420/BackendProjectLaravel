<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Out Your Property</title>
</head>
<body>
@extends('layouts.layout1')

@section('title', 'Rent Out Your Property')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Rent Out Your Property</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('property.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="condo_picture">Condo Picture</label>
            <input type="file" class="form-control" id="condo_picture" name="condo_picture">
        </div>
        <div class="form-group">
            <label for="name">Property Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="bedrooms">Bedrooms</label>
            <input type="number" class="form-control" id="bedrooms" name="bedrooms" required>
        </div>
        <div class="form-group">
            <label for="bathrooms">Bathrooms</label>
            <input type="number" class="form-control" id="bathrooms" name="bathrooms" required>
        </div>
        <div class="form-group">
            <label for="max_occupancy">Max Occupancy</label>
            <input type="number" class="form-control" id="max_occupancy" name="max_occupancy" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

</body>
</html>
