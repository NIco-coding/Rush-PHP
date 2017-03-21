<?php
session_start();

function __autoload($className)
{
	include('CLASS/'.$className.".class.php");
}
include_once('connect_db.php');

$bdd=connect_db("localhost","root","Nagakyotsunaka1","3306","pool_php_rush");
Login::isUserLogged();
?>
