<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

header("Content-Type: application/json; charset=UTF-8");
$input_username=$_GET['input_username'];
print_r($input_username);

?>
