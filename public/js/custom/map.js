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

    var info = '<div class="subtitle">'+legend.title+'</div>'+
               '<div class="info-text">Chiffre d\'affaire total : '+legend.ca+' €</div>' +
               '<div class="info-text">Marge totale : '+legend.marge+' €</div>'
               ;

    google.maps.event.addListener(circle, 'click', function(){
        document.getElementById("infos").innerHTML = info;
    });
}

/**
 * Converti une adresse en coordonnées (latitude, longitude) et met un marker dessus.
 * 
 * @param {object} map l'objet map de l'api google
 * @param {string} address l'adresse à convertir
 * @param {integer} radius Le rayon du cercle
 * @param {string} color la couleur
 * @param {string} legend le texte associé à la position
 */
function geocodeAddress(map, address, radius, color, legend) {
    var geocoder = new google.maps.Geocoder();

    geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
            console.log("ok " + address);
            setCircle(map,results[0].geometry.location,radius,color,legend);
            
        }else {
            console.log("default " + address);
            if (status==google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
                setTimeout(function() {
                    console.log("pas ok " + address);
                    geocodeAddress(map, address, radius, color, legend);
                    
                }, 200);
            }else{
                alert('Geocode was not successful for the following reason: ' + status);
            }            
        }
    });
}

/* Variables de test TODO: temporaire */
var map;
var ctr = {lat: 43.6043, lng: 1.4437};
var rad = 5000;
var clr = '#FF0000';
var lgd1 = {title:'Title1', nb:'Your text here...'};
var lgd2 = {title:'Title2', nb:'Another text...'}
var address1 = "31400 Toulouse";
var address2 = "31000 Toulouse";

/**
 * Création d'une carte
 * 
 * @param {Array} data L'objet json 
 */
function initMap(data) {

    console.log(data);
    // initialise l'objet Map (@param:{centre,zoom})
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 49.0333, lng: 2.0667},
        zoom: 8
    });
    // initialise l'objet Geocoder
    
    
    for (let index = 0; index < data.length -1; index++) {

        if (data[index].codePostal != 0){
            var address = data[index].codePostal + " " + data[index].ville;
            var radius = Math.log(parseFloat(data[index]["SUM(CA)"]))*100;
            var legend = {title:data[index].ville, ca:String(Math.round(parseFloat(data[index]["SUM(CA)"])*100)/100), marge:String(Math.round(parseFloat(data[index]["SUM(marge)"])*100)/100)};
            console.log(address);
            geocodeAddress(map, address, radius, clr, legend);
        } 
    }

    
}

$(document).ready(function(){
        /*
        console.log("okDebut");
        var data = {};
        $.ajax({
            url:'/test/maths',
            type:"POST",
            data: data,
            dataType:"json",
            success:
            function(data, status){
                console.log("okMaths");
                var data = $.parseJSON(JSON.stringify(data));
                document.getElementById('correlFaCA').innerHTML+=data['correlFaCA'];
                console.log(data['correlFaCA']);
                //document.getElementById('correlFama').innerHTML+=data['correlFama'];
                //document.getElementById('correlSFaCA').innerHTML+=data['correlSFaCA'];
                //document.getElementById('correlSFama').innerHTML+=data['correlSFama'];
                //document.getElementById('correlCAma').innerHTML+=data['correlCama'];
                //document.getElementById('averageCA').innerHTML+=data['averageCa'];
                //document.getElementById('medianCA').innerHTML+=data['medianCa'];
                //document.getElementById('averageMa').innerHTML+=data['averageMa'];
                //document.getElementById('medianMa').innerHTML+=data['medianMa'];

            }
        })
        */
        $("#geo").click(function(){
            var data = {};
            data.freq = $("#frequence").val();
            data.margeCA = $('input[name=options]:checked').val();
            data.client = $("#client").val();
            data.famille = $("#famille").val();
            data.sousFamille = $("#sousFamille").val();
            
            $.ajax({
                url:'/test/majGeo',
                type:"POST",
                data: data,
                dataType:"json",
                success:
                function(data, status){
                    
                    var data = $.parseJSON(JSON.stringify(data));
                    initMap(data);
        
                }
            })
        });

        $("#mathsButton").click(function(){
            var data = {};
            $.ajax({
                url:'/test/maths',
                type:"POST",
                data: data,
                dataType:"json",
                success:
                function(data, status){
                    
                    var data = $.parseJSON(JSON.stringify(data));
        
                }
            })
        });

});


