<?php //route: addfeatures/delete

//Add codes here...




use Classes\Request;
use Classes\Response;
use Tables\Additionalfeatures;

$id = Request::post("id");

$result = Additionalfeatures::update(["id"=>$id], ["available"=>0]);

Response::code(200)->message("Deleted Successfully")->send();







?>