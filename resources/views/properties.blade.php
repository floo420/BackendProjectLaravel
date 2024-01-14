<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Property Listings</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  
  <style>
    /*slogan*/
.sloganH1 {
    font-size: 40px; 
    font-weight: 600; 
    color: #333; 
    text-align: center;
}
.sloganH2 {
    font-size: 30px; 
    font-weight: 600; 
    color: #333; 
    text-align: center;
}
.sloganH3 {
    font-size: 25px; 
    font-weight: 600; 
    color: #333; 
    text-align: center;
}

.center-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh; 
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
