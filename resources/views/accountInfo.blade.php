<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
    </style>
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
          <a class="nav-link" href="#tab-es6">Properties</a>
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
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact.form') }}">Contact-US</a>
        </li>

        <!-- Conditional links based on user role -->
        @auth <!-- Check if user is authenticated -->
          @if(auth()->user()->is_admin)
            <!-- Links only for admin users -->
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.inbox') }}">Admin Inbox</a>
            </li>
            <!-- More admin links -->
          @else
            <!-- Links for regular authenticated users -->
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user.inbox') }}">User Inbox</a>
            </li>
            <!-- More user links -->
          @endif
        @endauth
      </ul>
    </div>

    <div class="navbar-nav ml-auto">
      @auth
        <!-- Dropdown for authenticated users -->
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('account.info') }}">Account</a></li>
            @if(auth()->user()->is_admin)
              <!-- Show this dropdown item only if the user is an admin -->
              <li><a class="dropdown-item" href="#">Manage users</a></li>
            @endif
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Delete Account</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                 @csrf
                <button type="submit" class="dropdown-item">Log Out</button>
                </form>
         </li>
          </ul>
        </div>
      @else
        <!-- Links for guests like login, register, etc. -->
      @endauth
    </div>
  </div>
</nav>
<div class="container">
<br/>
    <h1 class="text-center mb-4">Account Information</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <p><strong>Name:</strong> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        @if ($user->avatar)
        <img src="{{ asset('storage/' . $user->avatar) }}" alt="User Avatar" style="max-width: 200px; height: auto;">
    @endif
    </div>

    <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="birthdate">Birthdate</label>
            <input type="date" name="birthdate" id="birthdate" class="form-control" value="{{ old('birthdate', $user->birthdate) }}">
        </div>

        <div class="form-group">
            <label for="avatar">Profile Picture</label>
            <input type="file" name="avatar" id="avatar" class="form-control">
        </div>

        <div class="form-group">
            <label for="about_me">About Me</label>
            <textarea name="about_me" id="about_me" class="form-control">{{ old('about_me', $user->about_me) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
