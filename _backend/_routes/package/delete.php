<?php //route: package/delete

//Add codes here...
use Classes\Request;
use Classes\Response;
use Tables\Package;

$id = Request::post("id");

$result = Package::update(["id"=>$id], ["available"=>0]);

Response::code(200)->message("Deleted Successfully")->send();






?>