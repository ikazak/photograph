<?php //route: coverage/delete

//Add codes here...



use Classes\Request;
use Classes\Response;
use Tables\Coverage;

$id = Request::post("id");

$result = Coverage::update(["id"=>$id], ["available"=>0]);

Response::code(200)->message("Deleted Successfully")->send();









?>