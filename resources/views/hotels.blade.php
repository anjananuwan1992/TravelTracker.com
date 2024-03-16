<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
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

    <div class="container-fluid content">
        <div class="row color">
            <div class="col-sm-6">
                <div class="overflow-auto" style= "height:92vh;" id="location-info">
                    <br>
                    <h3 id="bis-name"></h3>
                    <br>
                    <img style="width: 50vw;" class="img-fluid" id="cvrimg" src="" alt="">
                    <br><br>
                    
                    <h6 style="white-space: pre-wrap;" id="bis-intro"></h6>
                    <h6 id="contact"></h6>
                    <h6 id="email"></h6>
                    <br>
                    <div id="attraction-details"></div>
                </div>
            </div>
            <div class="col-sm-6 sec3" id="map" style="height: 92vh;"></div>
        </div>
    </div>

    
        
        <script>
          var currentMarker = null;
          
          function initMap() {
              var mycenter = {lat: 7.2906, lng: 80.6336}; //Colombo
               

              var map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 8,
                  center: mycenter
              });
              @foreach($businesses as $business)
              @if($business->status == 'active')
              @if($business->type == 'hotels')

                
                
                var myLatLng_{{ $business->id }} = { lat: {{ $business->latitude }}, lng: {{ $business->longitude }} };
                var iconUrl = '{{ asset('images/blue.PNG') }}'; // Set the default icon URL

                var marker_{{ $business->id }} = new google.maps.Marker({
                  position: myLatLng_{{ $business->id }},
                  icon: iconUrl,
                  map: map
                });
                
                
                var markerCounter = 0;
                var locationCounter = 1;

                marker_{{$business->id}}.addListener('click', function(){
                  var businessName ="{{$business->title}}";
                  var businessintro = "{{$business->introduction}}";
                  var businessId = "{{$business->id}}";
                  var latvalue ="{{$business->latitude}}";
                  var longvalue ="{{$business->longitude}}";
                  var contact = "{{$business->contact}}";
                  var email = "{{$business->email}}";
                  
                  

                  markerCounter++;

                  document.getElementById('bis-name').innerText = '';
                  document.getElementById('bis-intro').innerText = '';
                  document.getElementById('contact').innerText = '';
                  document.getElementById('email').innerText = '';

                  document.getElementById('contact').innerText = contact;
                  document.getElementById('email').innerText = email;
                  document.getElementById('bis-name').innerText = businessName;
                  document.getElementById('bis-intro').innerText = businessintro;

                  var image = document.getElementById('cvrimg');
                  image.src = '{{asset($business->cover_img)}}'
                  currentMarker = marker_{{$business->id}};

                  var attractionDetails = document.getElementById('attraction-details');
                  attractionDetails.innerHTML = ''; // Clear previous package details

                  @foreach($packages as $package)
                    @if($package->email == $business->email)
                        var attractionElement = document.createElement('div');
                        attractionElement.innerHTML = `
                            <br>
                            <h4>{{$package->title}}</h4>
                            <br>
                            <div class="row">
                            <div class="col-sm-6">
                            <img src="{{asset($package->img_one)}}" class="img-fluid">
                            </div>
                            <div class="col-sm-6">
                            <img src="{{asset($package->img_two)}}" class="img-fluid">
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-6">
                            <img src="{{asset($package->img_three)}}" class="img-fluid">
                            </div>
                            <div class="col-sm-6">
                            <img src="{{asset($package->img_four)}}" class="img-fluid">
                            </div>
                            </div><br>
                            <p style="white-space: pre-wrap;">{{$package->introduction}}</p>
                            <h6>{{$package->price}} {{$package->currency}}</h6>
                            
                        `;
                        attractionDetails.appendChild(attractionElement);
                    @endif
                    @endforeach
                

                  function addlocation(businessName, latvalue, longvalue, markerCounter) {
                    var locationInputId = 'locationInput' + locationCounter;
                    var latInputClass = 'latinput' + locationCounter;
                    var longInputClass = 'longinput' + locationCounter;
                  
                    var input = document.getElementById(locationInputId);
                    var latInput = document.querySelector('.' + latInputClass);
                    var longInput = document.querySelector('.' + longInputClass);

                    
                    if (input && latInput && longInput) {
                      input.value = businessName;
                      latInput.value = latvalue;
                      longInput.value = longvalue;
                      locationCounter++;
                    }
                    
                  }

                });

               

            @endif    
            @endif
              @endforeach 

              google.maps.event.addListener(map, 'click', function(){
              document.getElementById('bis-name').innerText = '';
              document.getElementById('bis-intro').innerText = '';
              currentMarker = null;
              });
             
          }

        
          
          
        </script>
        
        <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap"></script>
  </div>
  
</div>
    
</body>
</html>