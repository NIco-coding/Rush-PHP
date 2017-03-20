<?php

include_once('start_file.php');

$productManage= new ProductManager($bdd);

$name="";
$price="";
$category="";

if(isset($_POST['send']))
{
    $product= new Product($_POST['name'],$_POST['price'],$_POST['category']);
    if(count($product->getErrors()) == 0)
    {
    $test=$productManage->addProduct($product);

    }else {
      $name=$_POST['name'];
      $price=$_POST['price'];
      $category=$_POST['category'];
      foreach ($product->getErrors as $key => $value) {
        echo $value;
      }

    }
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
            <input name="name" type="text" value='<?php echo $name; ?>' >

          <label for="price">Price</label>
            <input name="price" type="text" min="3" max="99" value='<?php echo $price; ?>' >

            <select name='category'>
<?php
  var_dump($productManage);
    foreach ($productManage->listCategory() as $cat) {
      foreach ($cat as $key => $value) {

        if($category == $key )
          echo "<option value =$key selected>".$value;
        else
          echo "<option value=$key>".$value;
      }

    }
 ?>
             </select>

            <input id="form_submit" type="submit" value="Create" name="send">
      </form>
    </article>
    </main>
    <footer>
    </footer>
  </body>
</html>
