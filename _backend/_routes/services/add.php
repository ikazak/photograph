<?php //route: services/add

//Add codes here...

use Classes\Request;
use Classes\Response;
use Tables\Services;

$services_name = Request::post("services_name");
$description = Request::post("description");
$img = Request::file("img","blob");

if(! $services_name){
    Response::code(300)-> message("service name is required") -> send();

}
if(! $description){
    Response::code(300)-> message("description is required)") -> send();
}

if(! $img){
    Response::code(300) -> message("image is required") -> send();
}

Services:: insert([
    "services_name" => $services_name,
    "description" => $description,
    "img" => $img
]);


 Response::code(200) -> message("data inserted succesfully") -> send();











?>