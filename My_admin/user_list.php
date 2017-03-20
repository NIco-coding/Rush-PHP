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
    <title>Home Admin</title>
  </head>
  <body>
    <header>
      <h1> Home Admin>
    </header>
    <main>
<?php include_once("nav.php"); ?>
    <article>
    </article>
    </main>
    <footer>
    </footer>
  </body>
</html>

<?php
Display::createTables("users", $bdd);
?>
