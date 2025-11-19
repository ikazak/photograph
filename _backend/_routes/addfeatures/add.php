<?php //route: addfeatures/add

//Add codes here...



use Classes\Request;
use Classes\Response;
use Tables\Additionalfeatures;

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


$insert = Additionalfeatures::insert([
    "fname" => $fname,
    "fprice" => $fprice,
    "description" => $description,
    "available" => "1"
]);

Response::code(200)->message("Data Added Successfully")->send();








?>