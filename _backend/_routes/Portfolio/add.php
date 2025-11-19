<?php 
    //Add codes here...
    $photographer_fname = post("photographer_fname");
    $photographer_lname = post("photographer_lname");
    $type_of_photographer = post("type_of_photographer");
    $photographer_age = post("photographer_age");
    $skills = post("skills");
    $photographer_email = post("photographer_email");
    $photographer_password = post("photographer_password");
    $img = post("img");

    $package_data = array(
        "photographer_fname" => $photographer_fname,
        "photographer_lname" => $photographer_lname,
        "type_of_photographer" => $type_of_photographer,
        "photographer_age" => $photographer_age,
        "photographer_email" => $photographer_email,
        "photographer_password" => $photographer_password,
        "photographer_image" => $img,
         
    );

    $package = execute_insert("photographers", $package_data);

    json_response($package);

?>