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
 
// prepare product object
$product = new Product($db);
 
// get product id
$data = json_decode(file_get_contents("php://input"));
//$data -> time="04:56:27";
// set product id to be deleted
$product->time = $data->time;
 
// delete the product
if($product->delete()){
    http_response_code(200);
    echo json_encode(array("message" => "Product was deleted."));
}
 
// if unable to delete the product
else{
    http_response_code(503);
    echo json_encode(array("message" => "Unable to delete product."));
}
?>
