<?php
include(Path::view(array('includes', 'head.php')));
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page Title</title>
        <?=$head?>
        <style>
            /* Always set the map height explicitly to define the size of the div
            * element that contains the map. */
            #map {
                height: 400px;
            }
            /* Optional: Makes the sample page fill the window. 
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
            */
        </style>
        <script src="<?= htmlspecialchars(Path::asset(array('js','custom/map.js')))?>"></script>
        <!--
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAz47ssUwT9xcrgHto9FVdM4b4Oyp4AZ-g&callback=initMap" async defer></script>
        -->
    </head>
    <body>
        <h1>Géolocalisation</h1>
        <div id="map"></div>
    </body>
</html>