<?php
session_start();
function __autoload($class_name)
{
  include_once "../CLASS/".$class_name.'.class.php';
}
include_once('../connect_db.php');
$bdd=connect_db("localhost","root","root","3306","pool_php_rush");
Login::isUserLogged();
Login::isAdmin($bdd);
$Products = new ProductManager($bdd);

if(isset($_POST['Delete']))
{
  $Products->deleteProductById($_POST['id']);
}

if(isset($_POST['Modify']))
{
  header('Location: product_modify.php?id='.$_POST['id']);
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
  <?php include_once("nav.php"); ?>
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
