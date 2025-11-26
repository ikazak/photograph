<?php //route: count/ongoing

//Add codes here...





use Classes\Request;
use Classes\Response;
use Tables\Request_order;


$order = Request_order::count(["status"=>3]);


Response::code(200)->count($order)->send();






?>