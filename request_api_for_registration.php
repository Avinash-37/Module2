<?php

if($_REQUEST["Sign Up"] !== "")
{
	//API Url
	$url = 'http://localhost/Module2/api/register.php';

		$name = $_REQUEST["name"];
		$email = $_REQUEST["email"];
		$mobile = $_REQUEST["mobile"];
		$company = $_REQUEST["company"];
		$password = $_REQUEST["passwd"];
		$re_password = $_REQUEST["re_password"];
		$EncryptPassword = md5($password);

	//Initiate cURL.
	$ch = curl_init($url);

	//The JSON data.
	$jsonData = array(
		'name' => $name,
		'email' => $email,
		'mobile' => $mobile,
		'company' => $company,
		'password' => $EncryptPassword
	);
	//worklist="RACT";
	//$data->uploadedBy="sagar";

	//Encode the array into JSON.
	$jsonDataEncoded = json_encode($jsonData);

	//Tell cURL that we want to send a POST request.
	curl_setopt($ch, CURLOPT_POST, 1);

	//Attach our encoded JSON string to the POST fields.
	curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

	//Set the content type to application/json
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

	//Execute the request
	$result = curl_exec($ch);
}

else{
?>
	<script type="text/javascript">
	alert("button not set");
	history.back();
	</script>
	<?php
	}
 ?>

