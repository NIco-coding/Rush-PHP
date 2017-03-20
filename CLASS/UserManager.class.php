<?php

class UserManager
{

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
