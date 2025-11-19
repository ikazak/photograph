<?php //route: services/delete

//Add codes here...


use Classes\Request;
use Classes\Response;
use Tables\Services;

$servicesID = Request::post("servicesID");

if(! $servicesID){
    Response::code(300) -> message("id is required") -> send();
}

Services::delete([
    "servicesID" => $servicesID
]);

Response::code(200) -> message("deleted successfully") -> send();






?>