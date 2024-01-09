<!DOCTYPE html>
<html>
<head>
    <title>Your Property Rental Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
   body {
    font-family: "Century Gothic", 'Lato', sans-serif;
    background-color: #F5F5F5;
}

a {
    text-decoration: none;
}
.intro {
    display: flex;
    color: white;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 17vh;
    position: relative;
    background: #004080;
    text-align: center;
    padding: 0 2em;
}
.intro-h1 {
    font-size: 1rem;
    margin-top: 15px;
    margin-bottom: 10px;
    padding: 0;
    letter-spacing: 1rem;
}

.intro-h3 {
    font-size: 0.6rem;
    letter-spacing: 0.3rem;
    margin-top: 10px;
    margin-bottom: 10px;
    padding: 0;
    opacity: 0.6;
}
/*Section background color*/
#tab-es6 {
    background-image: url('images/PropretiesIMG.JPG'); /* Replace with the actual path to your image */
    background-size: cover; /* Adjust the sizing of the background image */
    background-repeat: no-repeat; /* Prevent the background image from repeating */
    background-position: center center; /* Position the background image at the center */
    /* Add any additional styles you want for the section */
  }
  #tab-flexbox {
    background-image: url('images/RentIMG.JPG'); /* Replace with the actual path to your image */
    background-size: cover; /* Adjust the sizing of the background image */
    background-repeat: no-repeat; /* Prevent the background image from repeating */
    background-position: center center; /* Position the background image at the center */
    /* Add any additional styles you want for the section */
  }
  #tab-react {
    background-image: url('images/ServicesIMG.JPG'); /* Replace with the actual path to your image */
    background-size: cover; /* Adjust the sizing of the background image */
    background-repeat: no-repeat; /* Prevent the background image from repeating */
    background-position: center center; /* Position the background image at the center */
    /* Add any additional styles you want for the section */
  }
#tab-angular {
    background-image: url('images/AbUsIMG.JPG'); /* Replace with the actual path to your image */
    background-size: cover; /* Adjust the sizing of the background image */
    background-repeat: no-repeat; /* Prevent the background image from repeating */
    background-position: center center; /* Position the background image at the center */
    /* Add any additional styles you want for the section */
  }
  #tab-other {
    background-image: url('images/abthai.webp'); /* Replace with the actual path to your image */
    background-size: cover; /* Adjust the sizing of the background image */
    background-repeat: no-repeat; /* Prevent the background image from repeating */
    background-position: center center; /* Position the background image at the center */
    /* Add any additional styles you want for the section */
  }
  .overlay1 {
    background-image: url('images/black.webp');
    height: 800px;
    width: 1500px;
    opacity: 0.7;
    position: relative;
}
.overlay2 {
    background-image: url('images/black.webp');
    height: 800px;
    width: 1500px;
    opacity: 0.7;
    position: relative;
}
  .overlay3 {
    background-image: url('images/black.webp');
    height: 800px;
    width: 1500px;
    opacity: 0.7;
    position: relative;
}
  .overlay4 {
      background-image: url('images/black.webp');
      height: 800px;
      width: 1500px;
      opacity: 0.7;
      position: relative;
  }
  .overlay5 {
    background-image: url('images/black.webp');
    height: 800px;
    width: 1500px;
    opacity: 0.7;
    position: relative;
}

  .centered-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

/*CSS for the cards*/
@import url('https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700');
@import url('https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');

.cards {
    width: 100%;
    display: flex;
    justify-content: center;
    -webkit-justify-content: center;
    max-width: 820px;
    margin: 0 auto;
}

.card--1 .card__img, .card--1 .card__img--hover {
    background-image: url('images/PropretiesIMG.JPG');
}

.card--2 .card__img, .card--2 .card__img--hover {
    background-image: url('images/RentIMG.JPG');
}
.card--3 .card__img, .card--3 .card__img--hover {
    background-image: url('images/ServicesIMG.JPG');
}
.card--4 .card__img, .card--4 .card__img--hover {
    background-image: url('images/AbUsIMG.JPG');
}
.card--5 .card__img, .card--5 .card__img--hover {
    background-image: url('images/abthai.webp');
}

.card__like {
    width: 18px;
}

.card__clock {
    width: 15px;
  vertical-align: middle;
    fill: #AD7D52;
}
.card__time {
    font-size: 12px;
    color: #AD7D52;
    vertical-align: middle;
    margin-left: 5px;
}

.card__clock-info {
    float: right;
}

.card__img {
  visibility: hidden;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    width: 100%;
    height: 235px;
  border-top-left-radius: 12px;
border-top-right-radius: 12px;
  
}

.card__info-hover {
    position: absolute;
    padding: 16px;
  width: 100%;
  height: 100%;
  opacity: 0;
  background: rgba(0, 0, 0, 0.7);
  color: white;
  top: 0;
  left: 0;
}

.card__img--hover {
  transition: 0.2s all ease-out;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    width: 100%;
  position: absolute;
    height: 235px;
  border-top-left-radius: 12px;
border-top-right-radius: 12px;
top: 0;
  
}
.card {
  margin-right: 25px;
  transition: all .4s cubic-bezier(0.175, 0.885, 0, 1);
  background-color: #fff;
    width: 600px;
  position: relative;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0px 13px 10px -7px rgba(0, 0, 0,0.1);
}
.card:hover {
  box-shadow: 0px 30px 18px -8px rgba(0, 0, 0,0.1);
    transform: scale(1.10, 1.10);
}

.card__info {
z-index: 2;
  background-color: #fff;
  border-bottom-left-radius: 12px;
border-bottom-right-radius: 12px;
   padding: 16px 24px 24px 24px;
}

.card__category {
    font-family: 'Raleway', sans-serif;
    text-transform: uppercase;
    font-size: 13px;
    letter-spacing: 2px;
    font-weight: 500;
  color: #868686;
}

.card__title {
    margin-top: 5px;
    margin-bottom: 10px;
    font-family: 'Roboto Slab', serif;
}


.card__by {
    font-size: 12px;
    font-family: 'Raleway', sans-serif;
    font-weight: 500;
}

.card__author {
    font-weight: 600;
    text-decoration: none;
    color: #AD7D52;
}

.card:hover .card__img--hover {
    height: 100%;
    opacity: 1;
;
}

.card:hover .card__info {
    background-color: transparent;
    position: relative;
    color: yellow;
}


.card:hover .card__info-hover {
    opacity: 1;
}

/*css for caroussel*/
#myCarousel {
    height: 700px; /* Set your preferred height here */
    width: 1300px;
    object-fit: contain;
    margin: auto;
  }

  /* Set fixed height for carousel images */
  #myCarousel .carousel-inner .carousel-item img {
    height: 700px; /* Use a height that fits well within the carousel */
  }

    </style>
    
</head>
<body>
    <section class="intro">
        <h1 class="intro-h1">Welcome to Your Property Rental Website</h1>
        <h3 class="intro-h3">...</h3>
        </section>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">FLO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav" style="font-size: 20px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tab-es6">Propreties</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tab-flexbox">Rent</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tab-react">About-us</a>
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
    <a class="nav-link" href="{{ route('loginPage') }}">Login</a>
  </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<br/>
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/thailand1.jpeg') }}" class="d-block w-100" alt="Image 1">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/thailand2.jpeg') }}" class="d-block w-100" alt="Image 2">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/thailand1.jpeg') }}" class="d-block w-100" alt="Image 3">
    </div>
    <!-- Add more carousel items for additional slides -->
  </div>
  <ol class="carousel-indicators">
    <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
    <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
    <!-- Add more indicators for additional slides -->
  </ol>
</div>


        <div class="thumbnail-container">
            <div class="thumbnail active"></div>
            <div class="thumbnail"></div>
            <div class="thumbnail"></div>
            <div class="thumbnail"></div>
            <div class="thumbnail"></div>
        </div>
<br/>
        <section class="et-slide" id="tab-es6">
          <div class="overlay1">
            <div class="centered-content">
          <h1 style="color: white;">Propreties</h1>
          <div class="cards">
            
          <article class="card card--1">
            <div class="card__info-hover">
              <svg class="card__like"  viewBox="0 0 24 24">
              <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
          </svg>
                <div class="card__clock-info">
                  <svg class="card__clock"  viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
                  </svg><span class="card__time">5 min</span>
                </div>
              
            </div>
            <div class="card__img"></div>
            <a href="{{ route('properties') }}" class="card_link">
               <div class="card__img--hover"></div>
             </a>
            <div class="card__info">
              <span class="card__category"> Propreties for rent</span>
              <h3 class="card__titleWhite">Unlock the Door to Your Ideal Property</h3>
              <span class="card__by">.<a href="#" class="card__author" title="author">..</a></span>
            </div>
          </article>  
        </div>
        </div>
      </div>
        </section>
        <section class="et-slide" id="tab-flexbox">
          <div class="overlay2">
            <div class="centered-content">
          <h1 style="color: white;">Rent</h1>
          <div class="cards">
           
            <article class="card card--2">
              <div class="card__info-hover">
                <svg class="card__like"  viewBox="0 0 24 24">
                <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
            </svg>
                  <div class="card__clock-info">
                    <svg class="card__clock"  viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
                    </svg><span class="card__time">5 min</span>
                  </div>
                
              </div>
              <div class="card__img"></div>
              <a href="RentOut.html" class="card_link">
                 <div class="card__img--hover"></div>
               </a>
              <div class="card__info">
                <span class="card__category"> Rent Out Your Proprety</span>
                <h3 class="card__title">Turning your proprety into profit</h3>
                <span class="card__by">.<a href="#" class="card__author" title="author">..</a></span>
              </div>
            </article>    
          </div>
        </div>
        </div>
        </section>
        <section class="et-slide" id="tab-react">
          <div class="overlay3">
            <div class="centered-content">
          <h1 style="color: white;">About-us</h1>
          <div class="cards">
            <article class="card card--3">
              <div class="card__info-hover">
                <svg class="card__like"  viewBox="0 0 24 24">
                <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
            </svg>
                  <div class="card__clock-info">
                    <svg class="card__clock"  viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
                    </svg><span class="card__time">5 min</span>
                  </div>
                
              </div>
              <div class="card__img"></div>
              <a href="#" class="card_link">
                 <div class="card__img--hover"></div>
               </a>
              <div class="card__info">
                <span class="card__category"> Our Investment Services</span>
                <h3 class="card__title">Maximize your Returns </h3>
                <span class="card__by">.<a href="#" class="card__author" title="author">..</a></span>
              </div>
            </article>  
          </div>
        </div>
        </div>
        </section>
        <section class="et-slide" id="tab-angular">
          <div class="overlay4">
            <div class="centered-content">
          <h1 style="color: white;">About-Us</h1>
          <div class="cards">
            <article class="card card--4">
              <div class="card__info-hover">
                <svg class="card__like"  viewBox="0 0 24 24">
                <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
            </svg>
                  <div class="card__clock-info">
                    <svg class="card__clock"  viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
                    </svg><span class="card__time">5 min</span>
                  </div>
                
              </div>
              <div class="card__img"></div>
              <a href="#" class="card_link">
                 <div class="card__img--hover"></div>
               </a>
              <div class="card__info">
                <span class="card__category"> Travel</span>
                <h3 class="card__title">Discover the sea</h3>
                <span class="card__by">by <a href="#" class="card__author" title="author">John Doe</a></span>
              </div>
            </article>  
          </div>
        </div>
        </div>
        </section>
        <section class="et-slide" id="tab-other">
          <div class="overlay5">
            <div class="centered-content">
          <h1 style="color: white;">News</h1>
          <div class="cards">
            <article class="card card--5">
              <div class="card__info-hover">
                <svg class="card__like"  viewBox="0 0 24 24">
                <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
            </svg>
                  <div class="card__clock-info">
                    <svg class="card__clock"  viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
                    </svg><span class="card__time">5 min</span>
                  </div>
                
              </div>
              <div class="card__img"></div>
              <a href="{{ route('newsPage') }}" class="card_link">
                 <div class="card__img--hover"></div>
               </a>
              <div class="card__info">
                <span class="card__category"> Travel</span>
                <h3 class="card__title">Discover the sea</h3>
                <span class="card__by">by <a href="#" class="card__author" title="author">John Doe</a></span>
              </div>
            </article>  
          </div>
        </div>
        </div>
        </section>
      </main>
      <footer class="footer bg-dark text-light pt-5 pb-4">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-3">
        <h5 class="text-uppercase mb-4">About Us</h5>
        <p>We provide top-quality rental services to meet your needs in Thailand.</p>
      </div>

      <div class="col-md-4 mb-3">
        <h5 class="text-uppercase mb-4">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-decoration-none text-light">Home</a></li>
          <li><a href="#" class="text-decoration-none text-light">Rentals</a></li>
          <li><a href="#" class="text-decoration-none text-light">About</a></li>
          <li><a href="#" class="text-decoration-none text-light">Contact</a></li>
        </ul>
      </div>

      <div class="col-md-4 mb-3">
        <h5 class="text-uppercase mb-4">Contact Us</h5>
        <p>Email: info@rentalwebsite.com</p>
        <p>Phone: +1234567890</p>
      </div>
    </div>

    <div class="footer-bottom text-center pt-3">
      &copy; 2023 Rental Website | Designed by YourName
    </div>
  </div>
</footer>
</body>
</html>