<?php //route: bookpack/add

//Add codes here...



use Classes\Request;
use Classes\Response;
use Tables\Package;
use Classes\Random;
use Tables\Request_order;


$service_id = Request::post("services");
$photgrapher = Request::post("photgrapher");
$packages = Request::post("packages");
$location = Request::post("location");
$services = Request::post("services");
$date_time = Request::post("date_time");
$addhrs = Request::post("addhrs");
$addshooter = Request::post("addshooter");
$extraphot = Request::post("extraphot");
$customer =Request::post("customer");
$total = Request::post("total");


if(! $photgrapher){
    Response::code(404)->message("Photgrapher ID not found")->send();
}
if(!$packages){
    Response::code(404)->message("Packages name not found")->send();
}
if(!$location){
    Response::code(404)->message("location not found")->send();
}
if(!$services){
    Response::code(404)->message("services not found")->send();
}
if(!$date_time){
    Response::code(404)->message("date_time not found")->send();
}
if(!$addhrs){
    Response::code(404)->message("Hours not found")->send();
}


if(!$addshooter){
    Response::code(404)->message("addshooter not found")->send();
}
if(!$extraphot){
    Response::code(404)->message("extraphot not found")->send();
}

$inclusions = "";
foreach($packages as $e){
    $inclusions .= "<li>".$e."</li>";
}

$insert = Package::insert([
    "service_id" => $service_id,
    "description" => $inclusions,
    "available" => 1,
    "date" => now(),
    "original" => $total,
    "price" => $total,
    "downpayment" => "500",
    "package_name" => "customization"
]);


$packageID = $insert->_id();

Request_order::insert([
    "photographer" => $photgrapher,
    "package" => $packageID,
    "customer" => $customer,
    "date_time" => $date_time,
    "location" => $location,
]);


Response::code(200)->message("Data inserted Successfully")->send();





?>