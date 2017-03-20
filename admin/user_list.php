<?php
session_start();
function __autoload($class_name)
{
  include_once "../CLASS/".$class_name.'.class.php';
}
include_once('../connect_db.php');

$bdd=connect_db("localhost","root","root","3306","pool_php_rush");
$Users = new UserManager($bdd);

Login::isUserLogged();
Login::isAdmin($bdd);

  if(isset($_POST['send_delete']))
  {
    $Users->deleteById($_POST['id']);
  }

  if(isset($_POST['send_modify']))
  {
    header('Location: user_form.php?id='.$_POST['id']);
  }

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
<?php
Display::createTables("users",$bdd);
 ?>
    </article>
    </main>
    <footer>
    </footer>
  </body>
</html>
