<?php
include(Path::view(array('includes','head.php')));
include(Path::view(array('includes','header.php')));
include(Path::view(array('includes','plugin.php')));
include(Path::view(array('includes','footer.php')));
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?></title>
        <?= $head ?>
        <?= $css ?>
        
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="50">

        <div id="top"></div>

        <?= $header ?>
        <?= $content ?>
        <?= $footer ?>
        <?= $plugin ?>
        <?= $script ?>
    </body>
</html>
