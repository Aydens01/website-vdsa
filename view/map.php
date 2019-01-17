<?php
include(Path::view(array('includes', 'head.php')));
include(Path::view(array('includes', 'plugin.php')));
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page Title</title>
        <?=$head?>
        <?= $plugin ?>

        <link href="<?= htmlspecialchars(Path::asset(array('css','custom','mapstyle.css')))?>" rel="stylesheet">

        <script src="<?= htmlspecialchars(Path::asset(array('js','custom/map.js')))?>"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAz47ssUwT9xcrgHto9FVdM4b4Oyp4AZ-g&callback=initMap" async defer></script>

    </head>
    <body>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Voir la carte
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Géolocalisation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="screen">
                        <div id="map">
                            Map
                        </div>
                        <div id="legend">
                            <div id="title-info">Informations</div>
                            <div id="infos">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>