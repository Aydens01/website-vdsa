<?php
include(Path::view(array('includes', 'head.php')));
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <?= $head ?>
    </head>
    <body>
        <?php
            echo "<p> Moyenne :".$data['uni']->getAverage()."</p>";
            echo "<p> Médiane :".$data['uni']->getMedian()."</p>";
            echo "<p> Quartile 1 :".$data['uni']->getQuart1()."</p>";
            echo "<p> Quartile 3 :".$data['uni']->getQuart3()."</p>";
        ?>
    </body>
</html>