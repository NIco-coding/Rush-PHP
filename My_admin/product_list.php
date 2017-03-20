<?php
include_once('start_file.php');

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
