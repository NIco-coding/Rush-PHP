<?php

class ProductManager
{

  private $db;

  public function __construct($s_bdd="")
  {
    $this->db =$s_bdd;
  }

  public function getListProducts()
  {
    $req = $this->db->query("SELECT * FROM products");
    $arr=$req->fetchAll(PDO::FETCH_ASSOC);

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
    $req = $this->db->prepare("SELECT id FROM categories WHERE name=:name");
    $error=$req->execute(array(':name'=>$product->getCategory()));
    $category=$req->fetch();

    $req=$this->db->exec("INSERT INTO products VALUES ('','$product->getName()','$product->getPrice()',".$category['id'].")");

    if(!$error || $req==0)
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

  public function listCategory()
  {
    $req = $this->db->query("SELECT name FROM category");
    $req->fetchAll(PDO::FECTH_ASSOC);

    $array=[];
    foreach ($req as $value) {
      array_push($array,$value['name']);
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
