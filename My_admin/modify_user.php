<?php

include_once('start_file.php');


$modify = new UserManager($bdd);


if(isset($_POST['send']))
{

  if(isset($_POST['checkbox']) && $_POST['checkbox'] == "on")
  {
    $_POST['checkbox'] = 1;
  }
  else
    $_POST['checkbox'] = 0;

  $modify->modifyUser($_POST['firstname'], $_POST['lastname'], $_POST['age'], $_POST['checkbox'], $_GET['id']);
	header('Location: index.php');
}
if(isset($_GET['id']))
  $array = $modify->getUser($_GET['id']);
else
  header('Location: user_list.php')

?>

<!Doctype html>
<html>
  <head>
    <title>Modify User</title>
    <link rel="stylesheet" type="text/css" href="../CSS/my_admin.css">
  </head>
  <body>
    <header>
      <h1> Admin - Modify User </h1>
    </header>
    <main>
<?php include_once("nav.php"); ?>
    <article>
      <form method="POST" id='principal'>
          <label for="form_firstname">First name</label>
            <input id="form_firstname" type="text" name="firstname" value='<?php echo $array['firstname'] ?>' required>

          <label for="form_lastname">Name</label>
            <input id="form_lastname" type="text" name="lastname" value='<?php echo $array['lastname'] ?>' required>

            <label for="form_email">Email</label>
            <input id="form_email" type="email" name="email" value='<?php echo $array['email'] ?>' required>

            <label for="form_age">Age</label>
            <input id="form_age" type="number" name="age" min="3" max="99" value='<?php echo $array['age'] ?>' >

            <label for="form_passwd">Password</label>
            <input id="form_passwd" type="password" name="password" value="" >

            <label for="form_conf_passwd">Password Confirmation</label>
            <input id="form_conf_passwd" type="password" name="conf_password" value="" >

            <label for="checkbox_admin">Admin</label>
            <input id="checkbox_admin" type="checkbox" name="checkbox" <?php if($array['admin'] == 1){ echo "checked";} ?>>


            <label for="form_submit"></label>
            <input id="form_submit" type="submit" value="Modify" name="send">
      </form>
    </article>
    </main>
    <footer>
    </footer>
  </body>
</html>
