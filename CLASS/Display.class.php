<<<<<<< HEAD
<?php
abstract class Display
{

  public static function rowAllTable($Table)
  {

      echo "<table><tr>";
      foreach ($Table[0] as $key=>$value)
      {
        if($key!='password')
          echo "<th> $key </th>";
      }
      echo "<tr>";

    foreach($Table as $line)
    {
      echo "<tr>";
      foreach ($line as $key=>$value)
      {
        if($key!='password')
          echo "<td> $value </td>";
      }
      echo "<td><form method='Post'>";
      echo "<input type='submit' name='send_modify' value='Modify'>";
      echo "<input type='submit' name='send_delete' value='Delete'>";
      echo"<input type='hidden' name='id' value=".$line['id']."></form>";
      echo "<tr>";
    }
    echo "</table>";

  }
}
 ?>
=======
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
>>>>>>> origin
