<?php
session_start();
function __autoload($class_name)
{
  include_once "../CLASS/".$class_name.'.class.php';
}
include_once('../connect_db.php');
$bdd=connect_db("localhost","root","root","3306","pool_php_rush");
$Users = new UserManager($bdd);
Login::isUserLogged();
Login::isAdmin($bdd);

$firstname ="";
$lastname ="";
$email="";
$age="";

if(isset($_POST['send']))
{
  $user = New User($_POST['lastname'],$_POST['firstname'],$_POST['email'],$_POST['age'],$_POST['password']);
  if($user->validAttributs() == true && $user->confirmPassword($_POST['conf_password']) == true)
  {
    if($user->uniqueEmail($bdd) == true)
    {
      if(isset($_GET['id']))
      {
        $userManager->modify($user);
        header('Location: user_list.php');
      }else{
        $userManager->add($user);
        header('Location: user_list.php');
      }

    }
    else
      echo "This mail is already used, don't be this guy.";
      $firstname =$user->getFirstname();
      $lastname = $user->getLastname();
      $email = $user->getEmail();
      $age = $user->getAge();
  }
}else {
  if(isset($_GET['id']))
  {
    $array_user= $Users->getUserById($_GET['id']);
    if(!$array_user)
    {
      echo "Not such user in database";
      return -1;
    }

    $user = New User($array_user['lastname'],$array_user['firstname'],$array_user['email'],$array_user['age'],$array_user['password']);
    $firstname =$user->getFirstname();
    $lastname = $user->getLastname();
    $email = $user->getEmail();
    $age = $user->getAge();
  }
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>
			Mon index PHP
		</title>
	</head>

	<body>
		<header>

		</header>

		<main>
			<form method="POST">
					<label for="form_firstname">First name</label>
  					<input id="form_firstname" type="text" name="firstname" value="<?php echo $firstname?>"required>

					<label for="form_lastname">Name</label>
  				 	<input id="form_lastname" type="text" name="lastname" value="<?php echo $lastname ?>" required>

  					<label for="form_email">Email</label>
  					<input id="form_email" type="email" name="email"  value="<?php echo $email?>" required>

  					<label for="form_age">Age</label>
  					<input id="form_age" type="number" name="age" value="<?php echo $age ?>" min="3" max="99">

  					<label for="form_passwd">Password</label>
	  				<input id="form_passwd" type="password" name="password" value="" required>

	  				<label for="form_conf_passwd">Password Confirmation</label>
	  				<input id="form_conf_passwd" type="password" name="conf_password" value="" required>

  					<label for="form_submit"></label>
  					<input id="form_submit" type="submit" value="Sign In" name="send">
			</form>
		</main>

		<footer>

		</footer>
	</body>
</html>
