<?php //route: orders/update_ongoing

//Add codes here...




use Classes\Request;
use Classes\Response;
use Tables\Request_order;

$id = Request::post("id");

$status = Request_order::update(["id"=>$id], ["status"=>4]);

Response::code(200)->data($status)->text($id)->send();







?>