<?php

class User
{
//-------------------------------------------------------------------------------------------------------------ATTRIBUTE
protected $firstname;
protected $lastname;
protected $email;
protected $age;
protected $password;
protected $array_errors;
//---------------------------------------------------------------------------------------------------------------CONSTRUCTOR
	function __construct($firstname = NULL, $lastname = NULL, $email = NULL, $age = NULL, $password = NULL)
	{
		$this->array_errors=[];
		if(!$this->setFirstname($firstname))
			array_push($this->array_errors, array('firstname'=>"Firstname invalid."));

		if(!$this->setLastname($lastname))
			array_push($this->array_errors, array('lastname'=>"Lastname invalid."));

		if(!$this->setEmail($email))
			array_push($this->array_errors, array('email'=>"Email invalid"));

		if(!$this->setAge($age))
			array_push($this->array_errors, array('age'=>"Age invalid"));

		if(!$this->setPassword($password))
			array_push($this->array_errors, array('password'=>"Password invalid"));


	}
//---------------------------------------------c--------------------------------------------------------------------------METHODS
	public function validAttributs()
	{
		if(count($this->array_errors) == 0)
			return true;
		else
			return false;
	}

	public function confirmPassword($S_confirmPassword)
	{
		if ($this->password == $S_confirmPassword)
		{
			return true;
		}
		else
			return false;
	}

	public function addUser($S_bdd)
	{
		$req = $S_bdd->prepare("INSERT INTO users VALUES('',:lastname,:firstname,:age,:email,:password,0)");
		$bool = $req->execute(array(
			':lastname'=> $this->lastname,
			':firstname'=> $this->firstname,
			':age'=> $this->age,
			':email'=> $this->email,
			':password'=> password_hash($this->password, PASSWORD_DEFAULT)));
		return $bool;
	}



//-----------------------------------------------------------------------------------------------------------------------------GETTER
	function getFirstname()
	{
		return $this->firstname;
	}
	function getLastname()
	{
		return $this->lastname;
	}
	function getEmail()
	{
		return $this->email;
	}
	function getAge()
	{
		return $this->age;
	}
	function getPassword()
	{
		return $this->password;
	}
	function getErrors()
	{
		return $this->array_errors;
	}

//-----------------------------------------------------------------------------------------------------------------------------SETTER

	function setFirstname($S_firstname)
	{
		if(!is_int($S_firstname) && strlen($S_firstname) > 1)
		{
			 $this->firstname = $S_firstname;
			 return true;
		}
		else
			return false;
	}
	function setLastname($S_lastname)
	{
		if(!is_int($S_lastname) && strlen($S_lastname) > 1)
		{
			$this->lastname = $S_lastname;
			return true;
		}
		else
			return false;
	}
	function setEmail($S_email)
	{
		if(preg_match('#^[A-Za-z0-9.-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$#', $S_email))
		{
			$this->email = $S_email;
			return true;
		}
		else
			return false;
	}
	function setAge($S_age)
	{
		if(is_int($S_age) && $S_age >= 13)
		{
			$this->age = $S_age;
			return true;
		}
		else
			return false;

	}
	function setPassword($S_password)
	{
		if (!is_int($S_password) && strlen($S_password) >= 5)
		{
			$this->password = $S_password;
			return true;
		}
		else
			return false;
	}

//-------------------------------------------------------------------------------------------------------------------DESTRUCTOR
	function __destruct()
	{

	}

}








?>
