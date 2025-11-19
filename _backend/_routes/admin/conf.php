<?php //route: admin/conf

//Add codes here...





use Classes\Response;
use Classes\DB;
use Classes\Request;
use Tables\Request_order;


$query = "SELECT r.id 'r_id', r.status, p.package_name, p.id, p.price, p.downpayment, CONCAT(uu.`name`,' ', uu.lname )'fullname', r.location, r.date_time, s.services_name FROM `users` u, services s, package p, request_order r, users uu WHERE r.customer = u.user_id AND uu.user_id = r.customer and r.package = p.id AND s.servicesID = p.service_id AND r.status = 2";

$requesr_order = DB::query($query);

Response::code(200)->data($requesr_order)->send();






?>