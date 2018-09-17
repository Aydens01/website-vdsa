<?php
ob_start();
?>

<script src="<?= htmlspecialchars(Path::asset(array('js','jquery-3.3.1.min.js')))?>"></script>
<script src="<?= htmlspecialchars(Path::asset(array('js','bootstrap.bundle.min.js')))?>"></script>
<script src="<?= htmlspecialchars(Path::asset(array('js','snackbar.min.js')))?>"></script>
<script src="<?= htmlspecialchars(Path::asset(array('js','rater.js')))?>"></script>
<script src="<?= htmlspecialchars(Path::asset(array('js','cropper.min.js')))?>"></script>
<?php
$plugin = ob_get_clean();
?>

