<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Tracker.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    
</head>
<body>




<!--navigation bar-->  
<nav class="navbar navbar-expand-lg fixed-top bg-transparent">
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
                  <ul class="dropdown-menu dropdown-menu2 dropdown-menu3">
                      <li><a class="dropdown-item dropdown-item2" href="attractions">Attractions</a></li>
                      <li><a class="dropdown-item dropdown-item2" href="hotels">Hotels</a></li>
                      <li><a class="dropdown-item dropdown-item2" href="foods">Foods and Cafe</a></li>
                      <li><a class="dropdown-item dropdown-item2" href="rentals">Rental Items</a></li>
                      <li><a class="dropdown-item dropdown-item2" href="shops">Shops</a></li>
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


<script type="text/javascript" src="{{asset('js/javascript.js') }}"></script>
<!--hero section-->

<div class="container-fluid homeimg border-bottom border-5">
  <div class="container hero-sec">
    <div class="row">
        <div class="col-md-6 cover-text">
              <h1>Plan Your Own Journey <br> in Your Own Style</h1>
              <p><h5>The Largest Tour Planning Site in Sri Lanka</h5></p>
        </div>
        <!--plan Form-->
        @csrf
        <div class="col-md d-flex justify-content-center">
          <div class="row">
              <form action="{{ route('submit.plan') }}" method="Post" class="form-control trip-plan-form">
                @csrf

                @if($errors->has('amount'))
                <div id="error-card" class="alert alert-danger">
                  {{ $errors->first('amount') }}
                </div>
                @endif
                <div class="row">
                  <div class="col-md">
                    <h6>Start Date</h6>
                    <input type="Date" id="startDate" class="form-control" name="Start-Date">
                    <span class="text-danger">@error('Start-Date') {{$message}} @enderror</span>
                  </div>
                  <div class="col-md">
                    <h6>End Date</h6>
                    <input type="Date" id="endDate" class="form-control" name="End-Date">
                    <span class="text-danger">@error('End-Date') {{$message}} @enderror</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md">
                    <input type="hidden" name="autocomplete" id="autocomplete" class="form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md">
                    <div class="form-group" id="latitudeArea">
                      <input type="text" id="latitude" name="latitude" class="form-control hidden-input">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md">
                    <div class="form-group" id="longitudeArea">
                      <input type="text" id="longitude" name="longitude" class="form-control hidden-input">
                    </div>
                  </div>
                </div>
               <div class="row">
                  <div class="col-md">
                    <div class="form-group" id="">
                    <input type="hidden" id="dateamount" name="amount" class="form-control">
                    </div>
                  </div>
                </div>
                  <div class="col-md">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-dark btn-block" onclick="">Plan Your Journey</button>
                    </div>
                  </div>
              </form>
            
          </div>
        </div>
      </div>
    </div>
    <br>
  </div>
</div>
          <script>
              // Hide the error card after 15 seconds
              setTimeout(function() {
                  var errorCard = document.getElementById('error-card');
                  if (errorCard) {
                      errorCard.style.display = 'none';
                  }
              }, 5000);
          </script>

          <script>
            // Select the date input elements and result paragraph
            var startDateInput = document.getElementById("startDate");
            var endDateInput = document.getElementById("endDate");
            var resultElement = document.getElementById("dateamount");

            // Add an input event listener to each date input
            startDateInput.addEventListener("input", calculateDateDifference);
            endDateInput.addEventListener("input", calculateDateDifference);

            function calculateDateDifference() {
              var startDateValue = startDateInput.value;
              var endDateValue = endDateInput.value;

              if (!startDateValue || !endDateValue) {
                resultElement.value = "Please select both a start and end date.";
                return;
              }

              var startDate = new Date(startDateValue);
              var endDate = new Date(endDateValue);

              var timeDiff = endDate - startDate;
              var daysDiff = timeDiff / (1000 * 60 * 60 * 24);

              resultElement.value = 1 + daysDiff;
            }

          </script>
          <br>
          <div class="inforsection">
            <p>Welcome to TravelTracker.com - The Best Travel Partner in Sri Lanka</p>
          </div>
          <div class="inforsection2">
            <p>
Welcome to your gateway to the wonders of Sri Lanka! Dive into our vibrant culture, breathtaking landscapes, and rich heritage as you embark on your journey through this tropical paradise. Discover pristine beaches, ancient temples, lush tea plantations, and thrilling wildlife encounters. Let us guide you through your Sri Lankan adventure with expert travel tips, curated itineraries, and unforgettable experiences. Start planning your dream getaway today!</p>
          </div>

          
          <div class="container-fluid bg-dark bg-gradient gradiantsec">
            <div class="container menupic">
              <div class="row">
                <div class="col-sm-4"><p>Attractions</p><a href="attractions"><img class="img-fluid menupicture" src="{{ asset('images/menupic01.jpg') }}" alt=""></a></div>
                <div class="col-sm-4"><p>Hotels</p><a href="hotels"><img class="img-fluid menupicture" src="{{ asset('images/menupic03.jpg') }}" alt=""></a></div>
                <div class="col-sm"><p>Rental Shops</p><a href="rentals"><img class="img-fluid menupicture" src="{{ asset('images/menuic05.jpg') }}" alt=""></a></div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-4"><p>Foods & Cafes</p><a href="foods"><img class="img-fluid menupicture" src="{{ asset('images/menupic06.jpg') }}" alt=""></a></div>
                <div class="col-sm-4"><p>Shops</p><a href="shops"><img class="img-fluid menupicture" src="{{ asset('images/menupic04.jpg') }}" alt=""></a></div>
                <div class="col-sm-4"><p>Our Tours</p><a href="tours"><img class="img-fluid menupicture" src="{{ asset('images/menupic02.jpg') }}" alt=""></a></div>
              </div>
            </div>
          </div>
          <br>
          <br>
          <div class="container">
            <div class="row" style="text-align: center;">
              <p class="planyortripinfo">Plan Your Unforgetable Tour With</p>
              <P class="planyortriptitle">TravelTracker.com</P>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6" style="padding:60px;">
                <div class="row">
                  <p class="planyortrip">Plan Your Own Trip</p>
                  <p class="planyortripinfo ">Easily design your itinerary with our user-friendly tour planning tool, customizing every detail of your journey according to your preferences and interests.</p>
                </div>
                <br>
                <div class="row">
                  <p class="planyortrip">All Facility in One Place</p>
                  <p class="planyortripinfo">Find everything you need for your Sri Lankan adventure in one convenient location on our platform, from accommodations to attractions and more.</p>
                </div>
                <br>
                <div class="row">
                  <p class="planyortrip">365 x 24 Comparison</p>
                  <p class="planyortripinfo">Effortlessly compare various destinations and activities to make informed decisions, ensuring that every moment of your trip aligns perfectly with your desires.</p>
                </div>
                <br>
                <div class="row">
                  <p class="planyortrip">Well Experienced Guiders</p>
                  <p class="planyortripinfo">Embark on enriching adventures led by knowledgeable guides who offer insights, expertise, and memorable experiences, guaranteeing a deeper understanding and appreciation of Sri Lanka's wonders.</p>
                </div>
              </div>
              <div class="col-md" style="padding:50px;">
                <div class="row">
                  <img class="img-fluid menupicture" src="{{ asset('images/menuback.jpg') }}" alt="">
                </div>
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