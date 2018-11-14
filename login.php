<?php
include 'dbconfig.php';
session_start();
if($_REQUEST["Login"] !== "")
{
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
//$username = "avinashk.meshram@gmail.com";
//$password = "avi1231";
$EncryptPassword = md5($password);

$res=mysqli_query($conn,"SELECT * FROM `user_lgin` WHERE email='$username' AND password='$EncryptPassword'"); 


	if(mysqli_num_rows($res) > 0 )
	{	
	 $_SESSION["E_MAIL"]=$username and $_SESSION["PASSWD"]=$password;
     	header("Location:todolist.php");
	}
	else
	{
	?>
	<script type="text/javascript">
	alert("INVALID E MAIL AND PASSWORD");
	history.back();
	</script>
	<?php
	}

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

