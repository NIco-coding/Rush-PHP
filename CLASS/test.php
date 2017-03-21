<?php
session_start();


include_once("User.class.php");
include_once("../connect_db.php");

$bdd=connect_db("localhost","root","root","3306","pool_php_rush");

$req=$bdd->query("SELECT * FROM categories");
$res=$req->fetchAll(PDO::FETCH_ASSOC);

function make_categories(&$list,$parent_id = 0)
{
    $result = array();
    foreach ($list as $key => $value)
    {
        if( $value['parent_id'] == $parent_id )
        {
            $value['childs'] = make_categories($list, $value['id']);
            $result[] = $value;
        }
    }
    return $result;
}

function print_categories(&$list, $parent_id = 0,$id=1)
{
    $flag = false;
      echo "<form method='POST'>";
    foreach ($list as $key => $value)
    {
        if( $value['parent_id'] == $parent_id )
        {
            if( $flag == false )
            {
                echo "<ul class='cont_$id'>";
                $flag = true;
            }
           echo "<li><label for=cat_'".$value['id']."'>". $value['name'] . "<input type='hidden' name='cat_'".$value['id']."'value='".$value['id']."'></label></li>";
             if ($value['childs'])
                print_categories($value['childs'], $value['id'],$id++);
        }
    }
    if( $flag)
    {
        echo '</ul>';
    }
      echo '</form>';


}

$test=make_categories($res,0);
print_categories($test,0);

?>
