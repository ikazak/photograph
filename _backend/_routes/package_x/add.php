<?php 
    //Add codes here...
    $description = post("description");
    $downpayment = post("downpayment");
    $fullpayment = post("fullpayment");
    $package_name = post("package_name");
    $services_name = post("services_name");
    $img = post("img");

    $package_data = array(
        "serviceID" => $service_id,
        "services_name" => $services_name,
        "packagename" => $package_name,
        "description" => $description,
        "downpayment" => $downpayment,
        "fullpayment" => $fullpayment,
        "image" => $img,
        "date_modified" => now() 
    );

    $package = execute_insert("packages", $package_data);

    json_response($package);

?>