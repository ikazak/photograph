<?php 
    //Add codes here...
    $id = post("id");

    $update = array(
        "status" => 0
    );

    $where = array(
        "photographerID" => $id
    );

    $result = execute_update("photographers", $update, $where);

    json_response($result);

?>