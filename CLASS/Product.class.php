<?php

class Product
{

  private $name;
  private $price;
  private $category;
  private $array_error;


  public function __construct($s_name="",$s_price="",$s_category="")
  {
    $this->array_error=[];
    if(!($this->setName($s_name)))
      array_push($array_error,array('name'=>'Name not valid.'));
    if(!($this->setPrice($s_price))
      array_push($array_error,array('price'=>'Price not valid.'));
    if(!($this->setPrice($s_category))
      array_push($array_error,array('category'=>'Category not valid.'));

  }

  //****************   SETTER

  public function setName($s_name)
  {
    if($s_name!="" && is_string($s_name))
    {
      $this->name=$s_name;
      return true;
    }else{
      return false;
    }
  }

  public function setPrice($s_price)
  {
    if($s_price!=NULL && is_double($s_price))
    {
      $this->price=$s_price;
      return true;
    }else{
      return false;
    }
  }

  public function setCategory($s_category)
  {
    if($s_name!="" && is_string($s_name))
    {
      $this->price=$s_price;
      return true;
    }else{
      return false;
    }
  }

  //**************** GETTER

  public function getName()
  {
    return $this->name;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function getCategory()
  {
    return $this->category;
  }
  public function getErrors()
  {
    return $this->array_error;
  }


}


 ?>
