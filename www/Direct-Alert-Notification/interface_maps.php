

<!DOCTYPE html>

<html>

  <head>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">

    <meta charset="utf-8">

    <title>Travel modes in directions</title>

    <style>

      html, body {

        height: 100%;

        margin: 0;

        padding: 0;

      }

      #map {

        height: 100%;

      }

#floating-panel {

  position: absolute;

  top: 10px;

  left: 25%;

  z-index: 5;

  background-color: #fff;

  padding: 5px;

  border: 1px solid #999;

  text-align: center;

  font-family: 'Roboto','sans-serif';

  line-height: 30px;

  padding-left: 10px;

}



    </style>

  </head>

  <body>

    <div id="floating-panel">

	    <input type="text" id="address1" />

	    <input type="text" id="address2" />

	    <input type="button" value="valider" onclick="codeAddress();">

    </div>

    <div id="map"></div>



    <script>

    var map;

    var directionsDisplay;

    var directionsService;



function tracerTrajet(address1, address2)

{

      //map = new google.maps.Map(document.getElementById('map'), {

      //zoom: 14,

      //center: {lat: address1.geometry.location.lat(), lng: address1.geometry.location.lng()}

    //});

    //directionsDisplay.setMap(map);

    //map.setCenter(adresse);

    addressFirst = true



     calculateAndDisplayRoute(address1, address2, "DRIVING");

     //document.getElementById('mode').addEventListener('change', function() {

     //  calculateAndDisplayRoute(map, address);

     //});



     calculateAndDisplayRoute(address1, address2, "WALKING");

     //document.getElementById('mode').addEventListener('change', function() {

     //  calculateAndDisplayRoute(map, address);

     //});



     calculateAndDisplayRoute(address1, address2, "BICYCLING");

     //document.getElementById('mode').addEventListener('change', function() {

     // calculateAndDisplayRoute(map, address);

     //});



     calculateAndDisplayRoute(address1, address2, "TRANSIT");

     //document.getElementById('mode').addEventListener('change', function() {

     //  calculateAndDisplayRoute(map, address);

     //});



  



}



function initMap() {

  directionsDisplay = new google.maps.DirectionsRenderer;

  directionsService = new google.maps.DirectionsService;

  map = new google.maps.Map(document.getElementById('map'), {

    zoom: 14,

    center: {lat: 37.77, lng: -122.447}

  });

  directionsDisplay.setMap(map);



}



function calculateAndDisplayRoute(address1, address2, mode) {

  directionsService.route({

    origin: {lat: address1.geometry.location.lat(), lng: address1.geometry.location.lng()},  // Haight.

    destination: {lat: address2.geometry.location.lat(), lng: address2.geometry.location.lng()},  // Ocean Beach.

    // Note that Javascript allows us to access the constant

    // using square brackets and a string value as its

    // "property."

    travelMode: google.maps.TravelMode[mode]

  }, function(response, status) {

    if (status == google.maps.DirectionsStatus.OK) {

      //directionsDisplay.setDirections(response);

      var duration = response.routes[0].legs[0].duration.value / 3600;

      var durationBis = duration.toString();

      durationBis = durationBis.split('.');

      durationBis[1] = (parseInt(durationBis[1])*60).toString();

      durationBis[1] = durationBis[1].slice(0,2);

      console.log(mode);

      console.log(durationBis[0] + " h " + (durationBis[1] + " min"));

    } else {

      window.alert('Directions request failed due to ' + status);

    }

  });

}



  /* Fonction de géocodage déclenchée en cliquant surle bouton "Geocoder"  */

  function codeAddress() {

    var addr1;

    var addr2;

    geocoder = new google.maps.Geocoder();

   /* Récupération de la valeur de l'adresse saisie */

   var address1 = document.getElementById("address1").value;

   var address2 = document.getElementById("address2").value;

   /* Appel au service de geocodage avec l'adresse en paramètre */

   geocoder.geocode( { 'address': address1}, function(results, status) {

    /* Si l'adresse a pu être géolocalisée */

    if (status == google.maps.GeocoderStatus.OK) {

      addr1 = results[0];

      }



    });



   geocoder.geocode( { 'address': address2}, function(results, status) {

    /* Si l'adresse a pu être géolocalisée */

    if (status == google.maps.GeocoderStatus.OK) {

      addr2 = results[0];

      tracerTrajet(addr1, addr2);

      }



    });



   

  }



    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJtETD3Dk2jfmNrWcCw0evJRvaRxUihK8&signed_in=true&callback=initMap"

        async defer></script>

  </body>

</html>