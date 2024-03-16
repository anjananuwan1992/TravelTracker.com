<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin Accounts</title>
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
          <div class="row" id="createadmin"><a class="nav-link" href="add_admins">Create a admin</a></div>
          <div class="row" id="adminaccounts"><a href="adminaccounts" class="nav-link">Admin Accounts</a></div>
          <div class="row"><a class="nav-link" href="suspendedadmin">Suspend Admins</a></div>
          <div class="row"><a class="nav-link" href="adminlogout">Logout</a></div>
        </div>
        <div class="col-sm overflow-auto" style="height:100vh;">
          <br>
          <h4>Admin Accounts</h4>
          <hr>
          @foreach($admins as $admin)
          @if($admin->status=='active')
          @if($admin->id > 1)
          <div class="col col-md-offset-4 reg-form border rounded-2 border border-2 loginborder">
            <div  class=" ms-auto" id="status">{{$admin->status}}</div>
            <br>
            <form action="{{route('suspend.admin')}}" method="post">
              @csrf              
              <input type="hidden" name="id" value="{{$admin->id}}">
              <div class="form-group">
                <label for="first_name">First Name</label>
                <input readonly type="text" class="form-control" placeholder="Enter First Name" name="first_name" value="{{$admin->first_name}}">
              </div>
              <br>
              <div class="form-group">
                <label for="name">Last Name</label>
                <input readonly type="text" class="form-control" placeholder="Enter Last Name" name="name" value="{{$admin->name}}">
                <span class="text-danger">@error('name') {{$message}} @enderror</span>
              </div>
              <br>        
              <div class="form-group">
                <label for="ID_no">ID Number</label>
                <input readonly type="text" class="form-control" placeholder="Enter ID Number" name="ID_no" value="{{$admin->ID_no}}">
                <span class="text-danger">@error('ID_no') {{$message}} @enderror</span>
              </div>
              <br>
              <div class="form-group">
                <label for="address">Address</label>
                <input readonly type="text" class="form-control" placeholder="Enter Address" name="address" value="{{$admin->address}}">
                <span class="text-danger">@error('address') {{$message}} @enderror</span>
              </div>
              <br>
              <div class="form-group">
                <label for="contact">Contact Number</label>
                <input readonly type="text" class="form-control" placeholder="Enter Contact Number" name="contact" value="{{$admin->contact}}">
                <span class="text-danger">@error('contact') {{$message}} @enderror</span>
              </div>
              <br>
              <div class="form-group">
                <input readonly type="text" class="form-control" placeholder="Enter Your Business Email" name="email" value="{{$admin->email}}">
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
              </div>
              <br>
              <div>
                <div class="col-sm">
                  <input type="hidden" name="status" value="suspend">
                </div>
                <input type="hidden" name="id" id="" value="{{$admin->id}}">
              </div>
              <br>
              <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">Suspend</button>
                <a href="/delete-admin/{{$admin->id}}" class="btn btn-block btn-primary" type="submit">Delete</a>
              </div>
            </form>
          </div>


          @endif
          @endif
          @endforeach
        </div>
      </div>
    </div>

  </body>
</html>
