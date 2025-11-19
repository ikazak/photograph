<?php //route: users/get

//Add codes here...

use Classes\Response;
use Tables\Users;
use Classes\Collection;

$alluser = Users::getAll();
$alluser = Collection::data($alluser)->get(["user_id", "username"])->pack();


Response::code(200)->data($alluser)->send();









?>