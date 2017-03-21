<?php
	session_start();
	include_once('CLASS/Login.class.php');
	include_once('CLASS/User.class.php');
	include_once('connect_db.php');
	$bdd=connect_db("localhost","root","Nagakyotsunaka1","3306","pool_php_rush");

	if(isset($_POST['send']))
	{
		$garry = new User($_POST['firstname'], $_POST['lastname'], $_POST['email'], +($_POST['age']), $_POST['password']);
		if($garry->validAttributs() == true && $garry->confirmPassword($_POST['conf_password']) == true)
		{
			if($garry->uniqueEmail($bdd) == true)
			{
				$garry->addUser($bdd);
				header('Location: login.php');
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

<!DOCTYPE HTML PUBLIC ".//W3C//DTD XHTML 1.0 Transitional//EN" "http.www.w3c.org/TR/html/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>
			Mon index PHP
		</title>
	</head>

	<body>
		<header>

		</header>

		<main>
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
