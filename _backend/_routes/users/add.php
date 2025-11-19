<?php //route: users/add

//Add codes here...

use Classes\Request;
use Classes\Response;
use Classes\Validator;
use Tables\Users;


//Mga required
$username = Validator::post("username")->required()->label("Imo username")->email()->run();
$password = Validator::post("password")->required()->label("Imo Password")->min(8)->run();
$name =  Validator::post("name")->min(5)->required()->run();
$status = Validator::post("status")->required()->run();

//Mga indi required
$contact = Request::post("contact");
$address = Request::post("address");
 
if(Validator::failed()){
    $errors = Validator::errors();
    Response::code(101)->errors($errors)->send();
}

$result = Users::create([
    "username" => $username,
    "password" => $password,
    "name" => $name,
    "status" => $status,
    "contact" => $contact,
    "address" => $contact
]);
 
Response::code(200)->message("OK")->send();









?>