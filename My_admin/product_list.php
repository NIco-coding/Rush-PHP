<?php
session_start();
function __autoload($class_name)
{
  include_once "../CLASS/".$class_name.'.class.php';
}
include_once('../connect_db.php');
$bdd=connect_db("localhost","root","Nagakyotsunaka1","3306","pool_php_rush");
Login::isUserLogged();
Login::isAdmin($bdd);
$Products = new ProductManager($bdd);

if(isset($_POST['Delete']))
{
  $Products->deleteProductById($_POST['id']);
}

if(isset($_POST['Modify']))
{
  header('Location: user_modify.php?id='.$_POST['id']);
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
              <li><a href ='product_add.php'>Add product</a></li>
              <li><a href ='product_list.php'>Modify product</a></li>
            </ul>
          </li>
      </nav>
    <article>
<?php
Display::createTables('products',$bdd);
?>
    </article>
    </main>
    <footer>
    </footer>
  </body>
</html>
