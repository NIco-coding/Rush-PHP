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

	public static function ProductOrderList($req,$page,$order_type,$by_cat="",$by_search="")
{
    $product_by_page= 9;
    $limit_sup = ($page+1)*$product_by_page;
    $limit_inf = ($page)*$product_by_page;
    $order_sens="";
    $order="";

    switch ($order_type) {
        case 0://alpha ASC
        $order_sens="ASC";
        $order="prodName";
            break;
        case 1://alpha DESC
        $order_sens="DESC";
        $order="prodName";
            break;
        case 2://price ASC
        $order_sens="ASC";
        $order="price";
            break;
        case 3://price DESC
        $order_sens="DESC";
        $order="price";
            break;

        default:
        $order_sens="ASC";
        $order="prodName";
            break;
    }
    $order_str=$order." ".$order_sens;

    if($by_cat=="" && $by_search=="")
    $str_search="";
    elseif( $by_search=="")
    $str_search="WHERE (categories.id=$by_cat OR categories.parent_id=$by_cat)";
    elseif( $by_cat=="")
    $str_search="WHERE LOWER(CONCAT(categories.name,products.name)) LIKE LOWER('%$by_search%')";
    else {
    $str_search ="WHERE LOWER(CONCAT(categories.name,products.name)) LIKE LOWER('%$by_search%') AND (categories.id=$by_cat OR categories.parent_id=$by_cat)";
    }

    $products=$req->getProductOrderBy($order_str,$str_search,$limit_inf,$limit_sup);
    $count_by_line=0;

    if(!$products || empty($products))
    {
        echo "<p>No result</p>";
        return false;
    }

    foreach ($products as  $product) {
        if($count_by_line == 0)
        {
            echo "<section>";
        }

        echo "<article>";
        echo "<h1> ".$product['prodName']."</h1>";
        echo "<img ref='img-s-".$product['prodId'].".jpg' />";
        echo "<p> ".$product['price']." ¥</p>";
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
