<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Registration</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
      <script type="text/javascript" src="{{asset('js/javascript.js') }}"></script>
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
  <body class="regimg">
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
                            <a class="nav-link" href="aboutus">About Us</a>
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


        <div class="container" style="margin-top:30px;">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="row">
                  <div class="col col-md-offset-4 reg-form border rounded-2 border border-2 loginborder">
                      <h4>Business User Registration</h4>
                      <hr><br>
                      <form action="{{route('register-user')}}" method="post">
                          @if(Session::has('fail'))
                          <div id="error-card" class="alert alert-danger">{{Session::get('fail')}}</div>
                          @endif
                          @csrf
                          <div>
                            <input type="hidden" name="status" value="pending">
                          </div>
                          <div>
                            <input type="hidden" name="usertype" value="business">
                          </div>
                          <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter First Name" name="first_name" value="{{old('first_name')}}">
                                <span class="text-danger">@error('first_name') {{$message}} @enderror</span>
                            </div><br>
      
                            <div class="col-md form-group">
                                <label for="name">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter Last Name" name="name" value="{{old('name')}}">
                                <span class="text-danger">@error('name') {{$message}} @enderror</span>
                            </div><br>
                          </div><br>
                          <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="ID_no">ID Number</label>
                                <input type="text" class="form-control" placeholder="Enter ID Number" name="ID_no" value="{{old('ID_no')}}">
                                <span class="text-danger">@error('ID_no') {{$message}} @enderror</span>
                            </div><br>
  
                            <div class="col-md form-group">
                                <label for="contact">Contact Number</label>
                                <input type="text" class="form-control" placeholder="Enter Contact Number" name="contact" value="{{old('contact')}}">
                                <span class="text-danger">@error('contact') {{$message}} @enderror</span>
                            </div><br>
                          </div><br>
    
                          <div class="form-group">
                              <label for="address">Address</label>
                              <input type="text" class="form-control" placeholder="Enter Address" name="address" value="{{old('address')}}">
                              <span class="text-danger">@error('address') {{$message}} @enderror</span>
                          </div><br>

                          <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="email">Business Email <span class="infomsg">(This is your login email)</span></label>
                                <input type="text" class="form-control" placeholder="Enter Your Business Email" name="email" value="{{old('email')}}">
                                <span class="text-danger">@error('email') {{$message}} @enderror</span>
                            </div><br>
      
                            <div class="col-md form-group">
                                <label for="password">Password <span class="infomsg">(This your login password)</span></label>
                                <input type="password" class="form-control" placeholder="Enter Password" name="password" value="{{old('password')}}">
                                <span class="text-danger">@error('password') {{$message}} @enderror</span>
                            </div>
                            <br>
                          </div><br>
    
                          <div class="form-group">
                              <button class="btn btn-block btn-primary" type="submit">Register</button>
                          </div>
                          <br>
                          <a href="login">If you are a registered user, please click to login</a>
                      </form>
                  </div>
              </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    
      
  </body>
</html>