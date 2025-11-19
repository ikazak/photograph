<?php //route: payment/otp

//Add codes here...



use Classes\Response;
use Classes\Tyrux;
use Classes\Request;


$phone = Request::post("phoneNumber");
$photgrapher = "PHOTOGRAPHER";
$amount = Request::post("amount");


if(! $phone){
    Response::code(404)->message("Phone number is required")->send();

}
if(! $amount){
    Response::code(404)->message("amount is required")->send();

}

$post = Tyrux::post([
    "url" => "http://gcash.alwaysdata.net/?be=transaction/prepay",
    "headers" => ["apikey"=>"yt763d435436fcfgcv3654v"],
    "data" => ["phone"=>$phone,"amount"=>$amount,"merchant"=>"PHOTOGRAPHER"]
]);

if($post['code'] != 200){
    Response::code(400)->message($post['message'])->send();
}

$post['amount'] = $amount;


Response::code(200)->message("OK")->data($post)->send();










?>