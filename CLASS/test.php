<?php
session_start();


include_once("User.class.php");
include_once("../connect_db.php");
$bdd=connect_db("localhost","root","Nagakyotsunaka1","3306","pool_php_rush");
$test = new User("toto","tata","test@test.com",15,"12345");
$test->addUser($bdd);
//$test->addUser($bdd);
if(!$test->validAttributs())
  foreach ($test->getErrors() as $value) {
    print_r ($value);
  }
