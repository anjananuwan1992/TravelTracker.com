//transparent nav bar turn into solid color when it scrolled..

const navEl = document.querySelector('.navbar');
window.addEventListener('scroll', ()=> {
    if (window.scrollY >= 56){
        navEl.classList.add('navbar-scrolled');
        navEl.classList.remove('bg-transparent');
    }
    else if (window.scrollY < 56) {
        navEl.classList.remove('navbar-scrolled');
        navEl.classList.add('bg-transparent');
    }  
});


const drop = document.querySelector('.dropdown-menu');
window.addEventListener('scroll', ()=> {
    if (window.scrollY >= 56){
        drop.classList.remove('dropdown-menu2');
        drop.classList.add('dropdown-menu3');
    }
    else if (window.scrollY < 56) {
        drop.classList.add('dropdown-menu2');
        drop.classList.remove('dropdown-menu3');
    }
});


//auto complete location box..

google.maps.event.addDomListener(window,'load', initialize);

function initialize(){
    var input = document.getElementById('autocomplete');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function(){
        var place = autocomplete.getPlace();
        if (!place.geometry || !place.geometry.location) {
            // If the selected place doesn't have coordinates, return
            return;
        }

         // Store the coordinates in the hidden input field
         document.getElementById('latitude').value = place.geometry.location.lat()
         document.getElementById('longitude').value = place.geometry.location.lng()
    });
}

// lodding map initially
window.addEventListener("load", function () {initMap();});









  
