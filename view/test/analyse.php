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

            # Test AnalyseUni
            echo "<p> Moyenne : ".$data['uni']->getAverage()."</p>";
            echo "<p> Médiane : ".$data['uni']->getMedian()."</p>";
            echo "<p> Quartile 1 : ".$data['uni']->getQuart1()."</p>";
            echo "<p> Quartile 3 : ".$data['uni']->getQuart3()."</p>";
            echo "<p> Variance : ".$data['uni']->getVariance()."</p>";
            echo "<p> Ecart-type : ".$data['uni']->getDeviation()."</p>";
            
            echo "<p>-----------------</p>";

            # Test AnaQuanQuan
            echo "<p> Covariance : ".$data['biv']->getCovariance()."</p>";
            echo "<p> Variance de x : ".$data['biv']->getVariance_x()."</p>";
            echo "<p> Variance de y : ".$data['biv']->getVariance_y()."</p>";
            echo "<p> Ecart-type de x : ".pow($data['biv']->getVariance_x(), 0.5)."</p>";
            echo "<p> Ecart-type de y : ".pow($data['biv']->getVariance_y(), 0.5)."</p>";
            echo "<p> Coefficient de Pearson : ".$data['biv']->getPearson()."</p>";

            echo "<p>-----------------</p>";

            # Test AnaQualQuan
            echo "<p> Moyenne de Y : ".$data['qua']->getAverage()."</p>";
            echo "<p> Variantion intra : ".$data['qua']->getVar_intra()."</p>";
            echo "<p> Variation inter : ".$data['qua']->getVar_inter()."</p>";
            echo "<p> Variation totale : ".$data['qua']->getVar_total()."</p>";
            echo "<p> Rapport de corrélation : ".$data['qua']->getRpcorrel()."</p>";

            echo "<p>-----------------</p>";

            $matrix = centereducedMatrix($data['uni']->getData());

            echo "<p> TEST : ".corLinearMatrix($matrix)[2][0]."</p>";
            echo "<p> Résultat attendu : ".$data['biv']->getPearson()."</p>";
        ?>
    </body>
</html>