<?php //route: services/getall

//Add codes here...





use Classes\Response;
use Tables\Services;
use Classes\File;

$services = Services::getAll(["status"=>1]);

Response::code(200)->data($services)->send();







?>