<?php //route: unavailable/add

//Add codes here...


use Classes\Request;
use Classes\Response;
use Tables\Unavailable;

$photo_id = Request::post("photo_id");
$add_date = Request::post("add_date");
$reason = Request::post("reason");


if(! $photo_id){
    Response::code(404)->message("Photographer ID not found")->send();
}
if(!$add_date){
    Response::code(404)->message("Date not found")->send();
}
if(!$reason){
    Response::code(404)->message("Reason not found")->send();
}

unavailable:: insert([
    "photo_id" => $photo_id,
    "add_date" => $add_date,
    "reason" => $reason
]);


 Response::code(200) -> message("data inserted succesfully") -> send();


?>