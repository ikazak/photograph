<?php //route: orders/get

//Add codes here...

use Classes\Response;
use Classes\DB;
use Classes\Request;
use Tables\Request_order;

$user = Request::get("user");
$query = "SELECT r.id, r.date_time, r.status, r.location, p.package_name, p.price, p.downpayment, CONCAT(uu.`name`,' ', uu.lname) AS 'photographer', s.services_name FROM request_order r, users u, package p, services s, users uu WHERE u.user_id = r.customer AND r.photographer = uu.user_id and p.id = r.package AND s.servicesID = p.service_id AND r.customer = ?";
$param = [$user];
$requesr_order = DB::query($query, $param);

Response::code(200)->data($requesr_order)->send();





?>