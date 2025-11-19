<?php 
    //Add codes here...
    $id = post("id");
    $sql = "select * from inventory where inventoryID = $id";

    $result = execute_select($sql);

    json_response($result);

?>