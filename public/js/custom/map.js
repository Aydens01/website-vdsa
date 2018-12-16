/*
 * Map library 
 * 
 * File   : This file defines map functions.
 * Author : Adrien Lafage
 * Since  : 04.12.18
 * 
 * TODO: récupération des données avec ajax
 * FIXME: geocodeAddress (output null)
 * 
*/

/**
 * Dessine un cercle sur la carte.
 * 
 * @param {object} map l'objet map de l'api google
 * @param {object} center l'objet center {lat:value, lng:value}
 * @param {number} radius le rayon du cercle à tracer
 * @param {string} color le code hexadécimale de la couleur du cercle
 * @param {object} legend la légende associée au cercle
 */
function setCircle(map, center, radius, color, legend) {
    /* création de l'objet cercle */
    var circle = new google.maps.Circle({
        strokeColor: color,
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: color,
        fillOpacity: 0.35,
        map: map,
        center: center,
        radius:radius
    });
    /*
    var contentString = 
        '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">'+
            legend.title+
            '</h1>'+
            '<div id="bodyContent">'+
                '<p>'+
                legend.text+
                '</p>'+
            '</div>'+
        '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
    */

    var info = '<h3>Titre</h3>'+
               '<p>Un texte...</p>'
               ;

    


    google.maps.event.addListener(circle, 'click', function(){
        //infowindow.setPosition(circle.getCenter());
        //infowindow.open(map);
        document.getElementById("infos").innerHTML = info;
    });
}

/**
 * Converti une adresse en coordonnées (latitude, longitude) et met un marker dessus.
 * 
 * @param {object} map l'objet map de l'api google
 * @param {object} geocoder l'objet geocoder de l'api google
 * @param {string} address l'adresse à convertir
 * @returns {object} les coordonnées de l'adresse (latitude et longitude) 
 */
function geocodeAddress(map, geocoder, address) {

    var output = null;

    geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
            /*
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
            */
            output = results[0].geometry.location;
            console.log(output);
            
        }else {
            alert('Geocode was not successful for the following reason: ' + status);
            return null;
        }
    });

    console.log(output);
    return output;
}

/* Variables de test TODO: temporaire */
var map;
var ctr = {lat: -34.397, lng: 150.644};
var rad = 5000;
var clr = '#FF0000';
var lgd = {title:'Title', text:'Your text here...'};
var address = "31400 Toulouse";

/**
 * Création d'une carte 
 */
function initMap() {
    // initialise l'objet Map (@param:{centre,zoom})
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 8
    });
    // initialise l'objet Geocoder
    var geocoder = new google.maps.Geocoder();

    /* code */

    //var results = geocodeAddress(map, geocoder, address);
    //console.log(results);

    setCircle(map, ctr, rad, clr, lgd);
}
