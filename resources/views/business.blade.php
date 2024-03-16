<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Activated User Accounts</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    
      <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2 overflow-auto bg-dark" style="height:100vh;">
          <br>
          <div class="row"><a class="navbar-brand" href="/"><img class="img-fluid" style="height:50px" src="{{ asset('images/Logo.png') }}" alt="logo"></a></div><br><br>
          <div class="row"><a href="admin_panel" class="nav-link">Admin Dashboard</a></div>
          <div class="row"><a href="pendingaccounts" class="nav-link">Pending Accounts</a></div>
          <div class="row"><a href="activeaccounts" class="nav-link">Active Accounts</a></div>
          <div class="row"><a href="suspendeduser" class="nav-link">Suspended Account</a></div>
          <div class="row"><a href="business" class="nav-link">Pending Business Account</a></div>
          <div class="row"><a href="activebusiness" class="nav-link">Active Businesses</a></div>
          <div class="row"><a class="nav-link" href="add_admins">Create a admin</a></div>
          <div class="row"><a href="adminaccounts" class="nav-link">Admin Accounts</a></div>
          <div class="row"><a class="nav-link" href="suspendedadmin">Suspend Admins</a></div>
          <div class="row"><a class="nav-link" href="adminlogout">Logout</a></div>
        </div>
        <div class="col-sm overflow-auto" style="height:100vh;">
          <br>
          <h4>Pending Businesses</h4>
          <hr>
          @foreach($businesses as $business)
          @if($business->status=='pending')
          <div class="col col-md-offset-4 reg-form border rounded-2 border border-2 loginborder">
            <div  class=" ms-auto" id="status">{{$business->status}}</div>
            <br>
            <form action="{{route('active.business')}}" method="post">
              @csrf              
              <input type="hidden" name="id" value="{{$business->id}}">
              <div class="col-md">
                <label for="cover_img" class="custom-file-lable"><b>Cover Image</b></label><br>
                <img class="edit-img img-fluid" src="{{asset($business->cover_img)}}" alt="">
                </div><br>
              <div class="form-group">
                <label for="first_name">Business Type</label>
                <input readonly type="text" class="form-control" placeholder="" name="type" value="{{$business->type}}">
              </div>
              <br>
              <div class="form-group">
                <label for="first_name">Title</label>
                <input readonly type="text" class="form-control" placeholder="Enter First Name" name="title" value="{{$business->title}}">
              </div>
              <br>
              <div class="form-group">
                <label for="name">Introduction</label>
                <input readonly type="text" class="form-control" placeholder="Enter Last Name" name="introduction" value="{{$business->introduction}}">
                <span class="text-danger">@error('introduction') {{$message}} @enderror</span>
              </div>
              <br>        
              <div class="form-group">
                <label for="ID_no">Address</label>
                <input readonly type="text" class="form-control" placeholder="Enter ID Number" name="address" value="{{$business->address}}">
                <span class="text-danger">@error('address') {{$message}} @enderror</span>
              </div>
              <br>
              <div class="form-group">
                <label for="address">Contact No</label>
                <input readonly type="text" class="form-control" placeholder="Enter Address" name="contact" value="{{$business->contact}}">
                <span class="text-danger">@error('Contact') {{$message}} @enderror</span>
              </div>
              <br>
              <div class="form-group">
                <label for="contact">Email</label>
                <input readonly type="text" class="form-control" placeholder="Enter Contact Number" name="email" value="{{$business->email}}">
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
              </div>
              <br>
              <div class="form-group">
              <label for="contact">Business Registration No</label>
                <input readonly type="text" class="form-control" placeholder="Enter Your Business Email" name="registration_no" value="{{$business->registration_no}}">
                <span class="text-danger">@error('registration_no') {{$message}} @enderror</span>
              </div>
              <br>
              <div>
                <div class="col-md">
                  <input type="hidden" name="status" value="active">
                </div>
                <div>
                        <label for="location">Business Location</label><br>
                        <div id="map" style="height: 400px; width: 100%;"></div>

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
                    </div><br><br>
              </div>
              <br>
              <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">Active</button>
                <a href="/delete-business/{{$business->id}}" class="btn btn-block btn-primary" type="submit">Delete</a>
              </div>
            </form>
          </div>
          @endif
          @endforeach
        </div>
      </div>
    </div>
   
  </body>
</html>
