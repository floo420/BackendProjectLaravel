@auth
    <span>Welcome, {{ Auth::user()->email }}</span>
    <!-- or any other user details -->
@else
    <p>lol</p>
@endauth
