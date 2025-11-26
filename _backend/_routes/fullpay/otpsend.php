<?php //route: fullpay/otpsend

//Add codes here...



use Classes\Response;
use Classes\Tyrux;
use Classes\Request;


$phone = Request::post("phoneNum");
$photgrapher = "PHOTOGRAPHER";
$amount = Request::post("amountpay");


if(! $phone){
    Response::code(404)->message("Phone number is required")->send();

}
if(! $amount){
    Response::code(404)->message("amount is required")->send();

}

$post = Tyrux::post([
    "url" => "http://gcashaapp.alwaysdata.net/?be=transaction/prepay",
    "headers" => ["apikey"=>"codetazer"],
    "data" => ["phone"=>$phone,"amount"=>$amount,"merchant"=>"PHOTOGRAPHER"]
]);

if($post['code'] != 200){
    Response::code(400)->message($post['message'])->send();
}

$post['amount'] = $amount;


Response::code(200)->message("OK")->data($post)->send();








?>