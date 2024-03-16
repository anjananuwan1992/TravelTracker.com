<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit-Tour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <scrip src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
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
                      <a class="navbar-brand" href="#"><img class="img-fluid" style="height:50px" src="{{ asset('images/Logo.png') }}" alt="logo"></a>
                        

                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item sign"><a class="nav-link" href="logout">Logout</a></li>
                        </ul>
                      </div>
                    </div>
                  </nav>
          </div>
        </div>


         <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
              <div class="container tourcontainre">

                  <div class="col-sm tourtitle">
                    <br><br>
                  <h4 >Edit Your Tour</h4>
                </div>
                  <br>
                  <div class="border border-2 rounded-3 border border-2 packageform loginborder">
             
                  <form action="{{route('update.tour')}}" method="post" enctype="multipart/form-data">
                       @if(Session::has('success'))
                        <div id="error-card" class="alert alert-success">{{Session::get('success')}}</div>
                      @endif
                      @if(Session::has('fail'))
                          <div id="error-card" class="alert alert-danger">{{Session::get('fail')}}</div>
                      @endif
                      @csrf
                      
                      <div class="form-group">
                          <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{$trip->title}}">
                          <span class="text-danger">@error('title') {{$message}} @enderror</span>
                      </div><br>
          
                      <div class="form-group">
                          <textarea rows="5" cols="50" style="white-space: pre-wrap;" class="form-control" name="details" placeholder="Enter Tour Details" value="">{{$trip->details}}</textarea>
                          <span class="text-danger">@error('details') {{$message}} @enderror</span>
                      </div><br>
  
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="Enter Tour Package Price" name="price" value="{{$trip->price}}">
                              <span class="text-danger">@error('price') {{$message}} @enderror</span>
                          </div>
                        </div>
                        <div class="col-sm">
                          <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="currency" value="Rs." checked>
                            <label class="form-check-label" for="radio1">Rs.</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="currency" value="USD.">
                            <label class="form-check-label" for="radio2">USD.</label>
                          </div>
  
                        </div>
                      </div><br>
                        
                          <div class="form-group">
                              <label for="img_one" class="custom-file-lable">Choose Package Images <span class="infomsg">(You should choose 500 x 500 jpg,jpeg,png,gif image for best attraction)</span></label><br>
                              <input type="file" class="custom-file-input" placeholder="" name="img_one" value="{{old('img_one')}}">
                          </div>
                        
                        
                          <div class="form-group">
                              <input type="file" class="custom-file-input" placeholder="" name="img_two" value="{{old('img_two')}}">
                          </div>
                        
                        
                          <div class="form-group">
                              <input type="file" class="custom-file-input" placeholder="" name="img_three" value="{{old('img_three')}}">
                          </div>
                        
                        
                          <div class="form-group">
                              <input type="file" class="custom-file-input" placeholder="" name="img_four" value="{{old('img_four')}}">
                          </div>
                      
                          <br>
                          
                          <input type="hidden" name="email" value="{{$trip->email}}">
                          
                          <input type="hidden" name="latitude" id="latitude" value="{{$trip->latitude}}">
                          <input type="hidden" name="longitude" id="longitude" value="{{$trip->longitude}}">
                    
                          <input type="hidden" name="contact" value="{{$trip->contact}}">
                     
                          
                          <input type="hidden" name="fname" value="{{$trip->fname}}">
                          
                          
                          <input type="hidden" name="lname" value="{{$trip->lname}}">

                          <input type="hidden" name="id" value="{{$trip->id}}">


                        
  
                          <div>
                          <h6>Select Starting Point</h6>
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
                        <button class="btn btn-block btn-primary" type="submit">Edit Tour</button>
                        <button type="submit" name="discard" value="discard" class="btn btn-secondary">Cancel</button>
                    </div>
                  </form>
              </div>
            </div>
          </div>
          </div>
</body>
</html>