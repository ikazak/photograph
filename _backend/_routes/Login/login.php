<?php
//Add codes here...

use Classes\Response;
use Classes\DB;
use Tables\Users;
use Classes\File;

$email = input("email");
$password = input("password");


$result = Users::findOne([
    "username" => $email,
    "password" => $password
]);

$result = File::encode_blob($result, "img");

if (! $result) {
    Response::code(404)->message("Login failed")->send();
}
$status = $result["status"];

if ($status == "admin") {
    Response::code(201)->message("success")->var($result)->send();
}

if ($status == "photographer") {
    Response::code(200)->message("success")->var($result)->send();
}

if ($status == "customer") {
    Response::code(203)->message("success")->var($result)->send();
}


