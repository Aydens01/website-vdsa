/*TODO: recupération des données avec ajax*/

/*TODO: fonction qui fait des cercles sur la carte*/
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

    google.maps.event.addListener(circle, 'click', function(){
        infowindow.setPosition(circle.getCenter());
        infowindow.open(map);
    });
}

/* Variables de test */
var map;
var ctr = {lat: -34.397, lng: 150.644};
var rad = 5000;
var clr = '#FF0000';
var lgd = {title:'Title', text:'Your text here...'};

/* Création de la carte */
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 8
    });
    setCircle(map, ctr, rad, clr, lgd);
}
