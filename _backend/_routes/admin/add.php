<?php
// add codes here...

use Classes\Request;
use Classes\Response;
use Tables\Users;
use Classes\Mail;
use Classes\Random;

$name = Request::post("name");
$lname = Request::post("lname");
$username = Request::post("username");
$contact = Request::post("contact");
$skill = Request::post("skill");
$description = Request::post("description");
$img = Request::file("img","blob");

if(! $name){
    Response::code(300)-> message("Name is required") -> send();

}
if(! $lname){
    Response::code(300)-> message("Last Name is required)") -> send();
}

if(! $username){
    Response::code(300)-> message("Email Address is required)") -> send();
}

if(! $contact){
    Response::code(300)-> message("Mobile number is required)") -> send();
}

if(! $description){
    Response::code(300)-> message("Descriptions is required)") -> send();
}

if(! $img){
    Response::code(300) -> message("image is required") -> send();
}

$password = Random::text(10);



Users:: insert([
    "name" => $name,
    "lname" => $lname,
    "username" => $username,
    "password" => $password,
    "contact" => $contact,
    "skill" => $skill,
    "description" => $description,
    "status" => "photographer",
    "img" => $img
]);

$message = "congartulation!! your password is: $password and your email is $username";
Mail::send_email($username,"congats",$message,"photographer");

Response::code(200) -> message("data inserted succesfully") -> send();



?>