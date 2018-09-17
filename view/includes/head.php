<?php
ob_start();
?>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="<?= htmlspecialchars(Path::asset(array('css','bootstrap.min.css')))?>" rel="stylesheet">
        <link href="<?= htmlspecialchars(Path::asset(array('css','animate.min.css')))?>" rel="stylesheet">
        <link href="<?= htmlspecialchars(Path::asset(array('css','hover.min.css')))?>" rel="stylesheet">
        <link href="<?= htmlspecialchars(Path::asset(array('css','snackbar.min.css')))?>" rel="stylesheet">
        <link href="<?= htmlspecialchars(Path::asset(array('css','rater.css')))?>" rel="stylesheet">
        <link href="<?= htmlspecialchars(Path::asset(array('css','font.css')))?>" rel="stylesheet">
        <link href="<?= htmlspecialchars(Path::asset(array('css','custom','style.css')))?>" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<?php
$head = ob_get_clean();
?>