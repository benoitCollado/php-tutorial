<?php
require_once 'functions.php';
session_start();
$_SESSION = [];


$params = session_get_cookie_params();
setcookie('PHPSESSID', '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
setcookie('LOGGED_USER', '', [
          'expires' => time() - 42000,
]);


session_destroy();

redirectToUrl('index.php');
?>