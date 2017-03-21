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

	if(isset($_GET['order']))
	{
		$order_type=$_GET['order'];
	}else{
		$order_type=0;
	}

	if(isset($_GET['search']))
	{
		$search=$_GET['search'];
	}else{
		$search="";
	}

	if(isset($_GET['category']))
	{
		$category=$_GET['category'];
	}else{
		$category="";
	}


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



    <div class="jumbotron test">
      <div class="container">
        <h1>Besoin d'un moment de détente ? </h1>
        <p>Profitez d'un cigare.</p>
        <a href="#">+ d'infos</a>
      </div>
    </div>

	     <div class="flexbox">
          <main>

<?php
Display::ProductOrderList($productManager,$page,$order_type,$category,$search);
 ?>
      		</main>


          <aside>
					<form method="GET">
						<select name="order" id="order">
							<option value="0" <?php if($order_type == 0){echo "selected";} ?>/> Alphabetically
							<option value="1" <?php if($order_type == 1){echo "selected";} ?>/> reverse Alphabetically
							<option value="2" <?php if($order_type == 2){echo "selected";} ?>/> Increasing price
							<option value="3" <?php if($order_type == 3){echo "selected";} ?>/> Decreasing price
						</select>
					</form>
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
			<script src="reload_select.js"></script>
	</body>
</html>
