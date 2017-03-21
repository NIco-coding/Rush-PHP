<?php
session_start();


include_once("User.class.php");
include_once("../connect_db.php");

$bdd=connect_db("localhost","root","root","3306","pool_php_rush");
function print_categories(&$list, $parent_id = 0)
{
    $flag = false;
    foreach($list as $value)
    {
        if( $value['parent_id'] == $parent_id )
        {
            if( $flag == false )
            {
                echo '<ul>';
                $flag = true;
            }
           echo "<li><a href='admin_p_create_categories.php?id=" . $value['id'] . "'>" . $value['name'] . "</a></li>";
             if ($value['childs'])
                print_categories($value['childs'], $value['id']);
        }
    }
    if( $flag)
    {
        echo '</ul>';
    }

}

//...............................................................................

function make_categories(&$list,$parent_id = 0)
{
    $result = array();
    foreach( $list as $value )
    {
        if( $value['parent_id'] == $parent_id )
        {
            $value['childs'] = make_categories($list, $value['id']);
            $result[] = $value;
        }
    }
    return $result;
}
$req = $bdd->query("SELECT * FROM categories");
$res=$req->fetchAll(PDO::FETCH_ASSOC);

$arr=make_categories($res);
print_categories($arr);
