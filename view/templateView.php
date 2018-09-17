<?php
$title = "";
ob_start();

// CONTENU =====================================================================
?>



<?php
$content = ob_get_clean();
ob_start();

// SCRIPT ======================================================================
?>



<?php
$script = ob_get_clean();
require(Path::view(array('template.php')));
?>