
<?php
$hash = password_hash($this->password, PASSWORD_DEFAULT);			
	$this->password = $hash;

?>