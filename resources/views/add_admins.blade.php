<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title> Admin Registration</title>
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
  <body>
    <!--navigation bar-->  

        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-2 overflow-auto bg-dark" style="height:100vh;">
              <div class="row"><a class="navbar-brand" href="/"><img class="img-fluid" style="height:50px" src="{{ asset('images/Logo.png') }}" alt="logo"></a></div><br><br>
              <div class="row"><a href="admin_panel" class="nav-link">Admin Dashboard</a></div>
              <div class="row"><a href="pendingaccounts" class="nav-link">Pending Accounts</a></div>
              <div class="row"><a href="activeaccounts" class="nav-link">Active Accounts</a></div>
              <div class="row"><a class="nav-link" href="suspendeduser">Suspended User</a></div>
              <div class="row"><a href="business" class="nav-link">Pending Business Account</a></div>
              <div class="row"><a href="activebusiness" class="nav-link">Active Businesses</a></div>
              <div class="row"><a class="nav-link" href="add_admins">Create a admin</a></div>
              <div class="row"><a href="adminaccounts" class="nav-link">Admin Accounts</a></div>
              <div class="row"><a class="nav-link" href="suspendedadmin">Suspend Admins</a></div>
              <div class="row"><a class="nav-link" href="adminlogout">Logout</a></div>
            </div>
            <div class="col-sm overflow-auto" style="height:100vh;"> 
              <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                  <div class="row">
                      <div class="col col-md-offset-4 reg-form border border-primary rounded-2 border border-2 loginborder">
                          <h4>Admin Registration</h4>
                          <hr><br>
                          <form action="{{route('add.admin')}}" method="post">
                            @if(Session::has('success'))
                            <div id="error-card" class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('fail'))
                            <div id="error-card" class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                              @csrf
                              <div>
                                <input type="hidden" name="status" value="active">
                              </div>
                              <div class="form-group">
                                  <label for="first_name">First Name</label>
                                  <input type="text" class="form-control" placeholder="Enter First Name" name="first_name" value="{{old('first_name')}}">
                                  <span class="text-danger">@error('first_name') {{$message}} @enderror</span>
                              </div><br>
        
                              <div class="form-group">
                                  <label for="name">Last Name</label>
                                  <input type="text" class="form-control" placeholder="Enter Last Name" name="name" value="{{old('name')}}">
                                  <span class="text-danger">@error('name') {{$message}} @enderror</span>
                              </div><br>
        
                              <div class="form-group">
                                  <label for="ID_no">ID Number</label>
                                  <input type="text" class="form-control" placeholder="Enter ID Number" name="ID_no" value="{{old('ID_no')}}">
                                  <span class="text-danger">@error('ID_no') {{$message}} @enderror</span>
                              </div><br>
        
                              <div class="form-group">
                                  <label for="address">Address</label>
                                  <input type="text" class="form-control" placeholder="Enter Address" name="address" value="{{old('address')}}">
                                  <span class="text-danger">@error('address') {{$message}} @enderror</span>
                              </div><br>
        
                              <div class="form-group">
                                  <label for="contact">Contact Number</label>
                                  <input type="text" class="form-control" placeholder="Enter Contact Number" name="contact" value="{{old('contact')}}">
                                  <span class="text-danger">@error('contact') {{$message}} @enderror</span>
                              </div><br>
    
                              <div class="form-group">
                                  <label for="email">Email </label>
                                  <input type="text" class="form-control" placeholder="Enter  Email" name="email" value="{{old('email')}}">
                                  <span class="text-danger">@error('email') {{$message}} @enderror</span>
                              </div><br>
        
                              <div class="form-group">
                                  <label for="password">Password </label>
                                  <input type="password" class="form-control" placeholder="Enter Password" name="password" value="{{old('password')}}">
                                  <span class="text-danger">@error('password') {{$message}} @enderror</span>
                              </div>
                              <br><br>
        
                              <div class="form-group">
                                  <button class="btn btn-block btn-primary" type="submit">Create</button>
                              </div>
                              <br>
                          </form>
                      </div>
                  </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
            </div>
          </div>
    </div>
      
  </body>
</html>