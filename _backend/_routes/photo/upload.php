<?php //route: photo/upload

//Add codes here...
use Classes\Request;
use Classes\Response;
use Tables\Upload_img;

$img = Request::file("img","blob");
$category = Request::post("category");
$user_id = Request::post("user_id");


if(!$img){
    Response::code(404)->message("IMG not found")->send();
}



$insert = Upload_img::insert([
    "img" => $img,
    "category" => $category,
    "user_id" => $user_id
]);

Response::code(200)->message("Data inserted Successfully")->send();
?>