<?php //route: services/get

//Add codes here...

use Classes\Response;
use Tables\Services;
use Classes\File;

$services = Services::getAll(["status"=>1]);
$services = File::encode_blob($services, "img");

Response::code(200)->data($services)->send();


?>