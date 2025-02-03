<?php 
$GLOBALS['a'] = 1;


$globals = $GLOBALS;
$globals['a'] = 2;

var_dump($GLOBALS['a']);
var_dump($a);
var_dump($globals['a']);

?>