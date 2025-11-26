<?php //route: preevent/add

//Add codes here...


use Classes\Request;
use Classes\Response;
use Tables\Customizationpackage;

$prename = Request::post("prename");
$preprice = Request::post("preprice");
$predescription = Request::post("predescription");


if(! $prename){
    Response::code(404)->message("Name is Required")->send();
}
if(!$preprice){
    Response::code(404)->message("Price is Required")->send();
}
if(!$predescription){
    Response::code(404)->message("Description is Required")->send();
}


$insert = Customizationpackage::insert([
    "name" => $prename,
    "price" => $preprice,
    "description" => $predescription,
    "available" => "1",
    "category" => "pre"
]);

Response::code(200)->message("Data Added Successfully")->send();









?>