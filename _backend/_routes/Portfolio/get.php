<?php 
    //Add codes here...
    $id = post("id");
    $sql = "select * from photographers where photographerID = $id";

    $result = execute_select($sql);

    json_response($result);

?>