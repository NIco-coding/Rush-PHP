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
