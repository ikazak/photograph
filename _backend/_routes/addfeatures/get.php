<?php //route: addfeatures/get

//Add codes here...



use Classes\Request;
use Classes\Response;
use Tables\Additionalfeatures;

$additionalfeatures = Additionalfeatures::getAll(["available"=>1]);

Response::code(200)->data($additionalfeatures)->send();








?>