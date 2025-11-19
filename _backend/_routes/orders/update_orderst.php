<?php //route: orders/update_sta

//Add codes here...

use Classes\Request;
use Classes\Response;
use Tables\Request_order;

$id = Request::post("id");

$status = Request_order::update(["id"=>$id], ["status"=>3]);

Response::code(200)->data($status)->text($id)->send();


?>