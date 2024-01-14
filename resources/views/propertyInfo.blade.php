<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        .card-img-top {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        .card-title {
            font-size: 1.5rem;
            color: #333;
        }
        .card-text {
            font-size: 1.1rem;
            color: #666;
        }
        .btn-primary {
            background-color: #0056b3;
            border-color: #004a9f;
        }
        .btn-primary:hover {
            background-color: #004a9f;
        }
        .container {
            padding-top: 50px;
        }
    </style>
</head>
<body>
@extends('layouts.layout1')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img src="{{ asset('storage/' . $property->condo_picture) }}" class="card-img-top" alt="{{ $property->condo_title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $property->condo_title }}</h5>
                        <p class="card-text">Bedrooms: {{ $property->bedrooms }}</p>
                        <p class="card-text">Bathrooms: {{ $property->bathrooms }}</p>
                        <p class="card-text">Max Occupancy: {{ $property->max_occupancy }}</p>
                        <p class="card-text">Price: {{ $property->price }}฿ /Night</p>
                        <!-- Rent Button -->
                        <a href="{{ route('property.show', $property->id) }}" class="btn btn-primary">Rent Property</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endsection

</body>
</html>
