<?php 
    //Add codes here...
    $id = post("id");

    $update = array(
        "status" => 0
    );

    $where = array(
        "packageID" => $id
    );

    $result = execute_update("packages", $update, $where);

    json_response($result);

?>