<?php

abstract class Login
{

	public static function validateLogin($password_hash, $confirmPassword)
	{
		if(password_verify($password_hash, $confirmPassword))
			return true;
		else
			return false;
	}

	public static function setSession($email)
	{
		$_SESSION['user'] = $email;
	}

	public static function setCookie($email)
	{
		setCookie('user',$email, time() + 365*24*3600, null, null, false, true);
	}

	public static function isUserLogged()
	{
		if((!isset($_SESSION['user']) || empty($_SESSION['user'])) && (!isset($_COOKIE['user']) || empty($_COOKIE['user'])))
		{
			header('Location: login.php');
		}
		elseif (!isset($_SESSION['user']) && isset($_COOKIE['user']) && !empty($_COOKIE['user'])
		{
			$_SESSION['user']=$_COOKIE['user'];
		}
	}

}


?>
