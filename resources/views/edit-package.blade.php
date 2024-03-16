<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit-Package</title>
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

    <div class="container pacbox">
    <div class="col-sm-8 editform">
                <h4>Edit Your Package Details</h4>
                <br>
                <div class="border border-2 rounded-3 border border-2 packageform">
           
                <form action="{{route('update.package')}}" method="post" enctype="multipart/form-data">
                     @if(Session::has('success'))
                      <div id="error-card" class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div id="error-card" class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <input type="hidden" name="id" value="{{$package->id}}">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Package Title" name="title" value="{{$package->title}}">
                        <span class="text-danger">@error('title') {{$message}} @enderror</span>
                    </div><br>
        
                    <div class="form-group">
                        <textarea class="form-control" name="introduction" placeholder="Enter Package Details">{{$package->introduction}}</textarea>
                        <span class="text-danger">@error('introduction') {{$message}} @enderror</span>
                    </div><br>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Package Price" name="price" value="{{$package->price}}">
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
                      <h5>Your Package Images</h5>
                      <div class="row">
                        <div class="col-md-3">
                        <label for="img_one" class="custom-file-lable"><b>Image One</b></label><br>
                        <img class="edit-img img-fluid" src="{{asset($package->img_one)}}" alt="">
                        </div>

                        <div class="col-md-3">
                        <label for="img_one" class="custom-file-lable"><b>Image Two</b></label><br>
                        <img class="edit-img img-fluid" src="{{asset($package->img_two)}}" alt="">
                        </div>

                        <div class="col-md-3">
                        <label for="img_one" class="custom-file-lable"><b>Image Three</b></label><br>
                        <img class="edit-img img-fluid" src="{{asset($package->img_three)}}" alt="">
                        </div>

                        <div class="col-md">
                        <label for="img_one" class="custom-file-lable"><b>Image Four</b></label><br>
                        <img class="edit-img img-fluid" src="{{asset($package->img_four)}}" alt="">
                        </div>
                      </div>
                    </div><br>

                    <div class="packageformdiv"><label for="img_one" class="custom-file-lable"><h6>Edit Package Images</h6></label></div>

                    <div class="packageformdiv">
                      <div class="form-group">
                      <label for="img_one" class="custom-file-lable"><b>Edit image one</b></label><br>
                          <input type="file" class="custom-file-input" placeholder="" name="img_one" value="{{ old('img_one') }}">
                      </div>
                    
                    
                      <div class="form-group">
                      <label for="img_two" class="custom-file-lable"><b>Edit image two</b></label><br>
                          <input type="file" class="custom-file-input" placeholder="Image two" name="img_two" value="{{$package->img_two}}">
                      </div>
                    
                    
                      <div class="form-group">
                      <label for="img_three" class="custom-file-lable"><b>Edit image three</b></label><br>
                          <input type="file" class="custom-file-input" placeholder="" name="img_three" value="{{$package->img_three}}">
                      </div>
                    
                    
                      <div class="form-group">
                      <label for="img_four" class="custom-file-lable"><b>Edit image four</b></label><br>
  
                          <input type="file" class="custom-file-input" placeholder="" name="img_four" value="{{$package->img_four}}">
                      </div>
                    </div><br>
                      

                        <input type="hidden" name="email" value="{{$package->email}}"> <br>
        
                    <div class="row pac">
                      <div class="col-sm-2 updatebtn">
                        <button class="btn btn-block btn-primary" type="submit">Update</button>
                      </div>
                      <div class="col-sm-2">
                      <button type="submit" name="discard" value="discard" class="btn btn-secondary">Cancel</button>
                      </div>
                    </div>
                </form>
            </div>
          </div>
    </div>
    
</body>
</html>