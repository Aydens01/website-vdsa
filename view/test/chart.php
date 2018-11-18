<?php
include(Path::view(array('includes', 'head.php')));
include(Path::view(array('includes', 'plugin.php')));
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <?= $head ?>
        <?= $plugin ?>
        <script src="<?= htmlspecialchars(Path::asset(array('js','custom/chart.js')))?>"></script>
    </head>
    <body>
        <div id="chartContainer" style="width:700px; height:300px;"></div>
    </body>
</html>