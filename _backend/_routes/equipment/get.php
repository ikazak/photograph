<?php //route: equipment/get

//Add codes here...


use Classes\Request;
use Classes\Response;
use Tables\Equipmentsetup;

$equipmentsetup = Equipmentsetup::getAll(["available"=>1]);

Response::code(200)->data($equipmentsetup)->send();



?>