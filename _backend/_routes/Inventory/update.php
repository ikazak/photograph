

    <?php 
    //Add codes here...
    $id = post("id");
    $itemname =post("itemname");
    $rateofpurchased = post("rate_of_purchased");
    $type = post("type");
    

    $update = array(
        "itemname" => $itemname,
        "rate_of_purchased" => $rateofpurchased,
        "type" => $type,
        
    );

    $where = array(
        "inventoryID" => $id
    );

    $result = execute_update("inventory", $update, $where);

    json_response($result);

?>
