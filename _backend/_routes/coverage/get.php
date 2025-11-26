<?php //route: coverage/get

//Add codes here...



use Classes\Request;
use Classes\Response;
use Tables\Customizationpackage;

$coverage = Customizationpackage::getAll(["available"=>1, "category"=>"cov"]);

Response::code(200)->data($coverage)->send();










?>