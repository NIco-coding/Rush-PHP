<?php

class UserManager
{


	protected $db;




	function __construct($s_db)
	{
		$this->db = $s_db;
	}




	function __destruct()
	{

	}



	function deletebyId($id)
	{
		$res = $this->db->exec('DELETE FROM users WHERE id ='.$id);

		if ($res == 0)
		{
			return false;
		}
		else
		{
			return true;
		}
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


	public function getUser($id)
	{
		$req = $this->db->prepare("SELECT * FROM users WHERE id=:id");
		$res = $req->execute(array(':id'=>$id));
		$array = $req->fetch();
		return $array;
	}



	public function modifyUser($s_firstname, $s_lastname, $s_age, $s_admin, $s_id)
	{
		$req = $this->db->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, age = :age, admin = :admin WHERE id = :id");
		$res = $req->execute();

	}
}





?>
