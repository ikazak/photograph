<?php 
    //Add codes here...
    $id = post("id");
    $description =post("description");
    $downpayment = post("downpayment");
    $fullpayment = post("fullpayment");
    $packagename = post("packagename");
    $services_name = post("services_name");

    $update = array(
        "services_name" => $services_name,
        "description" => $description,
        "downpayment" => $downpayment,
        "fullpayment" => $fullpayment,
        "packagename" => $packagename
    );

    $where = array(
        "packageID" => $id
    );

    $result = execute_update("packages", $update, $where);

    json_response($result);

?>