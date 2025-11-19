<?php //route: orders/delete

//Add codes here...

use Classes\Request;
use Classes\Response;
use Tables\Request_order;
use Tables\Users;
use Classes\File;
use Classes\Mail;

$id = Request::post("id");

$reqorder = Request_order::findOne(["id"=>$id]);

$custid = $reqorder['customer'];

$findCust = Users::findOne(["user_id"=>$custid]);
$findCust = File::encode_blob($findCust, "img");

$email = $findCust['username'];

$result = Request_order::delete(["id"=>$id]);

Mail::send_email($email, "Pphotography", "Your Request Has Been Rejected");


Response::code(200)->message("Order Rejected")->var(["deleted"=>$result])->send();




?>