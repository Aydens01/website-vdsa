<?php
require_once '../init.php';

session_start();

$user = new User(NULL,NULL,NULL,'guest');
$_SESSION['user']=$user;

$app = new App;