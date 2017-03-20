<?php
session_start();

function __autoload($className)
{
	include('../CLASS/'.$className.".class.php");
}
include_once('../connect_db.php');

$bdd=connect_db("localhost","root","root","3306","pool_php_rush");
Login::isUserLogged();
Login::isAdmin($bdd);

$productManage= new ProductManager($bdd);

if(isset($_POST['send']))
{
    $product= new Product($_POST['name'],$_POST['price'],$_POST['category']);
    if(count($product->getErrors()) == 0)
    {
    $test=$productManage->update($product->getName(),$product->getPrice(),$product->getCategory(),$_GET['id']);

    }else {
      foreach ($product->getErrors as $key => $value) {
        echo $value;
      }

    }
}else {
  $array_product=$productManage->getProductById($_GET['id']);
  $product= new Product($array_product[0]['name'],$array_product[0]['price'],$array_product[0]['category_id']);

}


?>

<!Doctype html>
<html>
  <head>
    <title>Home Admin</title>
  </head>
  <body>
    <header>
    </header>
    <main>
  <?php include_once("nav.php"); ?>
    <article>
      <form method="POST">
          <label for="name">Name</label>
            <input name="name" type="text" value='<?php echo $product->getName() ?>' >

          <label for="price">Price</label>
            <input name="price" type="text" min="3" max="99" value='<?php echo $product->getPrice() ?>' >

            <select name='category'>
<?php

    foreach ($productManage->listCategory()  as $cat) {
      foreach ($cat as $key => $value) {
        if($product->getCategory() == $key )
          echo "<option value =$key selected>".$value;
        else
          echo "<option value=$key>".$value;
      }

    }
 ?>
             </select>

            <input id="form_submit" type="submit" value="Modify" name="send">
      </form>
    </article>
    </main>
    <footer>
    </footer>
  </body>
</html>
