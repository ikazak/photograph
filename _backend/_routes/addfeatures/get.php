<?php //route: addfeatures/get

//Add codes here...



use Classes\Request;
use Classes\Response;
use Tables\Customizationpackage;

$additionalfeatures = Customizationpackage::getAll(["available"=>1, "category" =>"feat"]);

Response::code(200)->data($additionalfeatures)->send();








?>