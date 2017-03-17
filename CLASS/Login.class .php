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

}


?>
