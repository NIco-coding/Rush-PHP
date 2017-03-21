<?php
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
           echo "<li><a class='cat' href=" . $value['id'] . ">" . $value['name'] . "</a></li>";
             if ($value['childs'])
                print_categories($value['childs'], $value['id']);
        }
    }
    if( $flag)
    {
        echo '</ul>';
    }

}



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
