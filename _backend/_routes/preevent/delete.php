<?php //route: preevent/delete

//Add codes here...


use Classes\Request;
use Classes\Response;
use Tables\Preeventsession;

$id = Request::post("id");

$result = Preeventsession::update(["id"=>$id], ["available"=>0]);

Response::code(200)->message("Deleted Successfully")->send();




?>