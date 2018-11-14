<?php
include 'dbconfig.php';
session_start();

	$name = $_REQUEST["name"];
	$email = $_REQUEST["email"];
	$mobile = $_REQUEST["mobile"];
	$company = $_REQUEST["company"];
	$password = $_REQUEST["passwd"];
	$re_password = $_REQUEST["re_password"];
	$EncryptPassword = md5($password);
	$res=mysqli_query($conn,"INSERT INTO `user_lgin` (`id`, `name`, `email`, `mobile`, `company`, `password`) VALUES (NULL, '$name', '$email', '$mobile', '$company', '$EncryptPassword')"); 


	if(!empty($res))
	{
		?>
		<script type="text/javascript">
		alert("Account created Successfully");
		window.location.assign("index.html")
		</script>
		<?php	
	}
	else
	{
		?>
		<script type="text/javascript">
		alert("Please Enter correct value");
		history.back();
		</script>
		<?php
	}

 ?>



