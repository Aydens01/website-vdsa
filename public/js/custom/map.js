/* Création d'une map random
var map;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 8
    });
}
*/



/* Variables de test */
var ctr = {lat: 34.397, lng: 150.644};
var rad = 5;

/*TODO: recupération des données avec ajax*/

/*TODO: fonction qui fait des cercles sur la carte*/
function setCircle(center , radius) {
    console.log(center, radius);
}

/*TODO: fonction qui affiche des indications au passage du curseur*/

setCircle(ctr, rad);