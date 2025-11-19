<?php 
    //Add codes here...
    $id = post("id");

    $update = array(
        "status" => 0
    );

    $where = array(
        "inventoryID" => $id
    );

    $result = execute_update("inventory", $update, $where);

    json_response($result);

?>