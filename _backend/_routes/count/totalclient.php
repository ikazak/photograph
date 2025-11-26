<?php //route: count/totalclient

//Add codes here...


use Classes\Request;
use Classes\Response;
use Tables\Request_order;


$order = Request_order::count();


Response::code(200)->count($order)->send();



?>