<?php 
    //Add codes here...
    $id = post("id");
    $sql = "select * from packages where packageID = $id";

    $result = execute_select($sql);

    json_response($result);

?>