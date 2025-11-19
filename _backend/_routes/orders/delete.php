<?php //route: orders/delete

//Add codes here...

use Classes\Request;
use Classes\Response;
use Tables\Request_order;

$id = Request::post("id");

$result = Request_order::delete(["id"=>$id]);

Response::code(200)->message("Cancel Order Successfully")->var(["deleted"=>$result])->send();




?>