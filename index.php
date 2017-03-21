<?php
include_once('start_file.php');

	if(isset($_POST['send']))
	{
		Login::logout();
		header('Location: login.php');
	}

header('Location: product.php');

?>

