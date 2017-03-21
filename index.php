<?php
include_once('start_file.php');

	if(isset($_POST['send']))
	{
		Login::logout();
		header('Location: login.php');
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
			<form method="POST">

	  			<label for="form_submit"></label>
				<input id="form_submit" type="submit" name ="send" value="Logout">
			</form>

		</main>

		<footer>

		</footer>
	</body>
</html>
