<?php
session_start();
include_once('../CLASS/Login.class.php');
include_once('../connect_db.php');
$bdd=connect_db("localhost","root","root","3306","pool_php_rush");
Login::isUserLogged();
Login::isAdmin($bdd);
?>
<!Doctype html>
<html>
  <head>
    <title>Home Admin</title>
  </head>
  <body>
    <header>
      <h1> Home Admin>
    </header>
    <main>
      <nav>
        <ul id="first">
          <li>
            <ul id="second">
              <li><h1> USER<h1></li>
              <li><a href ='user_form.php'>Add user</a></li>
              <li><a href ='user_list.php'>Modify user</a></li>
            </ul>
          </li>
          <li>
            <ul id="second">
              <li><h1> Product<h1></li>
              <li><a href ='product_form.php'>Add product</a></li>
              <li><a href ='product_list.php'>Modify product</a></li>
            </ul>
          </li>
      </nav>
    <article>
      
    </article>
    </main>
    <footer>
    </footer>
  </body>
</html>
