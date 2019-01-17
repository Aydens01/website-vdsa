<?php
require_once '../init.php';

session_start();

if (isset($_SESSION['TIME']) && (time() - $_SESSION['TIME'] > 300)) {
    session_destroy();
    session_unset();
}
$_SESSION['TIME'] = time();

if (!isset($_SESSION['user'])){ 
	$user = new User(NULL,NULL,NULL,'guest');
	$_SESSION['user']=$user;
}
$app = new App;