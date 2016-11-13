
document.write("<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAJtETD3Dk2jfmNrWcCw0evJRvaRxUihK8&callback=initMap'></script>");
document.write("<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>" );
    
    var map;
    var directionsDisplay;
    var directionsService;
    var addr1;
    var addr2;
    var addressPhysique1;
    var addressPhysique2;
    var unToken;
    var unLibelle_Event;
    var uneDateEvent;
    var message_temps;
<<<<<<< HEAD
    var passage;
=======
>>>>>>> origin/master



function tracerTrajet(address1, address2)

{

    addressFirst = true;

    calculateAndDisplayRoute(address1, address2, "DRIVING");
    calculateAndDisplayRoute(address1, address2, "WALKING");
    calculateAndDisplayRoute(address1, address2, "BICYCLING");
    calculateAndDisplayRoute(address1, address2, "TRANSIT");
}



function initMap() {

  directionsDisplay = new google.maps.DirectionsRenderer;
  directionsService = new google.maps.DirectionsService;
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

<<<<<<< HEAD
      uneDate = new Date(uneDateEvent);
      uneDateReduite = uneDate.getHours();
      uneDate.setHours(uneDateReduite - parseInt(durationBis[0]));
      uneDateReduite = uneDate.getMinutes();
      uneDate.setMinutes(uneDateReduite - parseInt(durationBis[1]));

      var tmp = uneDate - new Date();

=======
      //console.log(unLibelle_Event);
      uneDate = new Date(uneDateEvent);
      //console.log(uneDate);
      uneDateReduite = uneDate.getHours();
      uneDate.setHours(uneDateReduite - parseInt(durationBis[0]));
      //console.log(uneDate);
      uneDateReduite = uneDate.getMinutes();
      uneDate.setMinutes(uneDateReduite - parseInt(durationBis[1]));
      //console.log(uneDate);

      var tmp = uneDate - new Date();
   
>>>>>>> origin/master
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
<<<<<<< HEAD
=======

      console.log('Il vous reste : ' + days + ' jours, ' + hours + ' heures et '+ minutes + ' minutes en ' + mode + ' pour ' + addressPhysique1);


      if(mode == 'TRANSIT')
      {
            $.ajax({
           url : '../send_notif.php',
           type : 'POST', // Le type de la requête HTTP, ici devenu POST
           data : 'token=' + unToken + '&libelle_event=' + unLibelle_Event + '&message_temps='+ message_temps, // On fait passer nos variables, exactement comme en GET, au script more_com.php
        });
      }
      

>>>>>>> origin/master

      if(mode == 'TRANSIT')
      {
          $.ajax({
           url : '../send_notif.php',
           type : 'POST',
           data : 'token=' + unToken + '&libelle_event=' + unLibelle_Event + '&message_temps='+ message_temps, // On fait passer nos variables, exactement comme en GET, au script more_com.php
        });
      }
      


    }

  });

}


  /* Fonction de géocodage déclenchée en cliquant surle bouton "Geocoder"  */

  function codeAddress(address1, address2, token, libelle_event, date_event) {
<<<<<<< HEAD
=======

    message_temps = null;
    uneDateEvent = date_event;
    unToken = token;
    unLibelle_Event = libelle_event;
    addressPhysique1 = address1;
    addressPhysique2 = address2;

   geocoder = new google.maps.Geocoder();

   geocoder.geocode( { 'address': address1}, function(results, status) {
>>>>>>> origin/master

    message_temps = null;
    uneDateEvent = date_event;
    unToken = token;
    unLibelle_Event = libelle_event;
    addressPhysique1 = address1;
    addressPhysique2 = address2;

    geocoderTrajet(address1, address2);

  }

function geocoderTrajet(uneAddressetrajet, uneAddressetrajetBis)
{
    geocoder = new google.maps.Geocoder();

     geocoder.geocode( { 'address': uneAddressetrajet}, function(results, status) {


      if (status == google.maps.GeocoderStatus.OK) {

          addr1 = results[0];
          geocoderTrajetBis(addr1, uneAddressetrajetBis);
        }

      });
}

function geocoderTrajetBis(uneAddresseEnplus, uneAddressetrajet)
{
    geocoder = new google.maps.Geocoder();

     geocoder.geocode( { 'address': uneAddressetrajet}, function(results, status) {


      if (status == google.maps.GeocoderStatus.OK) {

          addr2 = results[0];
          tracerTrajet(uneAddresseEnplus, addr2);
        }

      });
}


    
