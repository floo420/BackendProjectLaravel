<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; }
    .card { border: none; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
    .container { padding-top: 50px; }
  </style>
</head>
<body>
@extends('layouts.layout1')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Display success message if it exists -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card p-4">
        <h2 class="text-center mb-4">Change Password</h2>
        <form method="POST" action="{{ route('password.update') }}">
          @csrf
          <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="Your Email">
          </div>

          <div class="mb-3">
            <input type="password" class="form-control" name="current_password" placeholder="Current Password">
          </div>

          <div class="mb-3">
            <input type="password" class="form-control" name="new_password" placeholder="New Password">
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" name="new_password_confirmation" placeholder="Confirm New Password">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Change Password</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
