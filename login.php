<?php
	session_start();
	include_once('CLASS/Login.class.php');
	include_once('CLASS/User.class.php');
	include_once('connect_db.php');
	$bdd=connect_db("localhost","root","Nagakyotsunaka1","3306","pool_php_rush");

	if(isset($_POST['send']))
	{
		$garry = new User("", "", $_POST['email'], NULL, $_POST['password']);

		if(!array_key_exists('email', $garry->getErrors()) || !array_key_exists('password', $garry->getErrors()))
		{
			if(Login::validateLogin($garry->recoverPassword($bdd), $_POST['password']) == true)
			{

				Login::setCookie($_POST['email']);
				Login::setSession($_POST['email']);
				header('Location: index.php');
			}

		}
		else
		{
			foreach ($garry->getErrors() as $key => $value)
			{
				if ($key == 'email' || $key == 'password')
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
				<label for="form_email">Email</label>
	  			<input id="form_email" type="text" name="email" value="" required>

	  			<label for="form_passwd">Password</label>
	  			<input id="form_passwd" type="password" name="password" value="" required>

	  			<label for="form_submit"></label>
				<input id="form_submit" type="submit" name ="send" value="Login">
			</form>
		</main>

		<footer>

		</footer>
	</body>
</html>
