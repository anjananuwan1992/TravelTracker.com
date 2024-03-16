<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin Panel</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2 overflow-auto bg-dark" style="height:100vh;">
          <br>
          <a class="navbar-brand" href="/"><img class="img-fluid" style="height:50px" src="{{ asset('images/Logo.png') }}" alt="logo"></a><br><br>
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
        <div class="row">
        @if(Session::has('fail'))
          <div id="error-card" class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        </div>
          <div class="row">
            <div class="col-sm-6 rounded-2 border border-2 ">
              <div class="row">
                <div class="col-sm-6 rounded-2 border border-2 adminstatus" style="background-color: orange;">
                  <h6>Explorer Amount</h6>
                  <h3>{{$explorerCount}}</h3>
                </div>
                <div class="col-sm rounded-2 border border-2 adminstatus" style="background-color: blue;">
                  <h6>Registerd User Amount</h6>
                  <h3>{{ $usersCount }}</h3>
                </div>
              </div>
            </div>
            <div class="col-sm rounded-2 border border-2 ">
              <div class="row">
                <div class="col-sm-6 rounded-2 border border-2 adminstatus" style="background-color: red;">
                  <h6>Guiders Amount</h6>
                  <h3>{{$guiderCount}}</h3>
                </div>
                <div class="col-sm rounded-2 border border-2 adminstatus" style="background-color: green;">
                  <h6>Planned Tour Amount</h6>
                  <h3>{{$tourCount}}</h3>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-6 rounded-2 border border-2 ">
              <div class="row">
                <div class="col-sm-6 rounded-2 border border-2 adminstatus" style="background-color: brown;">
                  <h6>Attractions Amount</h6>
                  <h3>{{$attractionCount}}</h3>
                </div>
                <div class="col-sm rounded-2 border border-2 adminstatus" style="background-color: indigo;">
                  <h6>Hotels Amount</h6>
                  <h3>{{$hotelCount}}</h3>
                </div>
              </div>
            </div>
            <div class="col-sm rounded-2 border border-2 ">
              <div class="row">
                <div class="col-sm-6 rounded-2 border border-2 adminstatus" style="background-color: gold;">
                  <h6>Foods & Cafes Amount</h6>
                  <h3>{{$foodCount}}</h3>
                </div>
                <div class="col-sm rounded-2 border border-2 adminstatus" style="background-color: darkred;">
                  <h6>Rental Shops Amount</h6>
                  <h3>{{$rentalCount}}</h3>
                </div>
              </div>
            </div>
            </div>
            <br>
            <div class="row">
            <div class="col-sm-6 rounded-2 border border-2 ">
              <div class="row">
                <div class="col-sm-6 rounded-2 border border-2 adminstatus" style="background-color: #3c140a;">
                  <h6>Shop Amount</h6>
                  <h3>{{$shopCount}}</h3>
                </div>
                <div class="col-sm rounded-2 border border-2 adminstatus" style="background-color: #e50099;">
                  <h6>Pending User Amount</h6>
                  <h3>{{ $pendingusercount}}</h3>
                </div>
              </div>
            </div>
            <div class="col-sm rounded-2 border border-2 ">
              <div class="row">
                <div class="col-sm-6 rounded-2 border border-2 adminstatus" style="background-color: #566314;">
                  <h6>Pending Business Amount</h6>
                  <h3>{{$pendingbusinessCount}}</h3>
                </div>
                <div class="col-sm rounded-2 border border-2 adminstatus" style="background-color: #02277f;">
                  <h6>Registered Admin Amount</h6>
                  <h3>{{$adminCount}}</h3>
                </div>
              </div>
            </div>
          </div>
          <br>
            <div class="row">
            <canvas id="userChart" style="width:50px;"></canvas>
    <script>
        // Fetch data from your controller, assuming you've passed it as $userData
        var userData = {!! json_encode($userData) !!};
        
        // Prepare data for Chart.js
        var dates = userData.map(data => data.date);
        var userCounts = userData.map(data => data.user_count);

        // Render the chart
        var ctx = document.getElementById('userChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'User Registration Count',
                    data: userCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
          </div>
          <br>
          
        </div>
      </div>
    </div>
   
  </body>
</html>
