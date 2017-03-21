<?php
session_start();


include_once("User.class.php");
include_once("../connect_db.php");

$bdd=connect_db("localhost","root","Nagakyotsunaka1","3306","pool_php_rush");
$test = new User("aaa","sdc","test2@test.com",12,"aqsz123");
$test->addUser($bdd);
?>
