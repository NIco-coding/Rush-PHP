<?php
include_once('start_file.php');
include_once('categories_list.php');

$productManage= new ProductManager($bdd);

if(isset($_POST['send']))
{
  if(!empty($_POST['category']))

  {
    if ($productManage->categoryParentExist($_POST['category'],$_POST['category_parent']))
    {
      $productManage->addCategory($_POST['category'],$_POST['category_parent']);
    }else{
        echo "<p>Category already exist with this parent.</p>";
    }

  }else{
    echo "<p>Category invalid.</p>";
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
      <h1> Home Admin>
    </header>
    <main>
  <?php include_once("nav.php"); ?>
    <article>
      <form method='POST'>
        <label for'category'>
        <input type='text' name='category' /></label>
        <select name='category_parent'>
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
