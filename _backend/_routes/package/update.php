<?php //route: package/update

//Add codes here...

use Classes\Response;
use Classes\Request;
use Tables\Package;


$packageName = Request::post("packageName");
$promoPrice = Request::post("promoPrice");
$regularPrice = Request::post("regularPrice");
$downpayment = Request::post("downpayment");
$inclusions = Request::post("inclusions");
$packageID =Request::post("packageID");

if(! $packageName){
    Response::code(300)-> message("Package name is required") -> send();

}
if(! $promoPrice){
    Response::code(300)-> message("Promo Price is required)") -> send();
}

if(! $regularPrice){
    Response::code(300)-> message("Regular Price is required)") -> send();
}

if(! $downpayment){
    Response::code(300)-> message("Down payment is required)") -> send();
}

if(! $inclusions){
    Response::code(300)-> message("Inclusions is required)") -> send();
}

if(! $packageID){
    Response::code(300) -> message("id is required") -> send();
}

Package:: update(
[
    "packageID" => $packageID
],
[
    "packageName" => $packageName,
    "promoPrice" => $promoPrice,
    "regularPrice" => $regularPrice,
    "downpayment" => $downpayment,
    "inclusions" => $inclusions,
    
]);

 Response::code(200) -> message("data inserted succesfully") -> send();









?>