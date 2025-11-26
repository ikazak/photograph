<?php //route: addfeatures/add

//Add codes here...



use Classes\Request;
use Classes\Response;
use Tables\Customizationpackage;

$fname = Request::post("fname");
$fprice = Request::post("fprice");
$description = Request::post("description");


if(! $fname){
    Response::code(404)->message("Name is Required")->send();
}
if(!$fprice){
    Response::code(404)->message("Price is Required")->send();
}
if(!$description){
    Response::code(404)->message("Description is Required")->send();
}


$insert = Customizationpackage::insert([
    "name" => $fname,
    "price" => $fprice,
    "description" => $description,
    "available" => "1",
    "category" => "feat"
]);

Response::code(200)->message("Data Added Successfully")->send();








?>