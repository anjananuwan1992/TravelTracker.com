<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add business</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
    <script>
              // Hide the error card after 3 seconds
              setTimeout(function() {
                  var errorCard = document.getElementById('error-card');
                  if (errorCard) {
                      errorCard.style.display = 'none';
                  }
              }, 3000);
              
          </script>
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
                       
                      </div>
                    </div>
                </nav>
          </div>
        </div><br>

  <div class="container" style="">
    <div class="row">
            <div class="col-3"></div>
            <div class="col-6 border border-primary rounded-2 border border-2 loginborder reg-form">

            <h2>Add Business Details</h2>
            <hr>
           
                <form action="{{route('save.business')}}" method="post" enctype="multipart/form-data">
                     @if(Session::has('success'))
                      <div id="error-card" class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div id="error-card" class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    
                    <div class="form-group">
                      @if($email)
                      <input type="hidden" class="form-control" name="email" value="{{ $email }}">
                      @endif
                      <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>

                    <label for="type">Select Business Type:</label>
                    <select class="form-control" id="type" name="type">
                        <option value="hotels">Hotels</option>
                        <option value="foods-and-cafe">Foods and Cafe</option>
                        <option value="rental-items">Rental Items</option>
                        <option value="shops">Shops</option>
                    </select><br>
        
                    <div class="form-group">
                        <label for="name">Business Name</label>
                        <input type="text" class="form-control" placeholder="Enter Business Name" name="name" value="{{old('name')}}">
                        <span class="text-danger">@error('name') {{$message}} @enderror</span>
                    </div><br>
        
                    <div class="form-group">
                        <label for="introduction">Business Introduction</label>
                        <textarea class="form-control" name="introduction" value="">{{old('introduction')}}</textarea>
                        <span class="text-danger">@error('introduction') {{$message}} @enderror</span>
                    </div><br>
        
                    <div class="form-group">
                        <label for="address">Business Address</label>
                        <input type="text" class="form-control" placeholder="Enter Business Address" name="address" value="{{old('address')}}">
                        <span class="text-danger">@error('address') {{$message}} @enderror</span>
                    </div><br>
        
                    <div class="form-group">
                        <label for="contact">Business Contact Number</label>
                        <input type="text" class="form-control" placeholder="Enter Business Contact Number" name="contact" value="{{old('contact')}}">
                        <span class="text-danger">@error('contact') {{$message}} @enderror</span>
                    </div><br>
        
                    <div class="form-group">
                        <label for="registration_no">Business Registration Number</label>
                        <input type="text" class="form-control" placeholder="Enter Business Registration Number" name="registration_no" value="{{old('registration')}}">
                    </div><br>
        
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="latitude" name="latitude" placeholder="Latitude">
                    </div>
        
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="longitude" name="longitude" placeholder="Longitude">
                    </div>
        
                    <div class="form-group">
                        <label for="cover_img" class="custom-file-lable">Choose a Cover Image <span class="infomsg">(You should choose 1600 x 600 jpg,jpeg,png,gif image for best attraction)</span></label><br>
                        <input type="file" class="custom-file-input" placeholder="" name="cover_img" value="{{old('cover_img')}}">
                    </div>
                    <br>

                    <div>
                        <label for="location">Select Your Business Location Here</label><br>
                        <div id="map" style="height: 400px; width: 100%;"></div>

                            <script>
                                var map;
                                var latitudeInput = document.getElementById('latitude');
                                var longitudeInput = document.getElementById('longitude');
                                var marker;

                                function initMap() {
                                    map = new google.maps.Map(document.getElementById('map'), {
                                        center: { lat: 6.9271, lng: 79.8612 },
                                        zoom: 10
                                    });

                                    // Add a click event listener to the map
                                    map.addListener('click', function(event) {
                                        var clickedLocation = event.latLng;
                                        latitudeInput.value = clickedLocation.lat();
                                        longitudeInput.value = clickedLocation.lng();

                                        if (marker) {
                                            marker.setMap(null);
                                        }

                                        marker = new google.maps.Marker({
                                            position: clickedLocation,
                                            map: map
                                        });
                                    });
                                }
                            </script>
                    </div><br><br>
        
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-3">
                

            </div>
    </div>
  </div>