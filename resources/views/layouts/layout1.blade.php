<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation bar</title>
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
          <a class="nav-link" href="#tab-react">About-Us</a>
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
        <!-- Show Log Out for logged-in users -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link nav-link">Log Out</button>
        </form>
    @endauth

    @guest
        <!-- Show Login for guests -->
        <a class="nav-link" href="{{ route('loginPage') }}">Login</a>
    @endguest
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
              <li><a class="dropdown-item" href="{{ route('admin.manage.users') }}">Manage users</a></li>
            @endif
            <li><a class="dropdown-item" href="{{ route('forgot-password') }}">Modify password</a></li>
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
</body>
</html>