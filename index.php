<?php
	session_start();
	include_once('CLASS/Login.class.php');
	Login::isUserLogged();
	
	if(isset($_POST['send']))
	{
		Login::logout();
		header('Location: login.php');
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
				
	  			<label for="form_submit"></label>
				<input id="form_submit" type="submit" name ="send" value="Logout">
			</form>
		</main>
		
		<footer>
			
		</footer>
	</body>
</html>