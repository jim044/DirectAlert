
document.write("<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAJtETD3Dk2jfmNrWcCw0evJRvaRxUihK8&callback=initMap'></script>");
document.write("<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>" );
    
    var map;
    var directionsDisplay;
    var directionsService;
    var addr1;
    var addr2;



function tracerTrajet(address1, address2)

{

    addressFirst = true
    calculateAndDisplayRoute(address1, address2, "DRIVING");
    calculateAndDisplayRoute(address1, address2, "WALKING");
    calculateAndDisplayRoute(address1, address2, "BICYCLING");
    calculateAndDisplayRoute(address1, address2, "TRANSIT");
}



function initMap() {

  directionsDisplay = new google.maps.DirectionsRenderer;
  directionsService = new google.maps.DirectionsService;

  // map = new google.maps.Map({

  //   zoom: 14,

  //   center: {lat: 37.77, lng: -122.447}

  // });

  // directionsDisplay.setMap(map);



}



function calculateAndDisplayRoute(address1, address2, mode) {

  directionsService.route({

    origin: {lat: address1.geometry.location.lat(), lng: address1.geometry.location.lng()},  // Haight.

    destination: {lat: address2.geometry.location.lat(), lng: address2.geometry.location.lng()},  // Ocean Beach.

    travelMode: google.maps.TravelMode[mode]

  }, function(response, status) {

    if (status == google.maps.DirectionsStatus.OK) {

      var duration = response.routes[0].legs[0].duration.value / 3600;

      var durationBis = duration.toString();

      durationBis = durationBis.split('.');

      durationBis[1] = (parseInt(durationBis[1])*60).toString();

      durationBis[1] = durationBis[1].slice(0,2);

      console.log(mode);

      console.log(durationBis[0] + " h " + (durationBis[1] + " min"));

    //   $.ajax({
    //    url : '../send_notif.php',
    //    type : 'POST', // Le type de la requête HTTP, ici devenu POST
    //    data : 'temps=' + durationBis[0] + " h " + (durationBis[1] + " min") + '&mode_transport=' + mode, // On fait passer nos variables, exactement comme en GET, au script more_com.php
    //    dataType : 'html'
    // });


    } else {

      //window.alert('Directions request failed due to ' + status);

    }

  });

}


  /* Fonction de géocodage déclenchée en cliquant surle bouton "Geocoder"  */

  function codeAddress(address1, address2) {

   geocoder = new google.maps.Geocoder();

   geocoder.geocode( { 'address': address1}, function(results, status) {


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


    
