<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Your Trip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

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
                  <a class="navbar-brand" href="/"><img class="img-fluid" style="height:50px" src="{{ asset('images/Logo.png') }}" alt="logo"></a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="tours">Tours</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="about">About Us</a>
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
    
    <!--Day Buckets-->
    <div class="container-fluid bg-dark bg-gradient plansash">
      <h1>Plan Your Trip</h1>
    </div>
    <div class="container-fluid ">
      <div class="row row-main">
        <div class="col-md-3 sec1 overflow-auto" style="height:79vh;" id="contentContainer" >
        <br>
        <div><h4>Main Bucket</h4></div>
          <div class="mainbucket overflow-auto" id="m-bucket">
            <div class="list" draggable="true"><input type="hidden" class="id" id="id1"> <input type="text" class="locationinput form-control" id="locationInput1" value="" readonly><input type="text" class="form-control latinput1 latinput" value=""><input type="text" class="form-control longinput1 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id2"> <input type="text" class="locationinput form-control" id="locationInput2" value="" readonly><input type="text" class="form-control latinput2 latinput" value=""><input type="text" class="form-control longinput2 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id3"> <input type="text" class="locationinput form-control" id="locationInput3" value="" readonly><input type="text" class="form-control latinput3 latinput" value=""><input type="text" class="form-control longinput3 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id4"> <input type="text" class="locationinput form-control" id="locationInput4" value="" readonly><input type="text" class="form-control latinput4 latinput" value=""><input type="text" class="form-control longinput4 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id5"> <input type="text" class="locationinput form-control" id="locationInput5" value="" readonly><input type="text" class="form-control latinput5 latinput" value=""><input type="text" class="form-control longinput5 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id6"> <input type="text" class="locationinput form-control" id="locationInput6" value="" readonly><input type="text" class="form-control latinput6 latinput" value=""><input type="text" class="form-control longinput6 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id7"> <input type="text" class="locationinput form-control" id="locationInput7" value="" readonly><input type="text" class="form-control latinput7 latinput" value=""><input type="text" class="form-control longinput7 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id8"> <input type="text" class="locationinput form-control" id="locationInput8" value="" readonly><input type="text" class="form-control latinput8 latinput" value=""><input type="text" class="form-control longinput8 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id9"> <input type="text" class="locationinput form-control" id="locationInput9" value="" readonly><input type="text" class="form-control latinput9 latinput" value=""><input type="text" class="form-control longinput9 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id10"> <input type="text" class="locationinput form-control" id="locationInput10" value="" readonly><input type="text" class="form-control latinput10 latinput" value=""><input type="text" class="form-control longinput10 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id11"> <input type="text" class="locationinput form-control" id="locationInput11" value="" readonly><input type="text" class="form-control latinput11 latinput" value=""><input type="text" class="form-control longinput11 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id12"> <input type="text" class="locationinput form-control" id="locationInput12" value="" readonly><input type="text" class="form-control latinput12 latinput" value=""><input type="text" class="form-control longinput12 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id13"> <input type="text" class="locationinput form-control" id="locationInput13" value="" readonly><input type="text" class="form-control latinput13 latinput" value=""><input type="text" class="form-control longinput13 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id14"> <input type="text" class="locationinput form-control" id="locationInput14" value="" readonly><input type="text" class="form-control latinput14 latinput" value=""><input type="text" class="form-control longinput14 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id15"> <input type="text" class="locationinput form-control" id="locationInput15" value="" readonly><input type="text" class="form-control latinput15 latinput" value=""><input type="text" class="form-control longinput15 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id16"> <input type="text" class="locationinput form-control" id="locationInput16" value="" readonly><input type="text" class="form-control latinput16 latinput" value=""><input type="text" class="form-control longinput16 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id17"> <input type="text" class="locationinput form-control" id="locationInput17" value="" readonly><input type="text" class="form-control latinput17 latinput" value=""><input type="text" class="form-control longinput17 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id18"> <input type="text" class="locationinput form-control" id="locationInput18" value="" readonly><input type="text" class="form-control latinput18 latinput" value=""><input type="text" class="form-control longinput18 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id19"> <input type="text" class="locationinput form-control" id="locationInput19" value="" readonly><input type="text" class="form-control latinput19 latinput" value=""><input type="text" class="form-control longinput19 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id20"> <input type="text" class="locationinput form-control" id="locationInput20" value="" readonly><input type="text" class="form-control latinput20 latinput" value=""><input type="text" class="form-control longinput20 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id21"> <input type="text" class="locationinput form-control" id="locationInput21" value="" readonly><input type="text" class="form-control latinput21 latinput" value=""><input type="text" class="form-control longinput21 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id22"> <input type="text" class="locationinput form-control" id="locationInput22" value="" readonly><input type="text" class="form-control latinput22 latinput" value=""><input type="text" class="form-control longinput22 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id23"> <input type="text" class="locationinput form-control" id="locationInput23" value="" readonly><input type="text" class="form-control latinput23 latinput" value=""><input type="text" class="form-control longinput23 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id24"> <input type="text" class="locationinput form-control" id="locationInput24" value="" readonly><input type="text" class="form-control latinput24 latinput" value=""><input type="text" class="form-control longinput24 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id25"> <input type="text" class="locationinput form-control" id="locationInput25" value="" readonly><input type="text" class="form-control latinput25 latinput" value=""><input type="text" class="form-control longinput25 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id26"> <input type="text" class="locationinput form-control" id="locationInput26" value="" readonly><input type="text" class="form-control latinput26 latinput" value=""><input type="text" class="form-control longinput26 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id27"> <input type="text" class="locationinput form-control" id="locationInput27" value="" readonly><input type="text" class="form-control latinput27 latinput" value=""><input type="text" class="form-control longinput27 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id28"> <input type="text" class="locationinput form-control" id="locationInput28" value="" readonly><input type="text" class="form-control latinput28 latinput" value=""><input type="text" class="form-control longinput28 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id29"> <input type="text" class="locationinput form-control" id="locationInput29" value="" readonly><input type="text" class="form-control latinput29 latinput" value=""><input type="text" class="form-control longinput29 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id30"> <input type="text" class="locationinput form-control" id="locationInput30" value="" readonly><input type="text" class="form-control latinput30 latinput" value=""><input type="text" class="form-control longinput30 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id31"> <input type="text" class="locationinput form-control" id="locationInput31" value="" readonly><input type="text" class="form-control latinput31 latinput" value=""><input type="text" class="form-control longinput31 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id32"> <input type="text" class="locationinput form-control" id="locationInput32" value="" readonly><input type="text" class="form-control latinput32 latinput" value=""><input type="text" class="form-control longinput32 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id33"> <input type="text" class="locationinput form-control" id="locationInput33" value="" readonly><input type="text" class="form-control latinput33 latinput" value=""><input type="text" class="form-control longinput33 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id34"> <input type="text" class="locationinput form-control" id="locationInput34" value="" readonly><input type="text" class="form-control latinput34 latinput" value=""><input type="text" class="form-control longinput34 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id35"> <input type="text" class="locationinput form-control" id="locationInput35" value="" readonly><input type="text" class="form-control latinput35 latinput" value=""><input type="text" class="form-control longinput35 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id36"> <input type="text" class="locationinput form-control" id="locationInput36" value="" readonly><input type="text" class="form-control latinput36 latinput" value=""><input type="text" class="form-control longinput36 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id37"> <input type="text" class="locationinput form-control" id="locationInput37" value="" readonly><input type="text" class="form-control latinput37 latinput" value=""><input type="text" class="form-control longinput37 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id38"> <input type="text" class="locationinput form-control" id="locationInput38" value="" readonly><input type="text" class="form-control latinput38 latinput" value=""><input type="text" class="form-control longinput38 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id39"> <input type="text" class="locationinput form-control" id="locationInput39" value="" readonly><input type="text" class="form-control latinput39 latinput" value=""><input type="text" class="form-control longinput39 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id40"> <input type="text" class="locationinput form-control" id="locationInput40" value="" readonly><input type="text" class="form-control latinput40 latinput" value=""><input type="text" class="form-control longinput40 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id41"> <input type="text" class="locationinput form-control" id="locationInput41" value="" readonly><input type="text" class="form-control latinput41 latinput" value=""><input type="text" class="form-control longinput41 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id42"> <input type="text" class="locationinput form-control" id="locationInput42" value="" readonly><input type="text" class="form-control latinput42 latinput" value=""><input type="text" class="form-control longinput42 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id43"> <input type="text" class="locationinput form-control" id="locationInput43" value="" readonly><input type="text" class="form-control latinput43 latinput" value=""><input type="text" class="form-control longinput43 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id44"> <input type="text" class="locationinput form-control" id="locationInput44" value="" readonly><input type="text" class="form-control latinput44 latinput" value=""><input type="text" class="form-control longinput44 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id45"> <input type="text" class="locationinput form-control" id="locationInput45" value="" readonly><input type="text" class="form-control latinput45 latinput" value=""><input type="text" class="form-control longinput45 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id46"> <input type="text" class="locationinput form-control" id="locationInput46" value="" readonly><input type="text" class="form-control latinput46 latinput" value=""><input type="text" class="form-control longinput46 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id47"> <input type="text" class="locationinput form-control" id="locationInput47" value="" readonly><input type="text" class="form-control latinput47 latinput" value=""><input type="text" class="form-control longinput47 longinput" value=""></div> 
            <div class="list" draggable="true"><input type="hidden" class="id" id="id48"> <input type="text" class="locationinput form-control" id="locationInput48" value="" readonly><input type="text" class="form-control latinput48 latinput" value=""><input type="text" class="form-control longinput48 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id49"> <input type="text" class="locationinput form-control" id="locationInput49" value="" readonly><input type="text" class="form-control latinput49 latinput" value=""><input type="text" class="form-control longinput49 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id50"> <input type="text" class="locationinput form-control" id="locationInput50" value="" readonly><input type="text" class="form-control latinput50 latinput" value=""><input type="text" class="form-control longinput50 longinput" value=""></div>
            <div class="list" draggable="true"><input type="hidden" class="id" id="id51"> <input type="text" class="locationinput form-control" id="locationInput51" value="" readonly><input type="text" class="form-control latinput51 latinput" value=""><input type="text" class="form-control longinput51 longinput" value=""></div> 
              
          </div>
          <h5 id="day01" style="display: none;">Day01</h5>
          <div class="mainbucket overflow-auto" id="divbox" style="display: none;"></div>
          
          <h5 id="day02" style="display: none;">Day02</h5>
          <div class="mainbucket overflow-auto" id="divbox2" style="display: none;"></div>
          
          <h5 id="day03" style="display: none;">Day03</h5>
          <div class="mainbucket overflow-auto" id="divbox3" style="display: none;"></div>
          
          <h5 id="day04" style="display: none;">Day04</h5>
          <div class="mainbucket overflow-auto" id="divbox4" style="display: none;"></div>
          
          <h5 id="day05" style="display: none;">Day05</h5>
          <div class="mainbucket overflow-auto" id="divbox5" style="display: none;"></div>
          
          <p>Click this button after selecting places view your day plans</p>
          <div id="viewbtn" style="display: none;"><button class="btn btn-success" id="view">View Your Plans</button></div>
        </div>
            <script>
              
                      document.addEventListener("DOMContentLoaded", function() {
                          var amount = {{$amount ?? 0}};
                          var contentContainer = document.getElementById("contentContainer");

                            if (amount >= 1) {
                              document.getElementById("divbox").style.display = "block";
                              document.getElementById("day01").style.display = "block";
                              document.getElementById("viewbtn").style.display = "block";

                          } 
                            if (amount >= 2) {
                              document.getElementById("divbox2").style.display = "block";
                              document.getElementById("day02").style.display = "block";
                          } 
                            if (amount >= 3) {
                              document.getElementById("divbox3").style.display = "block";
                              document.getElementById("day03").style.display = "block";
                          } 

                            if (amount >= 4) {
                              document.getElementById("divbox4").style.display = "block";
                              document.getElementById("day04").style.display = "block";
                          } 
                            if (amount == 5) {
                              document.getElementById("divbox5").style.display = "block";
                              document.getElementById("day05").style.display = "block";
                          } 
                          
                            var viewButton = document.getElementById("view");

                            if (viewButton) {
                                viewButton.addEventListener("click", function () {
                                  var url = "/view-plan?";
                                  url += "A=" + encodeURIComponent(A) + "&A1=" + encodeURIComponent(A1) +  "&A2=" + encodeURIComponent(A2);
                                  url += "&B=" + encodeURIComponent(B) + "&B1=" + encodeURIComponent(B1) +  "&B2=" + encodeURIComponent(B2);
                                  url += "&C=" + encodeURIComponent(C) + "&C1=" + encodeURIComponent(C1) +  "&C2=" + encodeURIComponent(C2);
                                  url += "&D=" + encodeURIComponent(D) + "&D1=" + encodeURIComponent(D1) +  "&D2=" + encodeURIComponent(D2);
                                  url += "&E=" + encodeURIComponent(E) + "&E1=" + encodeURIComponent(E1) +  "&E2=" + encodeURIComponent(E2);
                                  url += "&F=" + encodeURIComponent(F) + "&F1=" + encodeURIComponent(F1) +  "&F2=" + encodeURIComponent(F2);
                                  url += "&G=" + encodeURIComponent(G) + "&G1=" + encodeURIComponent(G1) +  "&G2=" + encodeURIComponent(G2);
                                  url += "&H=" + encodeURIComponent(H) + "&H1=" + encodeURIComponent(H1) +  "&H2=" + encodeURIComponent(H2);
                                  url += "&I=" + encodeURIComponent(I) + "&I1=" + encodeURIComponent(I1) +  "&I2=" + encodeURIComponent(I2);
                                  url += "&J=" + encodeURIComponent(J) + "&J1=" + encodeURIComponent(J1) +  "&J2=" + encodeURIComponent(J2);
                                  url += "&K=" + encodeURIComponent(K) + "&K1=" + encodeURIComponent(K1) +  "&K2=" + encodeURIComponent(K2);
                                  url += "&L=" + encodeURIComponent(L) + "&L1=" + encodeURIComponent(L1) +  "&L2=" + encodeURIComponent(L2);
                                  url += "&M=" + encodeURIComponent(M) + "&M1=" + encodeURIComponent(M1) +  "&M2=" + encodeURIComponent(M2);
                                  url += "&N=" + encodeURIComponent(N) + "&N1=" + encodeURIComponent(N1) +  "&N2=" + encodeURIComponent(N2);
                                  url += "&O=" + encodeURIComponent(O) + "&O1=" + encodeURIComponent(O1) +  "&O2=" + encodeURIComponent(O2);
                                  url += "&P=" + encodeURIComponent(P) + "&P1=" + encodeURIComponent(P1) +  "&P2=" + encodeURIComponent(P2);
                                  url += "&Q=" + encodeURIComponent(Q) + "&Q1=" + encodeURIComponent(Q1) +  "&Q2=" + encodeURIComponent(Q2);
                                  url += "&R=" + encodeURIComponent(R) + "&R1=" + encodeURIComponent(R1) +  "&R2=" + encodeURIComponent(R2);
                                  url += "&S=" + encodeURIComponent(S) + "&S1=" + encodeURIComponent(S1) +  "&S2=" + encodeURIComponent(S2);
                                  url += "&T=" + encodeURIComponent(T) + "&T1=" + encodeURIComponent(T1) +  "&T2=" + encodeURIComponent(T2);
                                  url += "&U=" + encodeURIComponent(U) + "&U1=" + encodeURIComponent(U1) +  "&U2=" + encodeURIComponent(U2);
                                  url += "&V=" + encodeURIComponent(V) + "&V1=" + encodeURIComponent(V1) +  "&V2=" + encodeURIComponent(V2);
                                  url += "&W=" + encodeURIComponent(W) + "&W1=" + encodeURIComponent(W1) +  "&W2=" + encodeURIComponent(W2);
                                  url += "&X=" + encodeURIComponent(X) + "&X1=" + encodeURIComponent(X1) +  "&X2=" + encodeURIComponent(X2);
                                  url += "&Y=" + encodeURIComponent(Y) + "&Y1=" + encodeURIComponent(Y1) +  "&Y2=" + encodeURIComponent(Y2);
                                  url += "&Z=" + encodeURIComponent(Z) + "&Z1=" + encodeURIComponent(Z1) +  "&Z2=" + encodeURIComponent(Z2);
                                  url += "&a=" + encodeURIComponent(a) + "&a1=" + encodeURIComponent(a1) +  "&a2=" + encodeURIComponent(a2);
                                  url += "&b=" + encodeURIComponent(b) + "&b1=" + encodeURIComponent(b1) +  "&b2=" + encodeURIComponent(b2);
                                  url += "&c=" + encodeURIComponent(c) + "&c1=" + encodeURIComponent(c1) +  "&c2=" + encodeURIComponent(c2);
                                  url += "&d=" + encodeURIComponent(d) + "&d1=" + encodeURIComponent(d1) +  "&d2=" + encodeURIComponent(d2);
                                  url += "&z=" + encodeURIComponent(z) + "&z1=" + encodeURIComponent(z1) +  "&z2=" + encodeURIComponent(z2);
                                  url += "&f=" + encodeURIComponent(f) + "&f1=" + encodeURIComponent(f1) +  "&f2=" + encodeURIComponent(f2);
                                  url += "&g=" + encodeURIComponent(g) + "&g1=" + encodeURIComponent(g1) +  "&g2=" + encodeURIComponent(g2);
                                  url += "&h=" + encodeURIComponent(h) + "&h1=" + encodeURIComponent(h1) +  "&h2=" + encodeURIComponent(h2);
                                  url += "&j=" + encodeURIComponent(j) + "&j1=" + encodeURIComponent(j1) +  "&j2=" + encodeURIComponent(j2);
                                  url += "&k=" + encodeURIComponent(k) + "&k1=" + encodeURIComponent(k1) +  "&k2=" + encodeURIComponent(k2);
                                  url += "&l=" + encodeURIComponent(l) + "&l1=" + encodeURIComponent(l1) +  "&l2=" + encodeURIComponent(l2);
                                  url += "&m=" + encodeURIComponent(m) + "&m1=" + encodeURIComponent(m1) +  "&m2=" + encodeURIComponent(m2);
                                  url += "&n=" + encodeURIComponent(n) + "&n1=" + encodeURIComponent(n1) +  "&n2=" + encodeURIComponent(n2);
                                  url += "&o=" + encodeURIComponent(o) + "&o1=" + encodeURIComponent(o1) +  "&o2=" + encodeURIComponent(o2);
                                  url += "&p=" + encodeURIComponent(p) + "&p1=" + encodeURIComponent(p1) +  "&p2=" + encodeURIComponent(p2);
                                  url += "&q=" + encodeURIComponent(q) + "&q1=" + encodeURIComponent(q1) +  "&r2=" + encodeURIComponent(q2);
                                  url += "&r=" + encodeURIComponent(r) + "&r1=" + encodeURIComponent(r1) +  "&r2=" + encodeURIComponent(r2);
                                  url += "&s=" + encodeURIComponent(s) + "&s1=" + encodeURIComponent(s1) +  "&s2=" + encodeURIComponent(s2);
                                  url += "&t=" + encodeURIComponent(t) + "&t1=" + encodeURIComponent(t1) +  "&t2=" + encodeURIComponent(t2);
                                  url += "&u=" + encodeURIComponent(u) + "&u1=" + encodeURIComponent(u1) +  "&u2=" + encodeURIComponent(u2);
                                  url += "&v=" + encodeURIComponent(v) + "&v1=" + encodeURIComponent(v1) +  "&v2=" + encodeURIComponent(v2);
                                  url += "&w=" + encodeURIComponent(w) + "&w1=" + encodeURIComponent(w1) +  "&w2=" + encodeURIComponent(w2);
                                  url += "&x=" + encodeURIComponent(x) + "&x1=" + encodeURIComponent(x1) +  "&x2=" + encodeURIComponent(x2);
                                  url += "&y=" + encodeURIComponent(y) + "&y1=" + encodeURIComponent(y1) +  "&y2=" + encodeURIComponent(y2);
                                  // Add more parameters for C, C1, D, D1, etc.

                                  window.open(url, '_blank');
                                });
                            }

                  });

                  let lists = document.getElementsByClassName("list");
                  let divbox = document.getElementById("divbox");
                  let divbox2 = document.getElementById("divbox2");
                  let divbox3 = document.getElementById("divbox3");
                  let divbox4 = document.getElementById("divbox4");
                  let divbox5 = document.getElementById("divbox5");
                  let mbucket = document.getElementById("m-bucket");

                  let A, B, C, D, E, F, G, H, I, J, K, L, M, N, O, P, Q, R, S, T, U, V, W, X, Y, Z, 
                  A1,B1,C1,D1,E1,F1,G1,H1,I1,J1,K1, L1, M1, N1, O1, P1, Q1, R1, S1, T1, U1, V1, W1, X1, Y1, Z1,
                  a,b,c,d,z,f,g,h,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,
                  a1,b1,c1,d1,z1,f1,g1,h1,j1,k1,l1,m1,n1,o1,p1,q1,r1,s1,t1,u1,v1,w1,x1,y1,
                  A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, K2, L2, M2, N2, O2, P2, Q2, R2, S2, T2, U2, V2, W2, X2, Y2, Z2,
                  a2,b2,c2,d2,z2,f2,g2,h2,j2,k2,l2,m2,n2,o2,p2,q2,r2,s2,t2,u2,v2,w2,x2,y2;




                      
                      let childElements = divbox.children;
                      let childElements2 = divbox2.children;
                      let childElements3 = divbox3.children;
                      let childElements4 = divbox4.children;
                      let childElements5 = divbox5.children;

                  for (let list of lists) {
                    list.addEventListener("dragstart", function (e) {
                      let selected = e.target;

                      divbox.addEventListener("dragover", function (e) {
                        e.preventDefault();
                      });

                      

                      divbox.addEventListener("drop", function (e) {
                        // Update index and values after removing an item
                        //let childElements = divbox.children;
                        e.preventDefault();
                        divbox.appendChild(selected);

                        for (let i = 0; i < childElements.length; i++) {
                          let inputValue = childElements[i].querySelector(".latinput").value;
                          let longValue = childElements[i].querySelector(".longinput").value;
                          let idvalue = childElements[i].querySelector(".id").value;
                          


                          switch (i) {
                            case 0:
                              A = inputValue;
                              A1 = longValue;
                              A2 = idvalue;
                              break;
                            case 1:
                              B = inputValue;
                              B1 = longValue;
                              B2 = idvalue;
                              break;
                            case 2:
                              C = inputValue;
                              C1 = longValue;
                              C2 = idvalue;
                              break;
                            case 3:
                              D = inputValue;
                              D1 = longValue;
                              D2 = idvalue;
                              break;
                            case 4:
                              E = inputValue;
                              E1 = longValue;
                              E2 = idvalue;
                              break;
                            case 5:
                              F = inputValue;
                              F1 = longValue;
                              F2 = idvalue;
                              break;
                            case 6:
                              G = inputValue;
                              G1 = longValue;
                              G2 = idvalue;
                              break;
                            case 7:
                              H = inputValue;
                              H1 = longValue;
                              H2 = idvalue;
                              break;
                            case 8:
                              I = inputValue;
                              I1 = longValue;
                              I2 = idvalue;
                              break;
                            case 9:
                              J = inputValue;
                              J1 = longValue;
                              J2 = idvalue;
                              break;
                          }
                        } 

                            if(childElements2.length===1){
                              L=L1=M=M1=N=N1=O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=L2=M2=N2=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===2){
                               M=M1=N=N1=O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=M2=N2=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===3){
                               N=N1=O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=N2=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===4){
                               O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===5){
                               P=P1=Q=Q1=R=R1=S=S1=T=T1=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===6){
                               Q=Q1=R=R1=S=S1=T=T1=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===7){
                               R=R1=S=S1=T=T1=R2=S2=T2= undefined;
                            }else if (childElements2.length===8){
                               S=S1=T=T1=S2=T2= undefined;
                            }else if (childElements2.length===9){
                               T=T1=T2= undefined;
                            }

                            if(childElements3.length===1){
                              V=V1=W=W1=X=X1=Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=V2=W2=X2=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===2){
                              W=W1=X=X1=Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=W2=X2=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===3){
                              X=X1=Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=X2=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===4){
                              Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===5){
                              Z=Z1=a=a1=b=b1=c=c1=d=d1=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===6){
                              a=a1=b=b1=c=c1=d=d1=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===7){
                              b=b1=c=c1=d=d1=b2=c2=d2= undefined;
                            }else if (childElements3.length===8){
                              c=c1=d=d1=c2=d2= undefined;
                            }else if (childElements3.length===9){
                              d=d1=d2= undefined;
                            }

                           if(childElements4.length===1){
                              f=f1=g=g1=h=h1=j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=f2=g2=h2=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===2){
                              g=g1=h=h1=j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=g2=h2=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===3){
                              h=h1=j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=h2=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===4){
                              j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===5){
                              k=k1=l=l1=m=m1=n=n1=o=o1=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===6){
                              l=l1=m=m1=n=n1=o=o1=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===7){
                              m=m1=n=n1=o=o1=m2=n2=o2= undefined;
                            }else if (childElements4.length===8){
                              n=n1=o=o1=n2=o2= undefined;
                            }else if (childElements4.length===9){
                              o=o1=o2= undefined;
                            }

                            if(childElements5.length===1){
                              q=q1=r=r1=s=s1=t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=q2=r2=s2=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===2){
                              r=r1=s=s1=t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=r2=s2=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===3){
                              s=s1=t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=s2=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===4){
                              t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===5){
                              u=u1=v=v1=w=w1=x=x1=y=y1=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===6){
                              v=v1=w=w1=x=x1=y=y1=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===7){
                              w=w1=x=x1=y=y1=w2=x2=y2= undefined;
                            }else if (childElements5.length===8){
                              x=x1=y=y1=x2=y2=undefined;
                            }else if (childElements5.length===9){
                              y=y1=y2= undefined;
                            }

                            // Display values in the console
                            console.log("A: " + A);
                            console.log("B: " + B);
                            console.log("C: " + C);
                            console.log("D: " + D);
                            console.log("E: " + E);
                            console.log("F: " + F);
                            console.log("G: " + G);
                            console.log("H: " + H);
                            console.log("I: " + I);
                            console.log("J: " + J);
                            console.log("A1: " + A1);
                            console.log("B1: " + B1);
                            console.log("C1: " + C1);
                            console.log("D1: " + D1);
                            console.log("E1: " + E1);
                            console.log("F1: " + F1);
                            console.log("G1: " + G1);
                            console.log("H1: " + H1);
                            console.log("I1: " + I1);
                            console.log("J1: " + J1);
                            console.log("count: " + childElements.length);
                            selected = null;



                      });

                      

                      divbox2.addEventListener("dragover", function (e) {
                        e.preventDefault();
                      });

                      

                      

                      divbox2.addEventListener("drop", function (e) {
                        // Update index and values after removing an item
                        e.preventDefault();
                        divbox2.appendChild(selected);

                        for (let i = 0; i < childElements2.length; i++) {
                          let inputValue2 = childElements2[i].querySelector(".latinput").value;
                          let longValue2 = childElements2[i].querySelector(".longinput").value;
                          let idvalue2 = childElements2[i].querySelector(".id").value;

                          switch (i) {
                            case 0:
                            K = inputValue2;
                            K1 = longValue2;
                            K2 = idvalue2;
                            
                              break;
                            case 1:
                              L = inputValue2;
                              L1 = longValue2;
                              L2 = idvalue2;
                              break;
                            case 2:
                              M = inputValue2;
                              M1 = longValue2;
                              M2 = idvalue2;
                              break;
                            case 3:
                              N = inputValue2;
                              N1 = longValue2;
                              N2 = idvalue2;
                              break;
                            case 4:
                              O = inputValue2;
                              O1 = longValue2;
                              O2 = idvalue2;
                              break;
                            case 5:
                              P = inputValue2;
                              P1 = longValue2;
                              P2 = idvalue2;
                              break;
                            case 6:
                              Q = inputValue2;
                              Q1 = longValue2;
                              Q2 = idvalue2;
                              break;
                            case 7:
                              R = inputValue2;
                              R1 = longValue2;
                              R2 = idvalue2;
                              break;
                            case 8:
                              S = inputValue2;
                              S1 = longValue2;
                              S2 = idvalue2;
                              break;
                            case 9:
                              T = inputValue2;
                              T1 = longValue2;
                              T2 = idvalue2;
                              break;
                          }

                           

                        }

                        if(childElements.length===1){
                              B=B1=C=C1=D=D1=E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=B2=C2=D2=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===2){
                              C=C1=D=D1=E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=C2=D2=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===3){
                              D=D1=E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=D2=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===4){
                              E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===5){
                              F=F1=G=G1=H=H1=I=I1=J=J1=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===6){
                              G=G1=H=H1=I=I1=J=J1=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===7){
                              H=H1=I=I1=J=J1=H2=I2=J2= undefined;
                            }else if (childElements.length===8){
                              I=I1=J=J1=I2=J2= undefined;
                            }else if (childElements.length===9){
                              J=J1=J2= undefined;
                            }

                         if(childElements3.length===1){
                              V=V1=W=W1=X=X1=Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=V2=W2=X2=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===2){
                              W=W1=X=X1=Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=W2=X2=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===3){
                              X=X1=Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=X2=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===4){
                              Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===5){
                              Z=Z1=a=a1=b=b1=c=c1=d=d1=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===6){
                              a=a1=b=b1=c=c1=d=d1=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===7){
                              b=b1=c=c1=d=d1=b2=c2=d2= undefined;
                            }else if (childElements3.length===8){
                              c=c1=d=d1=c2=d2= undefined;
                            }else if (childElements3.length===9){
                              d=d1=d2= undefined;
                            }

                           if(childElements4.length===1){
                              f=f1=g=g1=h=h1=j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=f2=g2=h2=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===2){
                              g=g1=h=h1=j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=g2=h2=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===3){
                              h=h1=j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=h2=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===4){
                              j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===5){
                              k=k1=l=l1=m=m1=n=n1=o=o1=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===6){
                              l=l1=m=m1=n=n1=o=o1=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===7){
                              m=m1=n=n1=o=o1=m2=n2=o2= undefined;
                            }else if (childElements4.length===8){
                              n=n1=o=o1=n2=o2= undefined;
                            }else if (childElements4.length===9){
                              o=o1=o2= undefined;
                            }

                            if(childElements5.length===1){
                              q=q1=r=r1=s=s1=t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=q2=r2=s2=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===2){
                              r=r1=s=s1=t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=r2=s2=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===3){
                              s=s1=t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=s2=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===4){
                              t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===5){
                              u=u1=v=v1=w=w1=x=x1=y=y1=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===6){
                              v=v1=w=w1=x=x1=y=y1=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===7){
                              w=w1=x=x1=y=y1=w2=x2=y2= undefined;
                            }else if (childElements5.length===8){
                              x=x1=y=y1=x2=y2=undefined;
                            }else if (childElements5.length===9){
                              y=y1=y2= undefined;
                            }

                            // Display values in the console
                            console.log("K: " + K);
                            console.log("L: " + L);
                            console.log("M: " + M);
                            console.log("N: " + N);
                            console.log("O: " + O);
                            console.log("P: " + P);
                            console.log("Q: " + Q);
                            console.log("R: " + R);
                            console.log("S: " + S);
                            console.log("T: " + T);
                            console.log("K1: " + K1);
                            console.log("L1: " + L1);
                            console.log("M1: " + M1);
                            console.log("N1: " + N1);
                            console.log("O1: " + O1);
                            console.log("P1: " + P1);
                            console.log("Q1: " + Q1);
                            console.log("R1: " + R1);
                            console.log("S1: " + S1);
                            console.log("T1: " + T1);
                            console.log("count: " + childElements2.length);
                            selected = null;
                      });

                      divbox3.addEventListener("dragover", function (e) {
                        e.preventDefault();
                      });

                      

                      divbox3.addEventListener("drop", function (e) {
                        // Update index and values after removing an item
                        e.preventDefault();
                        divbox3.appendChild(selected);

                        for (let i = 0; i < childElements3.length; i++) {
                          let inputValue3 = childElements3[i].querySelector(".latinput").value;
                          let longValue3 = childElements3[i].querySelector(".longinput").value;
                          let idvalue3 = childElements3[i].querySelector(".id").value;

                          switch (i) {
                        case 0:  
                          U = inputValue3;
                          U1 = longValue3;
                          U2 = idvalue3;
                          break;
                        case 1:
                          V = inputValue3;
                          V1 = longValue3;
                          V2 = idvalue3;
                          break;
                        case 2:
                          W = inputValue3;
                          W1 = longValue3;
                          W2 = idvalue3;
                          break;
                        case 3:
                          X = inputValue3;
                          X1 = longValue3;
                          X2 = idvalue3;
                          break;
                        case 4:
                          Y = inputValue3;
                          Y1 = longValue3;
                          Y2 = idvalue3;
                          break;
                        case 5:
                          Z = inputValue3;
                          Z1 = longValue3;
                          Z2 = idvalue3;
                          break;
                        case 6:
                          a = inputValue3;
                          a1 = longValue3;
                          a2 = idvalue3;
                          break;
                        case 7:
                          b = inputValue3;
                          b1 = longValue3;
                          b2 = idvalue3;
                          break;
                        case 8:
                          c = inputValue3;
                          c1 = longValue3;
                          c2 = idvalue3;
                          break;
                        case 9:
                          d = inputValue3;
                          d1 = longValue3;
                          d2 = idvalue3;
                          break;
                          }

                           // Display values in the console
                            

                        }

                        			if(childElements.length===1){
                              B=B1=C=C1=D=D1=E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=B2=C2=D2=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===2){
                              C=C1=D=D1=E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=C2=D2=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===3){
                              D=D1=E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=D2=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===4){
                              E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===5){
                              F=F1=G=G1=H=H1=I=I1=J=J1=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===6){
                              G=G1=H=H1=I=I1=J=J1=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===7){
                              H=H1=I=I1=J=J1=H2=I2=J2= undefined;
                            }else if (childElements.length===8){
                              I=I1=J=J1=I2=J2= undefined;
                            }else if (childElements.length===9){
                              J=J1=J2= undefined;
                            }

 			                      if(childElements2.length===1){
                              L=L1=M=M1=N=N1=O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=L2=M2=N2=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===2){
                               M=M1=N=N1=O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=M2=N2=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===3){
                               N=N1=O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=N2=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===4){
                               O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===5){
                               P=P1=Q=Q1=R=R1=S=S1=T=T1=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===6){
                               Q=Q1=R=R1=S=S1=T=T1=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===7){
                               R=R1=S=S1=T=T1=R2=S2=T2= undefined;
                            }else if (childElements2.length===8){
                               S=S1=T=T1=S2=T2= undefined;
                            }else if (childElements2.length===9){
                               T=T1=T2= undefined;
                            }

                            if(childElements4.length===1){
                              f=f1=g=g1=h=h1=j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=f2=g2=h2=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===2){
                              g=g1=h=h1=j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=g2=h2=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===3){
                              h=h1=j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=h2=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===4){
                              j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===5){
                              k=k1=l=l1=m=m1=n=n1=o=o1=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===6){
                              l=l1=m=m1=n=n1=o=o1=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===7){
                              m=m1=n=n1=o=o1=m2=n2=o2= undefined;
                            }else if (childElements4.length===8){
                              n=n1=o=o1=n2=o2= undefined;
                            }else if (childElements4.length===9){
                              o=o1=o2= undefined;
                            }

                            if(childElements5.length===1){
                              q=q1=r=r1=s=s1=t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=q2=r2=s2=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===2){
                              r=r1=s=s1=t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=r2=s2=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===3){
                              s=s1=t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=s2=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===4){
                              t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===5){
                              u=u1=v=v1=w=w1=x=x1=y=y1=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===6){
                              v=v1=w=w1=x=x1=y=y1=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===7){
                              w=w1=x=x1=y=y1=w2=x2=y2= undefined;
                            }else if (childElements5.length===8){
                              x=x1=y=y1=x2=y2=undefined;
                            }else if (childElements5.length===9){
                              y=y1=y2= undefined;
                            }

                            console.log("U: " + U);
                            console.log("V: " + V);
                            console.log("W: " + W);
                            console.log("X: " + X);
                            console.log("Y: " + Y);
                            console.log("Z: " + Z);
                            console.log("a: " + a);
                            console.log("b: " + b);
                            console.log("c: " + c);
                            console.log("d: " + d);
                            console.log("U1: " + U1);
                            console.log("V1: " + V1);
                            console.log("W1: " + W1);
                            console.log("X1: " + X1);
                            console.log("Y1: " + Y1);
                            console.log("Z1: " + Z1);
                            console.log("a1: " + a1);
                            console.log("b1: " + b1);
                            console.log("c1: " + c1);
                            console.log("d1: " + d1);
                            console.log("count: " + childElements3.length);
                            selected = null;

                      });

                      divbox4.addEventListener("dragover", function (e) {
                        e.preventDefault();
                      });

                      

                      divbox4.addEventListener("drop", function (e) {
                        // Update index and values after removing an item
                        e.preventDefault();
                        divbox4.appendChild(selected);

                        for (let i = 0; i < childElements4.length; i++) {
                          let inputValue4 = childElements4[i].querySelector(".latinput").value;
                          let longValue4 = childElements4[i].querySelector(".longinput").value;
                          let idvalue4 = childElements4[i].querySelector(".id").value;

                          switch (i) {
                            case 0:
                              z = inputValue4;
                              z1 = longValue4;
                              z2 = idvalue4;
                              break;
                            case 1:
                              f = inputValue4;
                              f1 = longValue4;
                              f2 = idvalue4;
                              break;
                            case 2:
                              g = inputValue4;
                              g1 = longValue4;
                              g2 = idvalue4;
                              break;
                            case 3:
                              h = inputValue4;
                              h1 = longValue4;
                              h2 = idvalue4;
                              break;
                            case 4:
                              j = inputValue4;
                              j1 = longValue4;
                              j2 = idvalue4;
                              break;
                            case 5:
                              k = inputValue4;
                              k1 = longValue4;
                              k2 = idvalue4;
                              break;
                            case 6:
                              l = inputValue4;
                              l1 = longValue4;
                              l2 = idvalue4;
                              break;
                            case 7:
                              m = inputValue4;
                              m1 = longValue4;
                              m2 = idvalue4;
                              break;
                            case 8:
                              n = inputValue4;
                              n1 = longValue4;
                              n2 = idvalue4;
                              break;
                            case 9:
                              o = inputValue4;
                              o1 = longValue4;
                              o2 = idvalue4;
                              break;
                          }

                           // Display values in the console
                            console.log("z: " + z);
                            console.log("f: " + f);
                            console.log("g: " + g);
                            console.log("h: " + h);
                            console.log("j: " + j);
                            console.log("k: " + k);
                            console.log("l: " + l);
                            console.log("m: " + m);
                            console.log("n: " + n);
                            console.log("o: " + o);
                            console.log("z1: " + z1);
                            console.log("f1: " + f1);
                            console.log("g1: " + g1);
                            console.log("h1: " + h1);
                            console.log("j1: " + j1);
                            console.log("k1: " + k1);
                            console.log("l1: " + l1);
                            console.log("m1: " + m1);
                            console.log("n1: " + n1);
                            console.log("o1: " + o1);
                            console.log("count: " + childElements4.length);
                            selected = null;

                        }

                        if(childElements.length===1){
                              B=B1=C=C1=D=D1=E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=B2=C2=D2=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===2){
                              C=C1=D=D1=E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=C2=D2=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===3){
                              D=D1=E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=D2=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===4){
                              E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===5){
                              F=F1=G=G1=H=H1=I=I1=J=J1=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===6){
                              G=G1=H=H1=I=I1=J=J1=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===7){
                              H=H1=I=I1=J=J1=H2=I2=J2= undefined;
                            }else if (childElements.length===8){
                              I=I1=J=J1=I2=J2= undefined;
                            }else if (childElements.length===9){
                              J=J1=J2= undefined;
                            }

 			                    if(childElements2.length===1){
                              L=L1=M=M1=N=N1=O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=L2=M2=N2=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===2){
                               M=M1=N=N1=O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=M2=N2=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===3){
                               N=N1=O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=N2=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===4){
                               O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===5){
                               P=P1=Q=Q1=R=R1=S=S1=T=T1=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===6){
                               Q=Q1=R=R1=S=S1=T=T1=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===7){
                               R=R1=S=S1=T=T1=R2=S2=T2= undefined;
                            }else if (childElements2.length===8){
                               S=S1=T=T1=S2=T2= undefined;
                            }else if (childElements2.length===9){
                               T=T1=T2= undefined;
                            }

                            if(childElements3.length===1){
                              V=V1=W=W1=X=X1=Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=V2=W2=X2=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===2){
                              W=W1=X=X1=Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=W2=X2=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===3){
                              X=X1=Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=X2=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===4){
                              Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===5){
                              Z=Z1=a=a1=b=b1=c=c1=d=d1=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===6){
                              a=a1=b=b1=c=c1=d=d1=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===7){
                              b=b1=c=c1=d=d1=b2=c2=d2= undefined;
                            }else if (childElements3.length===8){
                              c=c1=d=d1=c2=d2= undefined;
                            }else if (childElements3.length===9){
                              d=d1=d2= undefined;
                            }

                             if(childElements5.length===1){
                              q=q1=r=r1=s=s1=t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=q2=r2=s2=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===2){
                              r=r1=s=s1=t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=r2=s2=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===3){
                              s=s1=t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=s2=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===4){
                              t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===5){
                              u=u1=v=v1=w=w1=x=x1=y=y1=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===6){
                              v=v1=w=w1=x=x1=y=y1=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===7){
                              w=w1=x=x1=y=y1=w2=x2=y2= undefined;
                            }else if (childElements5.length===8){
                              x=x1=y=y1=x2=y2=undefined;
                            }else if (childElements5.length===9){
                              y=y1=y2= undefined;
                            }
                      });

                      divbox5.addEventListener("dragover", function (e) {
                        e.preventDefault();
                      });

                      

                      divbox5.addEventListener("drop", function (e) {
                        // Update index and values after removing an item
                        e.preventDefault();
                        divbox5.appendChild(selected);

                        for (let i = 0; i < childElements5.length; i++) {
                          let inputValue5 = childElements5[i].querySelector(".latinput").value;
                          let longValue5 = childElements5[i].querySelector(".longinput").value;
                          let idvalue5 = childElements5[i].querySelector(".id").value;

                          switch (i) {
                            case 0:
                              p = inputValue5;
                              p1 = longValue5;
                              p2 = idvalue5;
                              break;
                            case 1:
                              q = inputValue5;
                              q1 = longValue5;
                              q2 = idvalue5;
                              break;
                            case 2:
                              r = inputValue5;
                              r1 = longValue5;
                              r2 = idvalue5;
                              break;
                            case 3:
                              s = inputValue5;
                              s1 = longValue5;
                              s2 = idvalue5;
                              break;
                            case 4:
                              t = inputValue5;
                              t1 = longValue5;
                              t2 = idvalue5;
                              break;
                            case 5:
                              u = inputValue5;
                              u1 = longValue5;
                              u2 = idvalue5;
                              break;
                            case 6:
                              v = inputValue5;
                              v1 = longValue5;
                              v2 = idvalue5;
                              break;
                            case 7:
                              w = inputValue5;
                              w1 = longValue5;
                              w2 = idvalue5;
                              break;
                            case 8:
                              x = inputValue5;
                              x1 = longValue5;
                              x2 = idvalue5;
                              break;
                            case 9:
                              y = inputValue5;
                              y1 = longValue5;
                              y2 = idvalue5;
                              break;
                          }

                           

                        }

                        if(childElements.length===1){
                              B=B1=C=C1=D=D1=E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=B2=C2=D2=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===2){
                              C=C1=D=D1=E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=C2=D2=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===3){
                              D=D1=E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=D2=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===4){
                              E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===5){
                              F=F1=G=G1=H=H1=I=I1=J=J1=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===6){
                              G=G1=H=H1=I=I1=J=J1=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===7){
                              H=H1=I=I1=J=J1=H2=I2=J2= undefined;
                            }else if (childElements.length===8){
                              I=I1=J=J1=I2=J2= undefined;
                            }else if (childElements.length===9){
                              J=J1=J2= undefined;
                            }

 			                    if(childElements2.length===1){
                              L=L1=M=M1=N=N1=O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=L2=M2=N2=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===2){
                               M=M1=N=N1=O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=M2=N2=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===3){
                               N=N1=O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=N2=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===4){
                               O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===5){
                               P=P1=Q=Q1=R=R1=S=S1=T=T1=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===6){
                               Q=Q1=R=R1=S=S1=T=T1=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===7){
                               R=R1=S=S1=T=T1=R2=S2=T2= undefined;
                            }else if (childElements2.length===8){
                               S=S1=T=T1=S2=T2= undefined;
                            }else if (childElements2.length===9){
                               T=T1=T2= undefined;
                            }

                            if(childElements3.length===1){
                              V=V1=W=W1=X=X1=Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=V2=W2=X2=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===2){
                              W=W1=X=X1=Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=W2=X2=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===3){
                              X=X1=Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=X2=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===4){
                              Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===5){
                              Z=Z1=a=a1=b=b1=c=c1=d=d1=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===6){
                              a=a1=b=b1=c=c1=d=d1=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===7){
                              b=b1=c=c1=d=d1=b2=c2=d2= undefined;
                            }else if (childElements3.length===8){
                              c=c1=d=d1=c2=d2= undefined;
                            }else if (childElements3.length===9){
                              d=d1=d2= undefined;
                            }

                           if(childElements4.length===1){
                              f=f1=g=g1=h=h1=j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=f2=g2=h2=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===2){
                              g=g1=h=h1=j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=g2=h2=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===3){
                              h=h1=j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=h2=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===4){
                              j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===5){
                              k=k1=l=l1=m=m1=n=n1=o=o1=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===6){
                              l=l1=m=m1=n=n1=o=o1=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===7){
                              m=m1=n=n1=o=o1=m2=n2=o2= undefined;
                            }else if (childElements4.length===8){
                              n=n1=o=o1=n2=o2= undefined;
                            }else if (childElements4.length===9){
                              o=o1=o2= undefined;
                            }

                            // Display values in the console
                           console.log("p: " + p);
                            console.log("q: " + q);
                            console.log("r: " + r);
                            console.log("s: " + s);
                            console.log("t: " + t);
                            console.log("u: " + u);
                            console.log("v: " + v);
                            console.log("w: " + w);
                            console.log("x: " + x);
                            console.log("y: " + y);
                            console.log("p1: " + p1);
                            console.log("q1: " + q1);
                            console.log("r1: " + r1);
                            console.log("s1: " + s1);
                            console.log("t1: " + t1);
                            console.log("u1: " + u1);
                            console.log("v1: " + v1);
                            console.log("w1: " + w1);
                            console.log("x1: " + x1);
                            console.log("y1: " + y1);
                            console.log("count: " + childElements5.length);
                            selected = null;

                      });

                      


                      mbucket.addEventListener("dragover", function (e) {
                        e.preventDefault();
                      });

                      mbucket.addEventListener("drop", function (e) {
                              e.preventDefault();
                              mbucket.appendChild(selected);
                              mbucket.insertBefore(selected, mbucket.firstChild);

                              // Extract value from the input field and log it
                              //let inputValue = selected.querySelector("input").value;
                              //console.log("mbucket" + index + ": " + inputValue);

                              // Remove the corresponding value from variables
                              //console.log("count: " + childElements.length);

                              for (let i =0; i<childElements.length; i++) {
                                let inputValue = childElements[i].querySelector(".latinput").value;
                                let longValue = childElements[i].querySelector(".longinput").value;
                                let idvalue = childElements[i].querySelector(".id").value;

                                switch (i) {
                                  case 0:
                                    A = inputValue;
                                    A1 = longValue;
                                    A2 = idvalue;
                                    break;
                                  case 1:
                                    B = inputValue;
                                    B1 = longValue;
                                    B2 = idvalue;
                                    break;
                                  case 2:
                                    C = inputValue;
                                    C1 = longValue;
                                    C2 = idvalue;
                                    break;
                                  case 3:
                                    D = inputValue;
                                    D1 = longValue;
                                    D2 = idvalue;
                                    break;
                                  case 4:
                                    E = inputValue;
                                    E1 = longValue;
                                    E2 = idvalue;
                                    break;
                                  case 5:
                                    F = inputValue;
                                    F1 = longValue;
                                    F2 = idvalue;
                                    break;
                                  case 6:
                                    G = inputValue;
                                    G1 = longValue;
                                    G2 = idvalue;
                                    break;
                                  case 7:
                                    H = inputValue;
                                    H1 = longValue;
                                    H2 = idvalue;
                                    break;
                                  case 8:
                                    I = inputValue;
                                    I1 = longValue;
                                    I2 = idvalue;
                                    break;
                                  case 9:
                                    J = inputValue;
                                    J1 = longValue;
                                    J2 = idvalue;
                                    break;
                                }

                                

                              }

                              if(childElements.length===1){
                              B=B1=C=C1=D=D1=E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=B2=C2=D2=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===2){
                              C=C1=D=D1=E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=C2=D2=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===3){
                              D=D1=E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=D2=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===4){
                              E=E1=F=F1=G=G1=H=H1=I=I1=J=J1=E2=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===5){
                              F=F1=G=G1=H=H1=I=I1=J=J1=F2=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===6){
                              G=G1=H=H1=I=I1=J=J1=G2=H2=I2=J2= undefined;
                            }else if (childElements.length===7){
                              H=H1=I=I1=J=J1=H2=I2=J2= undefined;
                            }else if (childElements.length===8){
                              I=I1=J=J1=I2=J2= undefined;
                            }else if (childElements.length===9){
                              J=J1=J2= undefined;
                            }

                                // Display values in the console
                                  console.log("A: " + A);
                                  console.log("B: " + B);
                                  console.log("C: " + C);
                                  console.log("D: " + D);
                                  console.log("E: " + E);
                                  console.log("F: " + F);
                                  console.log("G: " + G);
                                  console.log("H: " + H);
                                  console.log("I: " + I);
                                  console.log("J: " + J);
                                  console.log("A1: " + A1);
                                  console.log("B1: " + B1);
                                  console.log("C1: " + C1);
                                  console.log("D1: " + D1);
                                  console.log("E1: " + E1);
                                  console.log("F1: " + F1);
                                  console.log("G1: " + G1);
                                  console.log("H1: " + H1);
                                  console.log("I1: " + I1);
                                  console.log("J1: " + J1);
                                  console.log("count: " + childElements.length);
                                  selected = null;

                              for (let i = 0; i < childElements2.length; i++) {
                                let inputValue2 = childElements2[i].querySelector(".latinput").value;
                                let longValue2 = childElements2[i].querySelector(".longinput").value;
                                let idvalue2 = childElements2[i].querySelector(".id").value;

                                switch (i) {
                                  case 0:
                                    K = inputValue2;
                                    K1 = longValue2;
                                    K2 = idvalue2;
                                    break;
                                  case 1:
                                    L = inputValue2;
                                    L1 = longValue2;
                                    L2 = idvalue2;
                                    break;
                                  case 2:
                                    M = inputValue2;
                                    M1 = longValue2;
                                    M2 = idvalue2;
                                    break;
                                  case 3:
                                    N = inputValue2;
                                    N1 = longValue2;
                                    N2 = idvalue2;
                                    break;
                                  case 4:
                                    O = inputValue2;
                                    O1 = longValue2;
                                    O2 = idvalue2;
                                    break;
                                  case 5:
                                    P = inputValue2;
                                    P1 = longValue2;
                                    P2 = idvalue2;
                                    break;
                                  case 6:
                                    Q = inputValue2;
                                    Q1 = longValue2;
                                    Q2 = idvalue2;
                                    break;
                                  case 7:
                                    R = inputValue2;
                                    R1 = longValue2;
                                    R2 = idvalue2;
                                    break;
                                  case 8:
                                    S = inputValue2;
                                    S1 = longValue2;
                                    S2 = idvalue2;
                                    break;
                                  case 9:
                                    T = inputValue2;
                                    T1 = longValue2;
                                    T2 = idvalue2;
                                    break;
                                }

                              }

                              if(childElements2.length===1){
                              L=L1=M=M1=N=N1=O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=L2=M2=N2=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===2){
                               M=M1=N=N1=O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=M2=N2=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===3){
                               N=N1=O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=N2=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===4){
                               O=O1=P=P1=Q=Q1=R=R1=S=S1=T=T1=O2=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===5){
                               P=P1=Q=Q1=R=R1=S=S1=T=T1=P2=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===6){
                               Q=Q1=R=R1=S=S1=T=T1=Q2=R2=S2=T2= undefined;
                            }else if (childElements2.length===7){
                               R=R1=S=S1=T=T1=R2=S2=T2= undefined;
                            }else if (childElements2.length===8){
                               S=S1=T=T1=S2=T2= undefined;
                            }else if (childElements2.length===9){
                               T=T1=T2= undefined;
                            }

                            // Display values in the console
                                  console.log("K: " + K);
                                  console.log("L: " + L);
                                  console.log("M: " + M);
                                  console.log("N: " + N);
                                  console.log("O: " + O);
                                  console.log("P: " + P);
                                  console.log("Q: " + Q);
                                  console.log("R: " + R);
                                  console.log("S: " + S);
                                  console.log("T: " + T);
                                  console.log("K1: " + K1);
                                  console.log("L1: " + L1);
                                  console.log("M1: " + M1);
                                  console.log("N1: " + N1);
                                  console.log("O1: " + O1);
                                  console.log("P1: " + P1);
                                  console.log("Q1: " + Q1);
                                  console.log("R1: " + R1);
                                  console.log("S1: " + S1);
                                  console.log("T1: " + T1);
                                  console.log("count: " + childElements2.length);
                                  selected = null;


                              for (let i = 0; i < childElements3.length; i++) {
                                let inputValue3 = childElements3[i].querySelector(".latinput").value;
                                let longValue3 = childElements3[i].querySelector(".longinput").value;
                                let idvalue3 = childElements3[i].querySelector(".id").value;

                                switch (i) {
                                  case 0:
                                    U = inputValue3;
                                    U1 = longValue3;
                                    U2 = idvalue3;
                                    break;
                                  case 1:
                                    V = inputValue3;
                                    V1 = longValue3;
                                    V2 = idvalue3;
                                    break;
                                  case 2:
                                    W = inputValue3;
                                    W1 = longValue3;
                                    W2 = idvalue3;
                                    break;
                                  case 3:
                                    X = inputValue3;
                                    X1 = longValue3;
                                    X2 = idvalue3;
                                    break;
                                  case 4:
                                    Y = inputValue3;
                                    Y1 = longValue3;
                                    Y2 = idvalue3;
                                    break;
                                  case 5:
                                    Z = inputValue3;
                                    Z1 = longValue3;
                                    Z2 = idvalue3;
                                    break;
                                  case 6:
                                    a = inputValue3;
                                    a1 = longValue3;
                                    a2 = idvalue3;
                                    break;
                                  case 7:
                                    b = inputValue3;
                                    b1 = longValue3;
                                    b2 = idvalue3;
                                    break;
                                  case 8:
                                    c = inputValue3;
                                    c1 = longValue3;
                                    c2 = idvalue3;
                                    break;
                                  case 9:
                                    d = inputValue3;
                                    d1 = longValue3;
                                    d2 = idvalue3;
                                    break;
                                }

                                
                              }

                            
                              if(childElements3.length===1){
                              V=V1=W=W1=X=X1=Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=V2=W2=X2=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===2){
                              W=W1=X=X1=Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=W2=X2=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===3){
                              X=X1=Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=X2=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===4){
                              Y=Y1=Z=Z1=a=a1=b=b1=c=c1=d=d1=Y2=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===5){
                              Z=Z1=a=a1=b=b1=c=c1=d=d1=Z2=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===6){
                              a=a1=b=b1=c=c1=d=d1=a2=b2=c2=d2= undefined;
                            }else if (childElements3.length===7){
                              b=b1=c=c1=d=d1=b2=c2=d2= undefined;
                            }else if (childElements3.length===8){
                              c=c1=d=d1=c2=d2= undefined;
                            }else if (childElements3.length===9){
                              d=d1=d2= undefined;
                            }

                            // Display values in the console
                                  console.log("U: " + U);
                                  console.log("V: " + V);
                                  console.log("W: " + W);
                                  console.log("X: " + X);
                                  console.log("Y: " + Y);
                                  console.log("Z: " + Z);
                                  console.log("a: " + a);
                                  console.log("b: " + b);
                                  console.log("c: " + c);
                                  console.log("d: " + d);
                                  console.log("U1: " + U1);
                                  console.log("V1: " + V1);
                                  console.log("W1: " + W1);
                                  console.log("X1: " + X1);
                                  console.log("Y1: " + Y1);
                                  console.log("Z1: " + Z1);
                                  console.log("a1: " + a1);
                                  console.log("b1: " + b1);
                                  console.log("c1: " + c1);
                                  console.log("d1: " + d1);
                                  console.log("count: " + childElements3.length);
                                  selected = null;



                              for (let i = 0; i < childElements4.length; i++) {
                                let inputValue4 = childElements4[i].querySelector(".latinput").value;
                                let longValue4 = childElements4[i].querySelector(".longinput").value;
                                let idvalue4 = childElements4[i].querySelector(".id").value;

                                switch (i) {
                                  case 0:
                                    z = inputValue4;
                                    z1 = longValue4;
                                    z2 = idvalue4;
                                    break;
                                  case 1:
                                    f = inputValue4;
                                    f1 = longValue4;
                                    f2 = idvalue4;
                                    break;
                                  case 2:
                                    g = inputValue4;
                                    g1 = longValue4;
                                    g2 = idvalue4;
                                    break;
                                  case 3:
                                    h = inputValue4;
                                    h1 = longValue4;
                                    h2 = idvalue4;
                                    break;
                                  case 4:
                                    j = inputValue4;
                                    j1 = longValue4;
                                    j2 = idvalue4;
                                    break;
                                  case 5:
                                    k = inputValue4;
                                    k1 = longValue4;
                                    k2 = idvalue4;
                                    break;
                                  case 6:
                                    l = inputValue4;
                                    l1 = longValue4;
                                    l2 = idvalue4;
                                    break;
                                  case 7:
                                    m = inputValue4;
                                    m1 = longValue4;
                                    m2 = idvalue4;
                                    break;
                                  case 8:
                                    n = inputValue4;
                                    n1 = longValue4;
                                    n2 = idvalue4;
                                    break;
                                  case 9:
                                    o = inputValue4;
                                    o1 = longValue4;
                                    o2 = idvalue4;
                                    break;
                                  }

                                

                              }

                              if(childElements4.length===1){
                              f=f1=g=g1=h=h1=j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=f2=g2=h2=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===2){
                              g=g1=h=h1=j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=g2=h2=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===3){
                              h=h1=j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=h2=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===4){
                              j=j1=k=k1=l=l1=m=m1=n=n1=o=o1=j2=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===5){
                              k=k1=l=l1=m=m1=n=n1=o=o1=k2=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===6){
                              l=l1=m=m1=n=n1=o=o1=l2=m2=n2=o2= undefined;
                            }else if (childElements4.length===7){
                              m=m1=n=n1=o=o1=m2=n2=o2= undefined;
                            }else if (childElements4.length===8){
                              n=n1=o=o1=n2=o2= undefined;
                            }else if (childElements4.length===9){
                              o=o1=o2= undefined;
                            }


                            // Display values in the console
                                  console.log("z: " + z);
                                  console.log("f: " + f);
                                  console.log("g: " + g);
                                  console.log("h: " + h);
                                  console.log("j: " + j);
                                  console.log("k: " + k);
                                  console.log("l: " + l);
                                  console.log("m: " + m);
                                  console.log("n: " + n);
                                  console.log("o: " + o);
                                  console.log("z1: " + z1);
                                  console.log("f1: " + f1);
                                  console.log("g1: " + g1);
                                  console.log("h1: " + h1);
                                  console.log("j1: " + j1);
                                  console.log("k1: " + k1);
                                  console.log("l1: " + l1);
                                  console.log("m1: " + m1);
                                  console.log("n1: " + n1);
                                  console.log("o1: " + o1);
                                  console.log("count: " + childElements4.length);
                                  selected = null;

                              for (let i = 0; i < childElements5.length; i++) {
                                let inputValue5 = childElements5[i].querySelector(".latinput").value;
                                let longValue5 = childElements5[i].querySelector(".longinput").value;
                                let idvalue5 = childElements5[i].querySelector(".id").value;

                                switch (i) {
                                  case 0:
                                    p = inputValue5;
                                    p1 = longValue5;
                                    p2 = idvalue5;
                                    break;
                                  case 1:
                                    q = inputValue5;
                                    q1 = longValue5;
                                    q2 = idvalue5;
                                    break;
                                  case 2:
                                    r = inputValue5;
                                    r1 = longValue5;
                                    r2 = idvalue5;
                                    break;
                                  case 3:
                                    s = inputValue5;
                                    s1 = longValue5;
                                    s2 = idvalue5;
                                    break;
                                  case 4:
                                    t = inputValue5;
                                    t1 = longValue5;
                                    t2 = idvalue5;
                                    break;
                                  case 5:
                                    u = inputValue5;
                                    u1 = longValue5;
                                    u2 = idvalue5;
                                    break;
                                  case 6:
                                    v = inputValue5;
                                    v1 = longValue5;
                                    v2 = idvalue5;
                                    break;
                                  case 7:
                                    w = inputValue5;
                                    w1 = longValue5;
                                    w2 = idvalue5;
                                    break;
                                  case 8:
                                    x = inputValue5;
                                    x1 = longValue5;
                                    x2 = idvalue5;
                                    break;
                                  case 9:
                                    y = inputValue5;
                                    y1 = longValue5;
                                    y2 = idvalue5;
                                    break;
                                }

                                

                              }

                              if(childElements5.length===1){
                              q=q1=r=r1=s=s1=t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=q2=r2=s2=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===2){
                              r=r1=s=s1=t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=r2=s2=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===3){
                              s=s1=t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=s2=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===4){
                              t=t1=u=u1=v=v1=w=w1=x=x1=y=y1=t2=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===5){
                              u=u1=v=v1=w=w1=x=x1=y=y1=u2=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===6){
                              v=v1=w=w1=x=x1=y=y1=v2=w2=x2=y2= undefined;
                            }else if (childElements5.length===7){
                              w=w1=x=x1=y=y1=w2=x2=y2= undefined;
                            }else if (childElements5.length===8){
                              x=x1=y=y1=x2=y2=undefined;
                            }else if (childElements5.length===9){
                              y=y1=y2= undefined;
                            }

                            // Display values in the console
                                  console.log("p: " + p);
                                  console.log("q: " + q);
                                  console.log("r: " + r);
                                  console.log("s: " + s);
                                  console.log("t: " + t);
                                  console.log("u: " + u);
                                  console.log("v: " + v);
                                  console.log("w: " + w);
                                  console.log("x: " + x);
                                  console.log("y: " + y);
                                  console.log("p1: " + p1);
                                  console.log("q1: " + q1);
                                  console.log("r1: " + r1);
                                  console.log("s1: " + s1);
                                  console.log("t1: " + t1);
                                  console.log("u1: " + u1);
                                  console.log("v1: " + v1);
                                  console.log("w1: " + w1);
                                  console.log("x1: " + x1);
                                  console.log("y1: " + y1);
                                  console.log("count: " + childElements5.length);
                                  selected = null;
                             
                          });
                      });                    

                  }

            </script>                                
        
          <!--Infor-Section-->
        <div class="col-md-3 sec2">
          <div class="row">
            <div class="col-md">
              <div class="bar attractionbar"><img class="img-fluid" src="{{ asset('images/attraction.PNG') }}" style="width:30px;" alt=""> Attraction</div>
            </div>
            <div class="col-md">
              <div class="bar hotelbar"><img class="img-fluid" src="{{ asset('images/Hotels.PNG') }}" style="width:30px;" alt=""> Hotels</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="bar foodbar"><img class="img-fluid" src="{{ asset('images/food and cafes.PNG') }}" style="width:30px;" alt=""> Food & Cafes</div>
            </div>
            <div class="col-md">
              <div class="bar shopbar"><img class="img-fluid" src="{{ asset('images/shops.PNG') }}" style="width:30px;" alt=""> Shops</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="bar rentbar"><img class="img-fluid" src="{{ asset('images/rental item.PNG') }}" style="width:30px;" alt=""> Rental Item</div>
            </div>
          </div>

          <div class="overflow-auto" style= "height:62vh;" id="location-info">
            <img class="img-fluid" id="cvrimg" src="" alt="">
            <br>
            <h4 id="bis-name" style="margin-top:10px;"></h4>
            <p style="white-space: pre-wrap;" id="bis-intro"></p>
            <div id="attraction-details" style="text-align:justify; padding:10px;"></div>
            <div id="buttonadd"></div>

            


            
          </div>
        
        </div>

      
            <!--map section-->

            
        
        <div class="col-md-6 sec3" id="map" style="height: 80vh;"></div>
        
            <script>
              var currentMarker = null;
              
              
              function initMap() {
                  var mycenter = {lat: 6.927079, lng: 79.861244}; //Colombo
                   

                  var map = new google.maps.Map(document.getElementById('map'), {
                      zoom: 9,
                      center: mycenter
                  });
                  @foreach($businesses as $business)
                  @if($business->status == 'active')
                  
                  
                  
                    var category = "{{ $business->type }}"
                    
                    var myLatLng_{{ $business->id }} = { lat: {{ $business->latitude }}, lng: {{ $business->longitude }} };
                    var iconUrl = ''; // Set the default icon URL
                      if (category === 'Attractions') {
                        iconUrl = '{{ asset('images/red.PNG') }}'; 
                      } else if (category === 'hotels') {
                        iconUrl = '{{ asset('images/blue.PNG') }}'; 
                      }
                      else if (category === 'foods-and-cafe') {
                        iconUrl = '{{ asset('images/pink.PNG') }}'; 
                      }
                      else if (category === 'rental-items') {
                        iconUrl = '{{ asset('images/purple.PNG') }}'; 
                      }
                      else if (category === 'shops') {
                        iconUrl = '{{ asset('images/yellow.PNG') }}'; 
                      }

                      var marker_{{ $business->id }} = new google.maps.Marker({
                        position: myLatLng_{{ $business->id }},
                        icon: iconUrl,
                        map: map
                      });
                    
                    

                    var markerCounter = 0;
                    var locationCounter = 1;

                    marker_{{$business->id}}.addListener('click', function(){
                      var businessName ="{{$business->title}}";
                      var businessintro = "{{$business->introduction}}";
                      var businessId = "{{$business->id}}";
                      var latvalue ="{{$business->latitude}}";
                      var longvalue ="{{$business->longitude}}";
                      
                      

                      markerCounter++;

                      var buttonId = 'addToMainBucketBtn_'+ markerCounter;

                      // Check if the button already exists, remove it if it does
                      var buttonContainer = document.getElementById('buttonadd');
    
                      // Clear the button container before adding a new button
                      buttonadd.innerHTML = '';

                      var button = document.createElement('button');
                        button.className = 'btn btn-primary';
                        button.idName = buttonId;
                        button.textContent = 'Add Location';
                        button.onclick = function() {
                          addlocation("{{$business->id}}","{{$business->title}}","{{$business->latitude}}","{{$business->longitude}}", locationCounter); // Assuming the first marker corresponds to the first input
                        };
                        buttonadd.appendChild(button);

                       

                      document.getElementById('bis-name').innerText = '';
                      document.getElementById('bis-intro').innerText = '';

                      document.getElementById('bis-name').innerText = businessName;
                      document.getElementById('bis-intro').innerText = businessintro;
                      var image = document.getElementById('cvrimg');
                      image.src = '{{asset($business->cover_img)}}'
                      currentMarker = marker_{{$business->id}};

                      var attractionDetails = document.getElementById('attraction-details');
                      attractionDetails.innerHTML = ''; // Clear previous package details

                      @foreach($attractions as $attraction)
                        @if($attraction->business_id == $business->id)
                            var attractionElement = document.createElement('div');
                            attractionElement.innerHTML = `
                            <div class="row">
                            <div class="col-sm-6">
                            <img src="{{asset($attraction->img_one)}}" class="img-fluid">
                            </div>
                            <div class="col-sm-6">
                            <img src="{{asset($attraction->img_two)}}" class="img-fluid">
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-6">
                            <img src="{{asset($attraction->img_three)}}" class="img-fluid">
                            </div>
                            <div class="col-sm-6">
                            <img src="{{asset($attraction->img_four)}}" class="img-fluid">
                            </div>
                            </div><br>
                            <p style="white-space: pre-wrap;">{{$attraction->information}}</p>
                                
                            `;
                            attractionDetails.appendChild(attractionElement);
                        @endif
                        @endforeach

                        @foreach($packages as $package)
                          @if($package->email == $business->email)
                              var attractionElement = document.createElement('div');
                              attractionElement.innerHTML = `
                                  
                                  <hr>
                                  <h4>{{$package->title}}</h4>
                                  <br>
                                  <div class="row">
                                  <div class="col-sm-6">
                                  <img src="{{asset($package->img_one)}}" class="img-fluid">
                                  </div>
                                  <div class="col-sm-6">
                                  <img src="{{asset($package->img_two)}}" class="img-fluid">
                                  </div>
                                  </div>
                                  <div class="row">
                                  <div class="col-sm-6">
                                  <img src="{{asset($package->img_three)}}" class="img-fluid">
                                  </div>
                                  <div class="col-sm-6">
                                  <img src="{{asset($package->img_four)}}" class="img-fluid">
                                  </div>
                                  </div><br>
                                  <p style="white-space: pre-wrap;">{{$package->introduction}}</p>
                                  <h6>{{$package->price}} {{$package->currency}}</h6>
                                  
                                  
                              `;
                              attractionDetails.appendChild(attractionElement);
                          @endif
                          @endforeach
                    

                      function addlocation(businessId, businessName, latvalue, longvalue, markerCounter) {
                        var locationInputId = 'locationInput' + locationCounter;
                        var latInputClass = 'latinput' + locationCounter;
                        var longInputClass = 'longinput' + locationCounter;
                        var idInputId = 'id' + locationCounter;
                      
                        var input = document.getElementById(locationInputId);
                        var latInput = document.querySelector('.' + latInputClass);
                        var longInput = document.querySelector('.' + longInputClass);
                        var idInput = document.getElementById(idInputId);


                        
                        if (idInput && input && latInput && longInput) {
                          input.value = businessName;
                          latInput.value = latvalue;
                          longInput.value = longvalue;
                          idInput.value = businessId;
                          locationCounter++;
                        }
                        
                      }

                    });

                   

                    
                  
                  
                  @endif 
                  @endforeach

                  google.maps.event.addListener(map, 'click', function(){
                  document.getElementById('bis-name').innerText = '';
                  document.getElementById('bis-intro').innerText = '';
                  currentMarker = null;
                  });
                 
              }

            
              
              
            </script>
            
            <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap"></script>
      </div>
      
    </div>

  

  </body>
</html>

