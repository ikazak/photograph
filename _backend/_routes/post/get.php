<?php //route: post/get

//Add codes here...

use Classes\File;
use Classes\Response;
use Tables\Upload_img;
use Classes\Request;

$category = Request::get("category");
$id = Request::get("id");

$upload_img = Upload_img::find(["category"=>$category,"user_id"=>$id]);
$upload_img = File::encode_blob($upload_img, "img");

Response::code(200)->data($upload_img)->send();

?>