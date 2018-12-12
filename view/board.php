<?php
include(Path::view(array('includes', 'head.php')));
include(Path::view(array('includes', 'plugin.php')));
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tableau de bord</title>
        <?= $head ?>
        <?= $plugin ?>
        
    </head>
    <body>

    <div class="form-group">
    <select id="frequence" class="target">
        <option value="annuel">State - Global clients annuel</option>
        <option value="mensuel">State - Global clients mensuel</option>
    </select>
    </div>
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-primary active target">
            <input type="radio" name="options" value="CA" id="CA"> Chiffre d'affaire
        </label>
        <label class="btn btn-primary target">
            <input type="radio" name="options" value="marge" id="marge"> Marge
        </label>
    </div>
    <div class="form-group target" >
    <select id="famille">
        <option value="0">Famille (toutes par default)</option>
        <option value="famille1">Famille 1</option>
        <option value="famille2">Famille 2</option>
    </select>
    </div>
    <div class="form-group target">
    <select id="sousFamille">
        <option value="0">Sous Famille (toutes par default)</option>
        <option value="sousFamille1">Sous Famille 1</option>
        <option value="sousFamille2">Sous Famille 2</option>
    </select>
    </div>

    <div id="ici" class="border">

    </div>
    <script src="<?= htmlspecialchars(Path::asset(array('js','custom/chart.js')))?>"></script>
    </body>
</html>