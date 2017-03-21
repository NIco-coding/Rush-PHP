<?php

abstract class Display
{

	static function createTables($s_table, $bdd)
	{
		if($s_table!="products")
		{
			$req = $bdd->query("SELECT * FROM ".$s_table);
			$array = $req->fetchAll(PDO::FETCH_ASSOC);
		}else{
			$req = $bdd->query("SELECT products.id as 'id',products.name as 'name',price,categories.name as 'category' FROM ".$s_table." INNER JOIN categories ON ".$s_table.".category_id=categories.id");
			$array = $req->fetchAll(PDO::FETCH_ASSOC);
		}



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

	public static function ProductOrderList($req,$page,$order_type="")
	{
		$product_by_page= 9;
		$limit_sup = ($page+1)*$product_by_page;
		$limit_inf = ($page)*$product_by_page;
		$order_sens="";
		$order_type="";

		switch ($order_type) {
			case 0://alpha ASC
			$order_sens="ASC";
			$order_type="name";
				break;
			case 1://alpha DESC
			$order_sens="DESC";
			$order_type="name";
				break;
			case 2://price ASC
			$order_sens="ASC";
			$order_type="price";
				break;
			case 3://price DESC
			$order_sens="DESC";
			$order_type="price";
				break;

			default:
			$order_sens="ASC";
			$order_type="name";
				break;
		}

		$products=$req->getProductOrderBy($order_type,$order_sens,$limit_inf,$limit_sup);

		$count_by_line=0;
		foreach ($products as  $product) {
			if($count_by_line == 0)
			{
				echo "<section>";
			}

			echo "<article>";
			echo "<h1> ".$product['name']."</h1>";
			echo "<img ref='img-s-".$product['id'].".jpg' />";
			echo "<p> ".$product['price']."</p>";
			echo "</article>";
			$count_by_line=$count_by_line+1;
			if($count_by_line == 3)
			{
				$count_by_line=0;
				echo "</section>";
			}

			}

			if($count_by_line != 0)
			{
				echo "</section>";
			}

		}






}

 ?>
