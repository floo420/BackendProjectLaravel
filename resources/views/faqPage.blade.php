<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>
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
    <h2 class="text-center text-primary mb-4">Frequently Asked Questions</h2>

    @if(auth()->user() && auth()->user()->is_admin)
      <a href="{{ route('faqs.create') }}" class="btn btn-primary mb-3">Add Questions</a>
      <a href="{{ route('faq-categories.create') }}" class="btn btn-primary mb-3">Add Categories</a>
  @endif

    @foreach($categories as $category)
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ $category->name }}
            @if(auth()->user() && auth()->user()->is_admin)
        <!-- Add delete button here for categories -->
        <form action="{{ route('faq-categories.destroy', ['faq_category' => $category->id]) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete Category</button>
        </form>
        @endif
            </h3>
        </div>
        <div class="card-body">
            <ul class="list-unstyled">
                @foreach($faqs as $faq)
                @if($faq->category_id === $category->id)
                <li class="mb-3">
                    <h5 class="mb-2">{{ $faq->question }}</h5>
                    <p>{{ $faq->answer }}</p>
                    @if(auth()->user() && auth()->user()->is_admin)
                    <a href="{{ route('faqs.edit', ['faq' => $faq->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('faqs.destroy', ['faq' => $faq->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this FAQ?')">Delete</button>
                </form>                    @endif
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
    @endforeach
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
