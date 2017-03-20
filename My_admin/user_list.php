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
