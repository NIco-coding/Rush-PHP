<?php
 function getList($parentId)
{
    $retVal = array($parentId);

    $query = "SELECT * FROM categories WHERE parent_id = ".$parentId;
    $result = $bdd->query($query);

    foreach($result->rows as $row)
    {
        $retVal = array_merge($retVal, getList($row["category_id"]));
    }

    return $retVal;
}
