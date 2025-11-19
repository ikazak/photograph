<?php //route: package/add

//Add codes here...

use Classes\Request;
use Classes\Response;
use Tables\Package;

$packageName = Request::post("packageName");
$promoPrice = Request::post("promoPrice");
$regularPrice = Request::post("regularPrice");
$downpayment = Request::post("downpayment");
$inclusions = Request::post("inclusions");
$service_id = Request::post("service_id");


if(! $service_id){
    Response::code(404)->message("Service ID not found")->send();
}
if(!$packageName){
    Response::code(404)->message("Package name not found")->send();
}
if(!$promoPrice){
    Response::code(404)->message("Promo price not found")->send();
}
if(!$regularPrice){
    Response::code(404)->message("Regular price not found")->send();
}
if(!$downpayment){
    Response::code(404)->message("downpayment not found")->send();
}
if(!$inclusions){
    Response::code(404)->message("inclusions price not found")->send();
}

$find = Package::findOne(["package_name"=>$packageName, "service_id"=>$service_id]);
if($find){
    Response::code(101)->message("Package name already exist")->send();
}

$exp = explode(",", $inclusions);
$inclusions = "";
foreach($exp as $e){
    $inclusions .= "<li>".$e."</li>";
}

$insert = Package::insert([
    "service_id" => $service_id,
    "package_name" => $packageName,
    "original" => $regularPrice,
    "price" => $promoPrice,
    "downpayment" => $downpayment,
    "description" => $inclusions,
    "available" => 1,
    "date" => now()
]);

Response::code(200)->message("Data inserted Successfully")->send();



?>