<?php //route: equipment/delete

//Add codes here...



use Classes\Request;
use Classes\Response;
use Tables\Equipmentsetup;

$id = Request::post("id");

$result = Equipmentsetup::update(["id"=>$id], ["available"=>0]);

Response::code(200)->message("Deleted Successfully")->send();







?>