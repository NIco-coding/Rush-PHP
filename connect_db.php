<?php
function connect_db($host, $username, $passwd, $port, $db)
{
  try
  {
      $bdd = new PDO ('mysql:'.$host.';host='.$port.';dbname='.$db,$username,$passwd);
      return $bdd;
  }
  catch(PDOException $e)
  {
    error_log($e->getMessage()."\n",3,ERROR_LOG_FILE);
    echo "PDO ERROR: ".$e->getMessage()." storage in ".ERROR_LOG_FILE.".\n";
    return false;
  }

}
 ?>
