
document.write("<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAJtETD3Dk2jfmNrWcCw0evJRvaRxUihK8&callback=initMap'></script>");
document.write("<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>" );
    
    var map;
    var directionsDisplay;
    var directionsService;
    var message_temps = null;
    var passage;



function tracerTrajet(address1, address2, libelle_event, token, date_event)

{

    addressFirst = true;

    calculateAndDisplayRoute(address1, address2, "DRIVING", libelle_event, token, date_event);
    calculateAndDisplayRoute(address1, address2, "WALKING", libelle_event, token, date_event);
    calculateAndDisplayRoute(address1, address2, "BICYCLING", libelle_event, token, date_event);
    calculateAndDisplayRoute(address1, address2, "TRANSIT", libelle_event, token, date_event);
}



function initMap() {

  directionsDisplay = new google.maps.DirectionsRenderer;
  directionsService = new google.maps.DirectionsService;
}



function calculateAndDisplayRoute(address1, address2, mode, libelle_event, token, date_event) {

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

      uneDate = new Date(date_event);
      uneDateReduite = uneDate.getHours();
      uneDate.setHours(uneDateReduite - parseInt(durationBis[0]));
      uneDateReduite = uneDate.getMinutes();
      uneDate.setMinutes(uneDateReduite - parseInt(durationBis[1]));

      var tmp = uneDate - new Date();

      tmp = Math.floor(tmp/1000);             // Nombre de secondes entre les 2 dates
      secondes = tmp % 60;                    // Extraction du nombre de secondes
   
      tmp = Math.floor((tmp-secondes)/60);    // Nombre de minutes (partie entière)
      minutes = tmp % 60;                    // Extraction du nombre de minutes
   
      tmp = Math.floor((tmp-minutes)/60);    // Nombre d'heures (entières)
      hours = tmp % 24;                   // Extraction du nombre d'heures
       
      tmp = Math.floor((tmp-hours)/24);   // Nombre de jours restants
      days = tmp;

      if(message_temps == null)
      {
        message_temps = 'Il vous reste : ' + days + ' jours, ' + hours + ' heures et '+ minutes + ' minutes en ' + mode + '.\n';
      }
      else
      {
        message_temps = message_temps + 'Il vous reste : ' + days + ' jours, ' + hours + ' heures et '+ minutes + ' minutes en ' + mode + '.\n';
      }
      
      if(mode == 'TRANSIT')
      {
          $.ajax({
           url : '../send_notif.php',
           type : 'POST',
           data : 'token=' + token + '&libelle_event=' + libelle_event + '&message_temps='+ message_temps, // On fait passer nos variables, exactement comme en GET, au script more_com.php
        });
      }

    }
    else
    {
      if(mode == 'TRANSIT')
      {
          $.ajax({
           url : '../send_notif.php',
           type : 'POST',
           data : 'token=' + token + '&libelle_event=' + libelle_event + '&message_temps='+ message_temps, // On fait passer nos variables, exactement comme en GET, au script more_com.php
        });
      }
    }

  });

}


  /* Fonction de géocodage déclenchée en cliquant surle bouton "Geocoder"  */

  function codeAddress(address1, address2, token, libelle_event, date_event) {

    console.log(address1);
    geocoderTrajet(address1, address2, libelle_event, token, date_event);

  }

function geocoderTrajet(uneAddressetrajet, uneAddressetrajetBis, libelle_event, token, date_event)
{
    geocoder = new google.maps.Geocoder();

     geocoder.geocode( { 'address': uneAddressetrajet}, function(results, status) {


      if (status == google.maps.GeocoderStatus.OK) {

          addr1 = results[0];
          geocoderTrajetBis(addr1, uneAddressetrajetBis, libelle_event, token, date_event);
        }

      });
}

function geocoderTrajetBis(uneAddresseEnplus, uneAddressetrajet, libelle_event, token, date_event)
{
    geocoder = new google.maps.Geocoder();

     geocoder.geocode( { 'address': uneAddressetrajet}, function(results, status) {


      if (status == google.maps.GeocoderStatus.OK) {

          addr2 = results[0];
          tracerTrajet(uneAddresseEnplus, addr2, libelle_event, token, date_event);
        }

      });
}


    
