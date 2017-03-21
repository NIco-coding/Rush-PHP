<?php
include_once('start_file.php');

$productManage= new ProductManager($bdd);

if(isset($_POST['send']))
{
    $product= new Product($_POST['name'],$_POST['price'],$_POST['category']);
    if(count($product->getErrors()) == 0)
    {
    $test=$productManage->update($product->getName(),$product->getPrice(),$product->getCategory(),$_GET['id']);
		header('Location: index.php');
    }else {
      foreach ($product->getErrors as $key => $value) {
        echo $value;
      }

    }
}else {
  if(isset($_GET['id']))
  {
    $array_product=$productManage->getProductById($_GET['id']);
    $product= new Product($array_product[0]['name'],$array_product[0]['price'],$array_product[0]['category_id']);
  }else{
    header("Location: product_list.php");
  }

}


?>

<!Doctype html>
<html>
  <head>
    <title>Home Admin</title>
    <link rel="stylesheet" type="text/css" href="../CSS/my_admin.css">
  </head>
  <body>
    <header>
      <h1> Admin - Products Modify </h1>
    </header>
    <main>
  <?php include_once("nav.php"); ?>
    <article>
      <form method="POST" id='principal'>
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
