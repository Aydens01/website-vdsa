<?php
$title = "dashboard";
ob_start();

//$connexion = new DB;
//$connexion->test();
// CONTENU =====================================================================
//echo $data['test'];
?>

<?php
$content = ob_get_clean();
ob_start();
// SCRIPT ======================================================================
?>

<!--
<script src="<?= htmlspecialchars(Path::asset(array('js','custom','home.js')))?>"></script>
-->

<?php
$script = ob_get_clean();
ob_start();

// CSS =========================================================================
?>

        <link href="<?= htmlspecialchars(Path::asset(array('css','custom','home.css')))?>" rel="stylesheet">
<?php
$css = ob_get_clean();
require(Path::view(array('template.php')));
?>
