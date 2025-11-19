<?php //route: customer/getbyid

//Add codes here...

use Classes\File;
use Classes\Request;
use Classes\Response;
use Tables\Users;

$id =  Request::post("id");

$users = Users::findOne(["user_id"=>$id]);
$users = File::encode_blob($users, "img");

Response::code(200)->data($users)->send();









?>