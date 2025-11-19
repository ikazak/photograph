<?php //route: orders/add

//Add codes here...

use Classes\Request;
use Classes\Response;
use Tables\Request_order;


$packname = Request::post("packname");
$packid = Request::post("packid");
$packprice = Request::post("packprice");
$packdp = Request::post("packdp");
$phname = Request::post("phname");
$phid = Request::post("phid");
$date = Request::post("date");
$time = Request::post("time");
$location = Request::post("location");
$customer = Request::post("customer");


if (! $packname) {
    Response::code(300)->message("Package name is required")->send();
}
if (! $packid) {
    Response::code(300)->message("package ID is required)")->send();
}

if (! $packprice) {
    Response::code(300)->message("price is required")->send();
}
if (! $packdp) {
    Response::code(300)->message("down payment is required)")->send();
}
if (! $phname) {
    Response::code(300)->message("photographer name is required")->send();
}
if (! $phid) {
    Response::code(300)->message("photographer ID is required)")->send();
}

if (! $date) {
    Response::code(300)->message("date is required")->send();
}
if (! $time) {
    Response::code(300)->message("time is required)")->send();
}

if (! $location) {
    Response::code(300)->message("location is required")->send();
}
if (! $customer) {
    Response::code(300)->message("customer id is required)")->send();
}



Request_order::insert([
    "photographer" => $phid,
    "package" => $packid,
    "customer" => $customer,
    "date_time" => $date." ".$time,
    "location" => $location,
]);




Response::code(200)->message("data inserted succesfully")->send();
