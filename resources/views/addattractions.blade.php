<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Attractions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
    link rel="preconnect" href="https://fonts.googleapis.com">
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


 <div class="container">
    <div class="row">
       
            <div class="col-sm border rounded-2 border border-2 loginborder reg-form">
                <label ><h3>Enter Basic Details</h3></label>
                <hr>
           
                <form action="{{route('save.attractionloc')}}" method="post" enctype="multipart/form-data">

                @if(Session::has('success'))
                      <div id="error-card" class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div id="error-card" class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                     
                    @csrf
                    
                    <div class="form-group">
                    @foreach($data as $explorer)
                      <input type="hidden" class="form-control" name="email" value="{{$explorer->email}}">
                    @endforeach
                    </div>

                 
        
                    
        
                    <input type="hidden" id="type" name="type" value="Attractions">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="name">Attraction Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            <span class="text-danger">@error('name') {{$message}} @enderror</span>
                        </div><br>

                        <div class="col-md form-group">
                        <label for="address">City</label>
                        <input type="text" class="form-control" name="address" value="{{old('address')}}">
                        <span class="text-danger">@error('address') {{$message}} @enderror</span>
                    </div><br>
                    </div>
                    <br>
        
                    <div class="form-group">
                        <label for="introduction">Short Introduction<span class="infomsg"> (Using this short introducton, Visitors can get quick idea about the attraction)</span></label>
                        <textarea class="form-control" name="introduction" value="">{{old('introduction')}}</textarea>
                        <span class="text-danger">@error('introduction') {{$message}} @enderror</span>
                    </div><br>
        
                    
        
                    <div class="form-group">
                        
                        <input type="hidden" class="form-control" placeholder="Enter Business Contact Number" name="contact" value="Not Available">
                        <span class="text-danger">@error('contact') {{$message}} @enderror</span>
                    </div><br>
        
                    <div class="form-group">
                        
                        <input type="hidden" class="form-control" placeholder="Enter Business Registration Number" name="registration_no" value="Not Available">
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
                        <label for="location"><h4>Select Location of Attracion</h4></label><br>
                        <div id="map" style="height: 500px; width: 100%;"></div>

                            <script>
                                var map;
                                var latitudeInput = document.getElementById('latitude');
                                var longitudeInput = document.getElementById('longitude');
                                var marker;

                                function initMap() {
                                    map = new google.maps.Map(document.getElementById('map'), {
                                        center: { lat: 7.2906, lng: 80.6337 },
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
                        <button class="btn btn-block btn-primary" type="submit">Submit Basic Details</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
            
    </div>
  </div>

  


    <div class="container">
        <h3>My Attractions</h3>
        <hr>
                
        
        

            
            @foreach($businesses as $business)
            @foreach($attractions as $attraction)
            @if( $attraction->business_id == $business->id)
            <div class="col-md border rounded-2 border border-2 attractiondashview">
            
                <div class="row">
                    <div class="col-md-3">
                    <img class="edit-img img-fluid" src="{{asset($attraction->img_one)}}" alt="">
                    </div>
                    <div class="col-md-3">
                    <img class="edit-img img-fluid" src="{{asset($attraction->img_two)}}" alt="">
                    </div>
                    <div class="col-md-3">
                    <img class="edit-img img-fluid" src="{{asset($attraction->img_three)}}" alt="">
                    </div>
                    <div class="col-md-3">
                    <img class="edit-img img-fluid" src="{{asset($attraction->img_four)}}" alt="">
                    </div>
                </div>
    
                
                <br>
                <div class="row">
                    <h3>{{$business->title}}</h3><br><hr>
                    <h6 style="white-space: pre-wrap;"><i>{{$business->introduction}}</i></h6><br><br>
                    <p style="white-space: pre-wrap;" class=" aboutpara">{{$attraction->information}}</p>
                    
                    
                </div>
                <a href="/edit-location/{{$attraction->business_id}}" class="btn btn-block btn-primary" type="submit" style="margin-right:10px;">Edit Location Details</a><a href="/edit-infomation/{{$attraction->id}}" class="btn btn-block btn-primary" type="submit" style="margin-right:10px;">Edit Informations</a><a href="/delete-attraction/{{$business->id}}" class="btn btn-block btn-primary" type="submit">Delete</a>    
            </div><br>
            @endif
            @endforeach
            @endforeach   
                     
    </div>
    <br><br>
                
              
    
                
                
    </div>
        

</body>
</html>