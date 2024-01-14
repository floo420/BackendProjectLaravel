<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $property->condo_title }} Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick Carousel CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin-top: 20px;
        }
        .hero-section {
        display: flex; /* Use flexbox to center the child */
        justify-content: center; /* Center horizontally */
        height: 600px; /* Fixed height for the hero section */
        margin-bottom: -50px; /* Adjust as needed to overlap with the info box */
        background-color: #f4f4f4; /* Background color if the image is smaller than the container */
        overflow: hidden; /* Prevents overflow */
    }
    .hero-image-container {
        flex: 0 0 auto; /* Do not grow or shrink */
    }
    .hero-section img {
        max-width: 100%; /* Maximum width */
        max-height: 100%; /* Maximum height */
        object-fit: contain; /* Ensures full image is visible */
    }
.info-box {
background: white;
padding: 1rem;
border-radius: 0.5rem;
box-shadow: 0 4px 8px rgba(0,0,0,0.2);
position: relative;
top: -50px;
margin-bottom: -30px;
display: flex;
justify-content: space-around;
align-items: center;
z-index: 10;
}
.property-details {
padding: 2rem 0;
background: #fff;
border-radius: 0.5rem;
box-shadow: 0 2px 4px rgba(0,0,0,0.1);
margin-top: 2rem;
}
.property-details h2 {
font-size: 2.5rem;
font-weight: bold;
margin-bottom: 1rem;
color: #333;
}
.detail-item {
padding: 0.5rem 0;
display: flex;
align-items: center;
}
.detail-item i {
font-size: 1.5rem;
margin-right: 10px;
color: #0056b3;
}
.detail-item p {
margin: 0;
font-size: 1.2rem;
color: #666;
}
.gallery-carousel {
margin: 2rem 0;
}
.slick-slide img {
width: 100%;
border-radius: 0.25rem;
margin: 0 5px;
}
.description,
.reviews {
background: #fff;
padding: 2rem;
border-radius: 0.25rem;
box-shadow: 0 4px 8px rgba(0,0,0,0.2);
margin-top: 2rem;
}
.description h3,
.reviews h3 {
font-size: 1.8rem;
color: #333;
 margin-bottom: 1rem;
}
.description p,
.reviews p {
font-size: 1.1rem;
line-height: 1.6;
color: #666;
}
    </style>
</head>
<body>
@extends('layouts.layout1')
@section('content')
    <div class="hero-section">
        <img src="{{ asset('storage/' . $property->condo_picture) }}" alt="{{ $property->condo_title }}">
    </div>

    <!-- Property details info box -->
    <div class="container info-box">
        <div>
            <h5 class="card-title">{{ $property->condo_title }}</h5>
            <p>{{ $property->location }}</p>
        </div>
        
<div><i class="fas fa-bed"></i> <span>{{ $property->bedrooms }} Bedrooms</span></div>
<div><i class="fas fa-bath"></i> <span>{{ $property->bathrooms }} Bathrooms</span></div>
<div><i class="fas fa-users"></i> <span>Max Occupancy: {{ $property->max_occupancy }}</span></div>
<div><i class="fas fa-tag"></i> <span>Price: {{ $property->price }}฿/Night</span></div>
</div>


<div class="container converter">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="input-group">
                <input type="number" class="form-control" id="bahtAmount" placeholder="Enter Thai Baht amount">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="convertBahtToEuro()">Convert</button>
                </div>
            </div>
            <p id="euroResult"></p>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rentPropertyModal">
  Rent Property
</button>

<!-- Modal for Rent Property -->
<div class="modal fade" id="
rentPropertyModal" tabindex="-1" aria-labelledby="rentPropertyModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rentPropertyModalLabel">Rent Property</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(auth()->check())
          <p>Click confirm to proceed with renting this property.</p>
        @else
          <form id="rentPropertyForm">
            <div class="form-group">
              <label for="renterEmail">Email address</label>
              <input type="email" class="form-control" id="renterEmail" required>
            </div>
            <button type="submit" class="btn btn-primary">Confirm Rent</button>
          </form>
        @endif
      </div>
    </div>
  </div>
</div>

<br/>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script>
    function convertBahtToEuro() {
      const bahtAmount = parseFloat(document.getElementById('bahtAmount').value);
      if (!isNaN(bahtAmount)) {
          // You can use the current exchange rate for the conversion
          const exchangeRate = 0.026; // Replace with the actual exchange rate
          const euroAmount = bahtAmount * exchangeRate;
          document.getElementById('euroResult').textContent = `Converted Amount: €${euroAmount.toFixed(2)}`;
      } else {
          document.getElementById('euroResult').textContent = 'Please enter a valid Thai Baht amount.';
      }
  }
    </script>
    <script>
    $(document).ready(function() {
        $('#rentPropertyForm').on('submit', function(e) {
            e.preventDefault();
            var email = $('#renterEmail').val();
            // Make an AJAX call to your Laravel backend
            $.ajax({
                url: "{{ route('property.rent', $property->id) }}",
                type: 'POST',
                data: {
                    email: email,
                    _token: "{{ csrf_token() }}" // CSRF token for Laravel
                },
                success: function(response) {
                    // Handle success, such as closing the modal and showing a message
                    $('#rentPropertyModal').modal('hide');
                    alert('Property rented successfully.');
                },
                error: function(response) {
                    // Handle error
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
</script>
@endsection

</body>
</html>