<?php

abstract class Display
{

	static function createTables($s_table, $bdd)
	{

		$req = $bdd->query("SELECT * FROM ".$s_table);
		$array = $req->fetchAll(PDO::FETCH_ASSOC);

		echo"<table>";
		echo"<tr>";
		foreach ($array[0] as $key => $value)
		{
			if ($key != 'password')
			{
			echo "<th>";
			echo $key;
			echo "</th>";
			}
		}
		echo"</tr>";
		foreach ($array as $user)
		{
			echo "<tr>";
			foreach ($user as $key=> $valeur)
			{
				if($key != 'password')
				{
				echo "<td>".$valeur."</td>";
				}
			}
			echo "<td>";

				echo "<form method='POST'>";
				echo "<input id='form_submit' type='submit' name ='Modify' value='Modify'>";
				echo "<input id='form_submit' type='submit' name ='Delete' value='Delete'>";
				echo "<input id='form_submit' type='hidden' name ='id' value='".$user['id']."'>";
				echo "</form>";

			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}








}

 ?>
