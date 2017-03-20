<?php

abstract class Login
{

	public static function validateLogin($password_hash, $confirmPassword)
	{
		if(password_verify($confirmPassword,$password_hash))
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
		setrawcookie('user',$email, time() + 365*24*3600);
	}

	public static function isUserLogged()
	{
		if((!isset($_SESSION['user']) || empty($_SESSION['user'])) && (!isset($_COOKIE['user']) || empty($_COOKIE['user'])))
		{
			header('Location: login.php');
		}
		elseif (!isset($_SESSION['user']) && isset($_COOKIE['user']) && !empty($_COOKIE['user']))
		{
			$_SESSION['user']=$_COOKIE['user'];
		}
	}

	public static function logout()
	{
		session_unset();
		session_destroy();
		session_start();
		session_reset();
		
		if(isset($_COOKIE['user']))
		{
		unset($_COOKIE['user']);
		setcookie("user", "", time() -3600);
		}

	}

	public static function isAdmin($s_bdd)
	{
		$req = $s_bdd->prepare("SELECT admin FROM users WHERE email =:email");
		$bool = $req->execute(array(':email'=>$_SESSION['user']));
		$res = $req->fetch();
		
		if ($res['admin'] == true)
		{
			
			return true;
		}
		else
		{
			header("Location: ../login.php");
			return false;
		}


	}

}


?>
