<?php

class ProductManager
{

  private $db;

  public function __construct($s_bdd="")
  {
    $this->db =$s_bdd;
  }

  public function getProductById($s_id)
  {
    $req = $this->db->query("SELECT * FROM products WHERE id=".$s_id);
    $arr=$req->fetchAll(PDO::FETCH_ASSOC);
    if(count($arr) == 0)
      return false;
    else
      return $arr;
  }

  public function getProductOrderBy($str_order,$str_search,$limit_inf,$limit_sup)
  {
      $req = $this->db->query("(SELECT products.id as'prodId', products.name as 'prodName', price, categories.id as 'catId',
      categories.name as 'catName',parent_id
      FROM products INNER JOIN categories ON products.category_id=categories.id
      $str_search ORDER BY $str_order)LIMIT $limit_inf,$limit_sup");
      $arr=$req->fetchAll(PDO::FETCH_ASSOC);
      if(count($arr) == 0)
        return false;
      else
        return $arr;

  }




  public function  update($s_name,$s_price, $s_category,$s_id)
  {
    $req=$this->db->prepare("UPDATE products SET name =:name, price =:price, category_id =:category WHERE id =:id");
    $test=$req->execute(array(
			':name'=>$s_name,
			':price'=>$s_price,
			':category'=>$s_category,
      ':id'=>$s_id));

    if($test == 0)
      return false;
    else
      return true;
  }
  public function getListProducts()
  {
    $req = $this->db->query("SELECT * FROM products");
    $arr=$req->fetch(PDO::FETCH_ASSOC);

    return $arr;

  }

  public function deleteProductById($s_id)
  {
    $req = $this->db->exec("DELETE FROM products WHERE id=".$s_id);
    if($req == 0)
      return false;
    else
      return true;

  }

  public function addProduct(Product $product)
  {
    $req=$this->db->prepare("INSERT INTO products VALUES ('',:name,:price,:category)");
    $test=$req->execute(array(':name'=>$product->getName(),':price'=>$product->getPrice(),'category'=>$product->getCategory()));
    if(!$test)
      return false;
    else
      return true;
  }

  public function categoryExist($s_category)
  {
    $req = $this->db->prepare("SELECT name FROM category WHERE name= :category");
    $exec = $req->execute(array(':category'=>$s_category));
    $res = $req->fetchAll();

    if(count($res)>0)
      return true;
    else
      return false;
  }
  public function categoryParentExist($s_category,$s_parent)
  {
    $req = $this->db->prepare("SELECT name FROM category WHERE name= :category AND parent_id=:parent");
    $exec = $req->execute(array(':category'=>$s_category,':parent'=>$s_parent));
    $res = $req->fetchAll();

    if(count($res)>0)
      return true;
    else
      return false;
  }

  public function addCategory($name,$parent)
  {
    $req = $this->db->exec("INSERT INTO categories VALUES ('','$name','$parent')");

    if(count($req)>0)
      return true;
    else
      return false;
  }
  public function getAllCategory()
  {

      $req = $this->db->query("SELECT * FROM categories");
      $res=$req->fetchAll(PDO::FETCH_ASSOC);

    if($req)
    {
      return $res;
    }else{
      return false;
    }
  }

  public function listCategory()
  {

      $req = $this->db->query("SELECT id,name FROM categories");
      $res=$req->fetchAll(PDO::FETCH_ASSOC);


    $array=[];
    foreach ($res as $value) {
      array_push($array,array($value['id']=>$value['name']));
    }

    if($req)
    {
      return $array;
    }else{
      return false;
    }
  }

}

 ?>
