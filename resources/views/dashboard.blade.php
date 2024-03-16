<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
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


        
        @foreach($businesses as $business)
          <div class="container contprof">
            <div class="row">
              <img class="img-fluid" src="{{asset($business->cover_img)}}" alt="cover image">
            </div>
          </div>
          <div class="container dashtitle">
            <div class="row">
              <div class="col-md-11">
                <h1>Welcome to the {{$business->title}}</h1>
                <hr>
                <p style="white-space: pre-wrap;" class="introtext">{{$business->introduction}}</p>
                <hr>
                <h6>Address : {{$business->address}} | Email : <a href="{{$business->email}}">{{$business->email}}</a> | Call Us : {{$business->contact}}</h6>
                <hr>
              </div>
              <div class="col-md-1">
                
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 businessmap" id="map" style="height: 50vh;"></div>
                <script>
                  var marker;
                  function initMap() {
                      var myLatLng = {lat: {{$business->latitude}}, lng: {{$business->longitude}}};

                      var map = new google.maps.Map(document.getElementById('map'), {
                          zoom: 9,
                          center: myLatLng
                      });

                      marker = new google.maps.Marker({
                        position: myLatLng,
                        map: map
                      });
                  }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
              <div class="col-sm">
                <h4>Add Your Packages Here</h4>
                <br>
                <div class="border border-2 rounded-3 border border-2 packageform">
           
                <form action="{{route('save.package')}}" method="post" enctype="multipart/form-data">
                     @if(Session::has('success'))
                      <div id="error-card" class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div id="error-card" class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Package Title" name="title" value="{{old('title')}}">
                        <span class="text-danger">@error('title') {{$message}} @enderror</span>
                    </div><br>
        
                    <div class="form-group">
                        <textarea class="form-control" name="introduction" placeholder="Enter Package Details" value="{{old('introduction')}}"></textarea>
                        <span class="text-danger">@error('introduction') {{$message}} @enderror</span>
                    </div><br>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Package Price" name="price" value="{{old('price')}}">
                            <span class="text-danger">@error('price') {{$message}} @enderror</span>
                        </div>
                      </div>
                      <div class="col-sm packageformdiv">
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
                      
                        <div class="packageformdiv">

                          <div class="form-group packageformdiv">
                              <label for="img_one" class="custom-file-lable">Choose Package Images </label><br>
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
                        </div><br>
                    
                       

                        <input type="hidden" name="email" value="{{$business->email}}">
        
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Add Package</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
        </div><br>
        
        <div class="row pacbox">
          <div class="container pacdivtitle">
            <h3>My Packages</h3>
          </div>
          <div class="container-fluid pacdiv">
              @foreach($packages as $package)
                <div class="container packageform2">  
                  <div class="row">
                    <div class="col-md-3">
                      <img class="pacim img-fluid" src="{{asset($package->img_one)}}" alt="image">
                    </div>
                    <div class="col-md-3">
                      <img class="pacim img-fluid" src="{{asset($package->img_two)}}" alt="image">
                    </div>
                    <div class="col-md-3">
                      <img class="pacim img-fluid" src="{{asset($package->img_three)}}" alt="image">
                    </div>
                    <div class="col-md">
                      <img class="pacim img-fluid" src="{{asset($package->img_four)}}" alt="image">
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <h3>{{$package->title}}</h3>
                    <hr>
                    <p style="white-space: pre-wrap;">{{$package->introduction}}</p>
                    <br>
                    <h5>Package Price: {{$package->currency}} {{$package->price}}</h5>
                  </div>  <br>
                  <div class="row pac">
                      <div class="col-sm-2 packbtn">
                        <a href="/edit-package/{{$package->id}}" class="btn btn-block btn-primary" type="submit">Edit Package</a>
                      </div>
                      <div class="col-sm-2">
                        <a href="/delete-package/{{$package->id}}" class="btn btn-block btn-primary" type="submit">Delete Package</a>
                      </div>
                    </div>
                </div>
              
              @endforeach
              </div>
            </div>
        @endforeach

        
    

    
</body>
</html>