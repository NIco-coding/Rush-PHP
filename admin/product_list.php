<?php
session_start();
include_once('../CLASS/Login.class.php');
include_once('../connect_db.php');
$bdd=connect_db("localhost","root","root","3306","pool_php_rush");
Login::isUserLogged();
Login::isAdmin($bdd);
