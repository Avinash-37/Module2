<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once './config/database.php';
include_once 'product.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));
//$data->worklist="RACT";
//$data->uploadedBy="sagar";

// make sure data is not empty
if(!empty($data->worklist) && !empty($data->uploadedBy))
{
 
    // set product property values
    $product->lists = $data->worklist;
    $product->todoDate = date('Y-m-d');
    $product->time = date('H:i:s');
    $product->uploadedBy = $data->uploadedBy;
    $product->status = "0";

    // create the product
    if($product->create()){
        http_response_code(201);
        echo json_encode(array("message" => "Task was created."));
    }
    // if unable to create the product, tell the user
    else{
        http_response_code(503);
        echo json_encode(array("message" => "Unable to create Task."));
    }
}
else{
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create Task. Data is incomplete."));
}

?>
