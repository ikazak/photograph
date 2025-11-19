<?php //route: package/get

//Add codes here...

use Classes\Request;
use Classes\Response;
use Tables\Package;

$id = Request::post("id");

$package = Package::find(["service_id"=>$id, "available"=>1]);

Response::code(200)->data($package)->text($id)->send();



?>