document.onload = getLocation();
var x = document.getElementById("geoError");

function getLocation(){
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {

var restL = 28.531 //This is Restaurant Latitude
var restO = -81.729 //This is Restaurant Longitude

var posL = position.coords.latitude.toFixed(3); //This is user latitude reduced
var posO = position.coords.longitude.toFixed(3); //User longitude reduced

if (posL == restL && posO == restO) {
	alert("This will send arrival notice to restaurant");
    }
    
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      x.innerHTML = "User denied the request for Geolocation."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML = "Location information is unavailable."
      break;
    case error.TIMEOUT:
      x.innerHTML = "The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML = "An unknown error occurred."
      break;
  }
}
