<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Your Attractions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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


        <div class="container">

            <div class="row">
            
            <br>
            <div class="border border-2 rounded-3 border border-2 packageform3">
            <h3>Add Loaction Information</h3>
            <hr>
       
            <form action="{{ route('save.addAttraction')}}" method="post" enctype="multipart/form-data">
                 @if(Session::has('success'))
                  <div id="error-card" class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div id="error-card" class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                
                    <div class="form-group">
                        <textarea class="form-control" name="information" placeholder="Enter Package Details" value="">{{old('information')}}</textarea>
                        <span class="text-danger">@error('informatio') {{$message}} @enderror</span>
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
                
    
                    @if(isset($userEmail))
                    <div class="form-group">
                        
                        <input type="hidden" class="form-control" name="email" value="{{ $userEmail}}">
                    </div>
                    @endif
                    @if(isset($latestBusinessId))
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="businessId" value="{{ $latestBusinessId }}">
                    </div>
                    @endif
                    @if(isset($title))
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="title" value="{{ $title }}">
                    </div>
                    @endif
                    @if(isset($introduction))
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="introduction" value="{{ $introduction }}">
                    </div>
                    @endif
                    @if(isset($latitude))
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="latitude" value="{{ $latitude }}">
                    </div>
                    @endif
                    @if(isset($longitude))
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="longitude" value="{{ $longitude }}">
                    </div><br>
                    @endif
    
                <div class="form-group">
                    <button class="btn btn-block btn-primary" type="submit">Add Information</button>
                </div>
            </form>
        </div>
    </div>
        </div>

        
    

    
</body>
</html>