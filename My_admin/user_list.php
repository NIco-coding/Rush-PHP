<?php

include_once('start_file.php');


if (isset($_POST['Delete']))
  {
    $delete = new UserManager($bdd);
    $delete->deletebyId($_POST['id']);
  }

if (isset($_POST['Modify']))
{
  header('Location: modify_user.php?id='.$_POST['id']);

}


?>

<!Doctype html>
<html>
  <head>
    <title>Admin - Users List</title>
    <link rel="stylesheet" type="text/css" href="../CSS/my_admin.css">
  </head>
  <body>
    <header>
      <h1>Admin - Users List</h1>
    </header>
    <main>
      <?php include_once("nav.php"); ?>
    <article>
      <?php
      Display::createTables("users", $bdd);
      ?>

    </article>
    </main>
    <footer>
    </footer>
  </body>
</html>
