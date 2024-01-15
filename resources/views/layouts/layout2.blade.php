<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <!-- Include your CSS and other head elements here -->
</head>
<body>
<footer class="footer bg-dark text-light pt-5 pb-4">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-3">
        <h5 class="text-uppercase mb-4">About</h5>
        <p>We provide top-quality rental services to meet your needs in Thailand.</p>
      </div>

      <div class="col-md-4 mb-3">
        <h5 class="text-uppercase mb-4">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="{{ route('homePageUsers') }}" class="text-decoration-none text-light">Home</a></li>
          <li><a href="{{ route('properties') }}" class="text-decoration-none text-light">Properties</a></li>
          <li><a href="{{ route('about') }}" class="text-decoration-none text-light">About</a></li>
          <li><a href="{{ route('contact.form') }}" class="text-decoration-none text-light">Contact</a></li>
        </ul>
      </div>

      <div class="col-md-4 mb-3">
        <h5 class="text-uppercase mb-4">Contact Us</h5>
        <p>Email: florian.brasseur@student.ehb.be</p>
        <p>Phone: +1234567890</p>
      </div>
    </div>

    <div class="footer-bottom text-center pt-3">
      &copy; 2023 Rental Website | Designed by Florian Brasseur
    </div>
  </div>
</footer>
</body>
</html>
