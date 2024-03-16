<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>
<body>

 <!--navigation bar-->  
 <div class="row">
      <div class="col">

        <nav class="navbar navbar-expand-lg fixed-top bg-dark">
                <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarnew" aria-controls="navbarnew" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarnew">
                  <a class="navbar-brand" href="/"><img class="img-fluid" style="height:50px" src="{{ asset('images/Logo.png') }}" alt="logo"></a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="tours">Tours</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="about">About Us</a>
                      </li>
                      
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="attractions">Attractions</a></li>
                              <li><a class="dropdown-item" href="hotels">Hotels</a></li>
                              <li><a class="dropdown-item" href="foods">Foods and Cafe</a></li>
                              <li><a class="dropdown-item" href="rentals">Rental Items</a></li>
                              <li><a class="dropdown-item" href="shops">Shops</a></li>
                          </ul>
                      </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <li class="nav-item sign"><a class="nav-link" href="signup"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                      </svg> Sign Up</a></li>
                      <li class="nav-item sign"><a class="nav-link" href="login"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                      <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                      </svg> Login</a></li>
                    </ul>
                  </div>
                </div>
              </nav>
      </div>
    </div>
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-md-8" style="padding:60px;">
                <h3 class="aboutpara">About Us</h3><br>
                <p class="aboutpara">
                Welcome to TravelTracker.com, your premier destination for seamless travel planning and unforgettable experiences! At TravelTracker.com, we believe that every journey should be filled with excitement, discovery, and relaxation. That's why we've created a user-friendly platform that empowers travelers to craft their dream vacations with ease.</p>

<p class="aboutpara">Founded with a passion for exploration and a commitment to simplifying the travel planning process, TravelTracker.com offers a comprehensive suite of tools and resources to help you plan the perfect getaway. Whether you're embarking on a solo adventure, a romantic escape, or a family vacation, our intuitive interface makes it simple to create personalized itineraries tailored to your unique interests and preferences.</p>

<p class="aboutpara">One of the hallmarks of TravelTracker.com is our extensive database of attractions, hotels, shops, rental services, and restaurants. Unlike other travel planning platforms, our content is curated directly by users like you, ensuring that you have access to the most up-to-date and authentic recommendations. Whether you're seeking out hidden gems off the beaten path or searching for renowned landmarks and accommodations, TravelTracker.com has you covered.</p>

<p class="aboutpara">In addition to user-generated content, TravelTracker.com also collaborates with experienced tour guides and travel experts to offer a curated selection of pre-packaged tour packages. From guided city tours to adventurous outdoor excursions, these carefully crafted itineraries take the guesswork out of travel planning, allowing you to focus on making memories and exploring new horizons.</p>

<p class="aboutpara">At TravelTracker.com, we're more than just a travel planning platform – we're your trusted companion on every journey. Our dedicated team is committed to providing unparalleled customer support and assistance every step of the way. Whether you have a question about booking accommodations, need recommendations for local attractions, or simply want some insider tips for your destination, our team is here to help.</p>

<p class="aboutpara">Thank you for choosing TravelTracker.com for your travel planning needs. We look forward to helping you create unforgettable experiences and embark on the adventure of a lifetime!</p>

<p class="aboutpara">Happy travels,</p>
<p class="aboutpara">The TravelTracker.com Team</p>

            </div>
            <div class="col-md" style="padding-top:180px;">
                <img src="{{ asset('images/aboutpic.jpg') }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>

     <!--footer-->
     <div class="container-fluid bg-dark bg-gradient gradiantsec">
            <div class="container">
              <div class="row footer1">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                      <h5>Contact Us</h5>
                      <p>196/2, Egodawatta, Mahagama.</p>
                      <p>Email: anjananuwan19921221@gmail.com</p>
                      <br>
                      <h5>Hotline</h5>
                      <p>+94772860193</p>
                    </div>
                    <div class="col-md">
                      <h5>Main Menu</h5>
                      <a href="attractions"><p>Attractions</p></a>
                      <a href="hotels"><p>Hotels</p></a>
                      <a href="foods"><p>Foods & Cafes</p></a>
                      <a href="rentals"><p>Rental Shops</p></a>
                      <a href="shops"><p>Shops</p></a>
                      <a href="tours"><p>Tours</p></a>
                    </div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row">
                    <img class="img-fluid" style="width:200px" src="{{ asset('images/Logo.png') }}" alt="logo">
                    <p style="margin-top: 10px;">Copyright <span>TravelTracker.com</span>&copy; 2024 All Rights Reserved </p>
                    <p>Website designed and developed by <span>B.V.N. Anjana</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

</body>
</html>