<?php

include_once('start_file.php');


  if(isset($_POST['send']))
  {
    $garry = new User($_POST['firstname'], $_POST['lastname'], $_POST['email'], +($_POST['age']), $_POST['password']);
    if($garry->validAttributs() == true && $garry->confirmPassword($_POST['conf_password']) == true)
    {
      if($garry->uniqueEmail($bdd) == true)
      {
        $garry->addUser($bdd);
        header('Location: user_list.php');
      }
      else
        echo "This mail is already used, don't be this guy.";

    }
    else
      foreach($garry->getErrors() as $key => $line)
      {
        foreach ($line as $key => $value)
        {
          echo $value;
        }

      }
  }
?>

<!DOCTYPE HTML>
<html>
  <head>
    <title>
      Mon index PHP
    </title>
  </head>

  <body>
    <header>

    </header>

    <main>
      <?php include_once("nav.php"); ?>
      <form method="POST">
          <label for="form_firstname">First name</label>
            <input id="form_firstname" type="text" name="firstname" required>

          <label for="form_lastname">Name</label>
            <input id="form_lastname" type="text" name="lastname" required>

            <label for="form_email">Email</label>
            <input id="form_email" type="email" name="email" required>

            <label for="form_age">Age</label>
            <input id="form_age" type="number" name="age" min="3" max="99">

            <label for="form_passwd">Password</label>
            <input id="form_passwd" type="password" name="password" value="" required>

            <label for="form_conf_passwd">Password Confirmation</label>
            <input id="form_conf_passwd" type="password" name="conf_password" value="" required>

            <label for="form_submit"></label>
            <input id="form_submit" type="submit" value="Sign In" name="send">
      </form>
    </main>

    <footer>

    </footer>
  </body>
</html>
