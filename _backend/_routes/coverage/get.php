<?php //route: coverage/get

//Add codes here...



use Classes\Request;
use Classes\Response;
use Tables\Coverage;

$coverage = Coverage::getAll(["available"=>1]);

Response::code(200)->data($coverage)->send();










?>