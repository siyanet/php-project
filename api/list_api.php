<?php

header("Access-Control-Allow-Orgin:*");
header("Content-Type: application/json");
header("Access-Control-Allow-Method:Get");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorizaion,X-Request-With");

include('functions.php');
$requestMethod  = $_SERVER['REQUEST_METHOD'];
if($requestMethod == 'GET'){
    
require_once('dbselect.php');

$tb_name = "Student";
$results_per_page= 1;

if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = 1;
}
$start_from = ($page -1) * $results_per_page;
}
else{
    $data = [
        'status' => 405,
        'message' => $requestMethod . 'Method Not Allowed',
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}







?>