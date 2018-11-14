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
//$data->id=NULL;
/*$data->name="sagar";
$data->email="sag@gamil.com";
$data->mobile="908874456";
$data->company="human cloud";
$data->password="123";*/

//Add data into user auth object
//$userAuth->id = NULL;
$userAuth->name = $data->name;
$userAuth->email = $data->email;
$userAuth -> mobile = $data->mobile;
$userAuth -> company = $data->company;
$userAuth -> password =$data->password;
// login Successful
if($userAuth->registration()){
    http_response_code(200);
    //echo json_encode(array("message" => "Register Successfully."));
	
		?>
		<script type="text/javascript">
		alert("Registered Successfully");
		//history.back();
		window.location.href = 'http://localhost/Module2/index.html';
		</script>
		<?php
}
 
// if unable to login
else{
    http_response_code(503);
    // echo json_encode(array("message" => "NOt Regster."));
	
		?>
		<script type="text/javascript">
		alert("Not Register");
		history.back();
		</script>
		<?php
}

?>
