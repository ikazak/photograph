<?php //route: admin/get

//Add codes here...

use Classes\Response;
use Tables\Users;
use Classes\File;
use Tables\Photographers;

$users = users::getAll(["status"=>"Photographer"]);
$users = File::encode_blob($users, "img");

Response::code(200)->data($users)->send();

?>