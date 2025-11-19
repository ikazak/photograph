<?php //route: preevent/get

//Add codes here...

use Classes\Response;
use Classes\Request;
use Tables\Preeventsession;


$preeventsession = Preeventsession::getAll(["available" => 1]);
Response::code(200)->data($preeventsession)->send();



?>