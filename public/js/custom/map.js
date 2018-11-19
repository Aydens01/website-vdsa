/*TODO: recupération des données avec ajax*/

/*TODO: fonction qui fait des cercles sur la carte*/
function setCircle(map, center, radius) {
    var circle = new google.maps.Circle({
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FF0000',
        fillOpacity: 0.35,
        map: map,
        center: center,
        radius:radius
    });
}

/*TODO: fonction qui affiche des indications au passage du curseur*/

/* Création d'une map random */
var map;
/* Variables de test */
var ctr = {lat: -34.397, lng: 150.644};
var rad = 50000;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 8
    });
    setCircle(map, ctr, rad);
}
