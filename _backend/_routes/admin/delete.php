<?php //route: admin/delete

//Add codes here...

use Classes\Response;
use Classes\Request;
use Tables\Users;

$user_id = Request::post("user_id");

if(! $user_id){
    Response::code(300) -> message("id is required") -> send();
}

Users::delete([
    "user_id" => $user_id
]);

Response::code(200) -> message("deleted successfully") -> send();









?>