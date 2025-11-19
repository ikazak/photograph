<?php 
    //Add codes here...

    $sql = "SELECT * FROM `packages` where status = 1";

    $result = execute_select($sql);
    json_response($result);


?>