<?php //route: customizationpack/get

//Add codes here...



use Classes\Request;
use Classes\Response;
use Tables\Customizationpackage;

$custpack = Customizationpackage::getAll(["available"=>1]);

Response::code(200)->data($custpack)->send();








?>