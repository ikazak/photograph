<?php 
    //Add codes here...
    $itemname = post("itemname");
    $rate_of_purchased = post("rate_of_purchased");
    $type = post("type");
    $img = post("img");

    $package_data = array(
        "itemname" => $itemname,
        "rate_of_purchased" => $rate_of_purchased,
        "type" => $type,
        "image" => $img, 
    );

    $package = execute_insert("inventory", $package_data);

    json_response($package);

?>