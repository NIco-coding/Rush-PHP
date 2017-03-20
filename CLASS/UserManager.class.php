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








}





?>
