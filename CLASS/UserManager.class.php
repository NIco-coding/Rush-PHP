<?php

class UserManager
{
<<<<<<< HEAD

  private $db;

  public function __construct($s_db)
  {
    $this->setDb($s_db);

  }

  public function add(User $user)
  {

    $req = $this->db->prepare("INSERT INTO users VALUES('',:lastname,:firstname,:age,:email,:password,0)");
    $bool = $req->execute(array(
      ':lastname'=> $user->getLastname(),
      ':firstname'=> $user->getFirstname(),
      ':age'=> $user->getAge(),
      ':email'=> $user->getEmail(),
      ':password'=> password_hash($user->getPassword(), PASSWORD_DEFAULT)));
    return $bool;
  }

  public function modify(User $s_user)
  {
    $str_set="";
    $first=0;
    if(($s_user instanceof User) && !($s_user instanceof Admin))
    {
      foreach ($s_user->getArrayAttributs() as $attribut)
      {
          if($first == 0)
            $str_set=$str_ste." $key= $value ";
          else
            $str_set=$str_ste." ,$key= $value ";
      }
    }
    $req=$this->db->exec("UPDATE users SET $str_set WHERE id= $s_user->getId()");
    return false;
  }

  public function delete(User $s_user)
  {
    if(($s_user instanceof User) && !($s_user instanceof Admin))
    {
      $req=$this->db->exec("DELETE FROM users WHERE id =".$s_user->getId());
      if($req>0 and $req != false)
        return true;
      else
        return false;
    }
  }

  public function deleteById($s_id)
  {

      $req=$this->db->exec("DELETE FROM users WHERE id =".$s_id);
      if($req>0 and $req != false)
        return true;
      else
        return false;

  }
  public function getList()
  {
    $req=$this->db->prepare("SELECT * FROM users");
    $error=$req->execute();
    $Users = $req->fetchAll(PDO::FETCH_ASSOC);
    return $Users;
  }

  public function getId()
  {
    $req = $this->db->prepare("SELECT id FROM users WHERE email= :email");
    $bool = $req->execute(array(':email'=>$this->email));
    $arrId = $req->fetch();

    if(!$bool)
      return false;
    else
      return $arrId['id'];
  }

  public function getUserById($s_id)
  {
    $req = $this->db->prepare("SELECT * FROM users WHERE id= :id");
    $bool = $req->execute(array(':id'=>$s_id));
    $arrUser = $req->fetchAll(PDO::FETCH_ASSOC);

    if(count($arrUser)==0)
      return false;
    else
      return $arrUser[0];
  }

  // SETTER

  public function setDb($s_db)
  {
    $this->db=$s_db;
  }

}

 ?>
=======
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
		$res = $req->execute(array(
			':firstname'=>$s_firstname,
			':lastname'=>$s_lastname,
			':age'=>$s_age,
			':admin'=>$s_admin,
			':id'=>$s_id));
		if($res == true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}





?>
>>>>>>> origin
