<?php //route: payment/pay

//Add codes here...
use Classes\Response;
use Classes\Tyrux;
use Classes\Request;
use Tables\Request_order;

$phone = Request::post("phoneNumber");
$merchant = "PHOTOGRAPHER";
$amount = Request::post("amount");
$mynumber = "9921548750";
$otp = Request::post("otp");


if (! $phone) {
    Response::code(404)->message("phone number is required")->send();
}

if (! $amount) {
    Response::code(404)->message("amount is required")->send();
}

if (! $otp) {
    Response::code(404)->message("please enter your otp")->send();
}

$post = Tyrux::post([
    "url" => "http://gcashaapp.alwaysdata.net/?be=transaction/prepay?ptype=postpayment",
    "headers" => ["apikey" => "codetazer"],
    "data" => [
        "phone" => $phone,
        "amount" => floatval($amount),
        "merchant" => "PHOTOGRAPHER",
        "mynumber" => $mynumber,
        "otp" => $otp

    ]
]);

$id = Request::post("id");

$status = Request_order::update(["id"=>$id], ["status"=>3]);



if ($post['code'] != 200) {
    Response::code(400)->message($post['message'])->text($phone)->send();
}

Response::code(200)->message("OK")->data($post)->send();

?>