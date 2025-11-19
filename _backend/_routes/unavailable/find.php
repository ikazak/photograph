<?php //route: unavailable/find

//Add codes here...
use Classes\Response;
use Classes\Request;
use Tables\Unavailable;


$photo_id = Request::post("photo_id");
$add_date = Request::post("add_date");

$package = Unavailable::findOne([
    "photo_id"=> $photo_id,
    "add_date" => $add_date
]);

if(! $package){
    Response::code(200)->send();
}
else{
    Response::code(400)->send();
}














?>