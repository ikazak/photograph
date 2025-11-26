<?php //route: preevent/get

//Add codes here...

use Classes\Response;
use Classes\Request;
use Tables\Customizationpackage;


$preeventsession = Customizationpackage::getAll(["available" => 1, "category"=> "pre"]);
Response::code(200)->data($preeventsession)->send();



?>