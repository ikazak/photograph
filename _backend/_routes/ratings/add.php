<?php //route: ratings/add

//Add codes here...
use Classes\Request;
use Classes\Response;
use Tables\Rates;


$name = Request::post("name");
$rating = Request::post("rating");
$date = Request::post("date");
$service = Request::post("service");
$text = Request::post("text");



if(! $rating){
    Response::code(404)->message("Rate is Required")->send();
}

if(! $service){
    Response::code(404)->message("Services is Required")->send();
}

if(! $text){
    Response::code(404)->message("Comment is Required")->send();
}


$insert = Rates::insert([
    "name" => $name,
    "rating" => $rating,
    "date" => $date,
    "services" => $service,
    "comment" => $text
]);

Response::code(200)->message("Data inserted Successfully")->send();
?>