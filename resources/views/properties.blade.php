<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Property Listings</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  
  <style>
   .container {
            padding: 0;
        }
        .form-inline {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-group {
            margin-right: 10px;
        }

        /* Improve typography */
        body {
            font-family: 'Open Sans', sans-serif;
            color: #333;
        }
        .sloganH1 {
            font-size: 40px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 10px;
            color: #007BFF;
        }
        .sloganH2 {
            font-size: 24px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }
        .sloganH3 {
            font-size: 18px;
            font-weight: 500;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Style property cards */
        .card {
            border: none;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-img-top {
            object-fit: cover;
            height: 250px;
        }
        .card-title {
            font-size: 18px;
            font-weight: 600;
            margin: 10px 0;
        }
        .card-text {
            font-size: 16px;
        }
        .card-footer {
            background-color: #f8f9fa;
        }
  </style>
</head>
<body>
@extends('layouts.layout1')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
      <!-- Compact filter box -->
      <div class="col-md-9">
    
        <form class="form-inline">
          <div class="form-group mr-3">
            <label for="bedrooms" class="mr-2">Bedrooms:</label>
            <select class="form-control" id="bedrooms">
              <option value="">Any</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <!-- Add more options as needed -->
            </select>
          </div>
          <div class="form-group mr-3">
            <label for="max_price" class="mr-2">Max Price:</label>
            <input type="number" class="form-control" id="max_price" placeholder="Enter max price">
          </div>
          <!-- Add more compact filtering options as needed -->
          <button type="submit" class="btn btn-primary">Apply Filters</button>
        </form>
      </div>
  </div>
</br>
  <div class="slogans">
    <h2 class="sloganH2">Unlock the Door to Your Ideal Property - Find Your Dream Home Today</h2>
    <h1 class="sloganH1">Propreties for rent</h1>
    <h3 class="sloganH3">check out the latest propreties.</h3>
</div>
  
  <div class="container mt-4">
    <div class="row">
        @foreach ($properties as $property)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $property->condo_picture) }}" class="card-img-top" alt="{{ $property->condo_title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $property->condo_title }}</h5>
                        <p class="card-text">Bedrooms: {{ $property->bedrooms }}</p>
                        <p class="card-text">Bathrooms: {{ $property->bathrooms }}</p>
                        <p class="card-text">Max Occupancy: {{ $property->max_occupancy }}</p>
                        <p class="card-text">Price: ${{ $property->price }} /Night</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

  @endsection
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  

</body>
</html>
