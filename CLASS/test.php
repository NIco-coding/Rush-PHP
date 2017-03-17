<?php
session_start();


include_once("User.class.php");
include_once("../connect_db.php");
<<<<<<< HEAD
include_once("Login.class.php");
$bdd=connect_db("localhost","root","root","3306","pool_php_rush");
$test = new User("","","test@test.com",12,"12345");
var_dump($test);
=======
$bdd=connect_db("localhost","root","Nagakyotsunaka1","3306","pool_php_rush");
$test = new User("toto","tata","test@test.com",15,"12345");
$test->addUser($bdd);
>>>>>>> origin
//$test->addUser($bdd);

  foreach ($test->getErrors() as $value) {
    print_r ($value);
  }
Login::setSession('test@test.com');
Login::setCookie('test@test.com');
