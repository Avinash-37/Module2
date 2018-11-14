<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once './config/database.php';
include_once 'user_auth.php';
 
$database = new Database();
$db = $database->getConnection();
 
$userAuth = new User_auth($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));
//$data->email="vai@gmail.com";
//$data->password="123";

$userAuth->email= $data->email;
$userAuth -> password =$data->password;
// login Successful
if($userAuth->auth()){
    http_response_code(200);
    echo json_encode(array("message" => "login Successful."));
}
 
// if unable to login
else{
    http_response_code(503);
    echo json_encode(array("message" => "invalid id or Password."));
}

?>
