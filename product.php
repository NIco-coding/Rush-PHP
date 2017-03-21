<?php
include_once('start_file.php');
$productManager = new ProductManager($bdd);
	if(isset($_POST['send']))
	{
		Login::logout();
		header('Location: login.php');
	}

	if(isset($_GET['page']))
	{
		$page=$_GET['page'];
	}else{
		$page=0;
	}
	$order_type=0;
?>

<!DOCTYPE HTML PUBLIC ".//W3C//DTD XHTML 1.0 Transitional//EN" "http.www.w3c.org/TR/html/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>
			My Cigars
		</title>
    <meta name="description" content="Vente de produit"/>
    <meta name="author" content="Vente de produit"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
	</head>

	<body>
		<header class="header">
      <h1 class="h1"> Cuba's spirit</h1>
      <nav class="nav">
        <div class="container">
          <ul class="left-nav pull-left">
            <li> <a href="index.php" class="btn btn-primary">Home</a></li>
             <li> <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
             <input type="search" placeholder="Search here" name="the_search">
              </li>
          </ul>

          <ul class="right-nav pull-right">
            <li> <a href="inscription.php" class="btn btn-success"> Sign In </a></li>
            <li> <a href="login.php" class="btn btn-info">Log In </a></li>
            <li> <form method="POST">
                  <label for="form_submit"></label>
                  <input class="btn btn-danger" id="form_submit" type="submit" name ="send" value="Logout"></li>
                 </form>
          </ul>
        </div>
      </nav>

		</header>



    <div class="container">
    <div class="jumbotron">
      <div class="subjumbo test">
            <div class="container body_container">
              <h1>Besoin d'un moment de détente ? </h1>
              <p>Profitez d'un cigare.</p>
              <a href="#">+ d'infos</a>
            </div>
      </div>
    </div>
    </div>
    </div>

	     <div class="flexbox">
          <main>
<?php
Display::ProductOrderList($productManager,$page,$order_type);
 ?>
      		</main>


          <aside>
          <ul>
              <li>Catégorie 1
            <select>
                <ul>
            <option><li>Sous-Catégorie 1</li></option>
            <option><li>Sous-Catégorie 2</li></option>
            <option><li>Sous-Catégorie 3</li></option>
            <option><li>Sous-Catégorie 4</li></option>
                </ul>
            </select>
              </li>
              <li>Catégorie 2
            <select>
                <ul>
            <option><li>Sous-Catégorie 1</li></option>
            <option><li>Sous-Catégorie 2</li></option>
            <option><li>Sous-Catégorie 3</li></option>
            <option><li>Sous-Catégorie 4</li></option>
                </ul>
            </select>
              </li>
              <li>Catégorie 3
            <select>
                <ul>
            <option><li>Sous-Catégorie 1</li></option>
            <option><li>Sous-Catégorie 2</li></option>
            <option><li>Sous-Catégorie 3</li></option>
            <option><li>Sous-Catégorie 4</li></option>
                </ul>
            </select>
              </li>
              <li>Catégorie 4
            <select>
                <ul>
            <option><li>Sous-Catégorie 1</li></option>
            <option><li>Sous-Catégorie 2</li></option>
            <option><li>Sous-Catégorie 3</li></option>
            <option><li>Sous-Catégorie 4</li></option>
                </ul>
            </select>
              </li>
              <li>Catégorie 5
            <select>
                <ul>
            <option><li>Sous-Catégorie 1</li></option>
            <option><li>Sous-Catégorie 2</li></option>
            <option><li>Sous-Catégorie 3</li></option>
            <option><li>Sous-Catégorie 4</li></option>
                </ul>
            </select>
              </li>
              <li>Catégorie 6
            <select>
                <ul>
            <option><li>Sous-Catégorie 1</li></option>
            <option><li>Sous-Catégorie 2</li></option>
            <option><li>Sous-Catégorie 3</li></option>
            <option><li>Sous-Catégorie 4</li></option>
                </ul>
            </select>
              </li>
          </ul>
          </aside>
		</div>

    <footer>
			<p>MyCigars - 60, avenue des Champs-Elysées - 01.25.24.28.27</p>
		</footer>
	</body>
</html>
