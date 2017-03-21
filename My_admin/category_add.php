<?php
include_once('start_file.php');

$productManage= new ProductManager($bdd);

if(isset($_POST['send']))
{
  if(!empty($_POST['category']))

  {

      $productManage->addCategory($_POST['category'],$_POST['category_parent']);


  }else{
    echo "<p>Category invalid.</p>";
  }
}

?>
<!Doctype html>
<html>
  <head>
    <title>Category add</title>
    <link rel="stylesheet" type="text/css" href="../CSS/my_admin.css">
  </head>
  <body>
    <header>
      <h1> Admin - Category Add </h1>
    </header>
    <main>
  <?php include_once("nav.php"); ?>
    <article>
      <form method='POST' id='principal'>
        <label for'category'> New Category
        <input type='text' name='category' /></label>
        <label for="category_parent"> Parent category</label>
        <select name='category_parent'>
        <option vale='0'>
<?php

foreach ($productManage->listCategory()  as $cat) {
  foreach ($cat as $key => $value) {
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
