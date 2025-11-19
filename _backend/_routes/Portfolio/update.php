<?php 
    //Add codes here...
    $id = post("id");
    $photographer_fname =post("photographer_fname");
    $photographer_lname = post("photographer_lname");
    $type_of_photographer = post("type_of_photographer");
    $photographer_age = post("photographer_age");
    $skills = post("skills");
    

    $update = array(
        "photographer_fname" => $photographer_fname,
        "photographer_lname" => $photographer_lname,
        "type_of_photographer" => $type_of_photographer,
        "photographer_age" => $photographer_age,
        "skills" => $skills,
    );

    $where = array(
        "photographerID" => $id
    );

    $result = execute_update("photographers", $update, $where);

    json_response($result);

?>