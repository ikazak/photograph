<?php //route: coverage/add

//Add codes here...

use Classes\Request;
use Classes\Response;
use Tables\Coverage;

$covname = Request::post("covname");
$price = Request::post("price");
$description = Request::post("description");


if(! $covname){
    Response::code(404)->message("Name is Required")->send();
}
if(!$price){
    Response::code(404)->message("Price is Required")->send();
}
if(!$description){
    Response::code(404)->message("Description is Required")->send();
}


$insert = Coverage::insert([
    "covname" => $covname,
    "price" => $price,
    "description" => $description,
    "available" => "1"
]);

Response::code(200)->message("Data Added Successfully")->send();





?>