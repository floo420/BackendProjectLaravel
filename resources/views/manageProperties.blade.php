<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Properties</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
@extends('layouts.layout1')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Manage Properties</h2>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Bedrooms</th>
                <th>Bathrooms</th>
                <th>Max Occupancy</th>
                <th>Price</th>
                <th>Location</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
            <tr>
                <td>{{ $property->condo_title }}</td>
                <td>{{ $property->bedrooms }}</td>
                <td>{{ $property->bathrooms }}</td>
                <td>{{ $property->max_occupancy }}</td>
                <td>{{ $property->price }}฿/Night</td>
                <td>{{ $property->location }}</td>
                <td>
                    @if($property->user_email)
                    Booked by {{ $property->user_email }}
                    @else
                    Available
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Include Bootstrap JS and jQuery (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

</body>
</html>
