<?php
session_start();
$login_email=$_SESSION["E_MAIL"];
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once './config/database.php';
include_once 'product.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
$product = new Product($db); 

// get posted data
//$data = json_decode(file_get_contents("php://input"));
//$data->email="avinashk.meshram@gmail.com";
$data ->email =$login_email;
$product->uploadedBy = $data->email;
// query products
$stmt = $product->todaylist();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $products_arr=array();
    $products_arr["records"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
       
        extract($row);
 
        $product_item=array(
            "list" => $list,
            "todoDate" => $todoDate,
            "time" => $time,
            "uploadedBy" => $uploadedBy,
            "status" => $status
        );
        array_push($products_arr["records"], $product_item);
    }
    // set response code - 200 OK
    http_response_code(200);
    // show products data in json format
    echo json_encode($products_arr);
} 
else{
    // set response code - 404 Not found
    http_response_code(404);
    // tell the user no products found
    echo json_encode(
        array("message" => "No Data found.")
    );
}
?>
