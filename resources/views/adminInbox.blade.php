<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Inbox</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">FLO</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav" style="font-size: 20px;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('homePageUsers') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('homePageUsers') }}">Properties</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tab-flexbox">Rent</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tab-react">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tab-angular">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tab-other">News</a>
          </li>
        </ul>
      </div>
      <div class="navbar-nav ml-auto">
      @guest <!-- If the user is not authenticated -->
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        @else <!-- If the user is authenticated -->
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Account
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Account</a>
            @if(auth()->user() && auth()->user()->is_admin)
      <!-- Show this dropdown item only if the user is an admin -->
      <a class="dropdown-item" href="#">Manage users</a>
  @endif
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Delete Account</a>
          </div>
        </div>
        @endguest
      </div>
    </div>
  </nav>
<div class="container mt-5">
    <h1 class="mb-4">Admin Inbox</h1>

    @foreach ($messages as $message)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">From: {{ $message->user->name }} ({{ $message->user->email }})</h5>
            <h6 class="card-subtitle mb-2 text-muted">Subject: {{ $message->subject }}</h6>
            <p class="card-text">Message: {{ $message->content }}</p>
        </div>
    </div>
    @endforeach

</div>

<!-- Include Bootstrap JS (at the end of the body) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
