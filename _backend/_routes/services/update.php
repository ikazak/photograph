<?php //route: services/update

//Add codes here...


use Classes\Request;
use Classes\Response;
use Tables\Services;

$services_name = Request::post("services_name");
$description = Request::post("description");
$img = Request::file("img","blob");
$servicesID =Request::post("sevicesID");

if(! $services_name){
    Response::code(300)-> message("service name is required") -> send();

}
if(! $description){
    Response::code(300)-> message("description is required)") -> send();
}


if(! $servicesID){
    Response::code(300) -> message("id is required") -> send();
}

Services:: update(
[
    "servicesID" => $servicesID
],
[
    "services_name" => $services_name,
    "description" => $description,
    "img" => $img
]);


 Response::code(200) -> message("data inserted succesfully") -> send();





?>