<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object file
include_once './config/database.php';
include_once 'product.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

if($product->delete1()){

    http_response_code(200);

    echo json_encode(array("message" => "Product was deleted."));
}
 
else{

    http_response_code(503);

    echo json_encode(array("message" => "Unable to delete product."));
}
?>
