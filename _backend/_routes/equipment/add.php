<?php //route: equipment/add

//Add codes here...

use Classes\Request;
use Classes\Response;
use Tables\Equipmentsetup;

$name = Request::post("name");
$price = Request::post("price");
$description = Request::post("description");


if(! $name){
    Response::code(404)->message("Name is Required")->send();
}
if(!$price){
    Response::code(404)->message("Price is Required")->send();
}
if(!$description){
    Response::code(404)->message("Description is Required")->send();
}


$insert = Equipmentsetup::insert([
    "name" => $name,
    "price" => $price,
    "description" => $description,
    "available" => "1"
]);

Response::code(200)->message("Data Added Successfully")->send();



?>