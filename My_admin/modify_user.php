<?php
session_start();

function __autoload($className)
{
	include('../CLASS/'.$className.".class.php");
}
include_once('../connect_db.php');

$bdd=connect_db("localhost","root","Nagakyotsunaka1","3306","pool_php_rush");
Login::isUserLogged();
Login::isAdmin($bdd);

$modify = new UserManager($bdd);
$array = $modify->getUser($_GET['id']);

if(isset($_POST['send']))
{
  
}

?>

<!Doctype html>
<html>
  <head>
    <title>Home Admin</title>
  </head>
  <body>
    <header>
      <h1> Home Admin>
    </header>
    <main>
      <nav>
        <ul id="first">
          <li>
            <ul id="second">
              <li><h1> USER<h1></li>
              <li><a href ='user_add.php'>Add user</a></li>
              <li><a href ='user_list.php'>Modify user</a></li>
            </ul>
          </li>
          <li>
            <ul id="second">
              <li><h1> Product<h1></li>
              <li><a href ='product_form.php'>Add product</a></li>
              <li><a href ='product_list.php'>Modify product</a></li>
            </ul>
          </li>
      </nav>
    <article>
      <form method="POST">
          <label for="form_firstname">First name</label>
            <input id="form_firstname" type="text" name="firstname" value='<?php echo $array['firstname'] ?>' required> 
          
          <label for="form_lastname">Name</label>
            <input id="form_lastname" type="text" name="lastname" value='<?php echo $array['lastname'] ?>' required> 
            
            <label for="form_email">Email</label>
            <input id="form_email" type="email" name="email" value='<?php echo $array['email'] ?>' required> 
            
            <label for="form_age">Age</label>           
            <input id="form_age" type="number" name="age" min="3" max="99" value='<?php echo $array['age'] ?>' > 
            
            <label for="form_passwd">Password</label>
            <input id="form_passwd" type="password" name="password" value="" required>

            <label for="form_conf_passwd">Password Confirmation</label>
            <input id="form_conf_passwd" type="password" name="conf_password" value="" required>
            
            <label for="form_submit"></label>
            <input id="form_submit" type="submit" value="Modify" name="send"> 
      </form>
    </article>
    </main>
    <footer>
    </footer>
  </body>
</html>