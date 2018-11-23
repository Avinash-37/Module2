<?php
include 'dbconfig.php';


//$email=$_SESSION["E_MAIL"];
$email="avinashk.meshram@gmail.com";
$result=mysqli_query($conn,"SELECT * FROM `todotable` WHERE uploadedBy='$email' ORDER by time DESC");
//$result=mysqli_query($conn,"SELECT * FROM `todotable`ORDER by time DESC");
if ($result->num_rows >0) {
	 while($row[] = $result->fetch_assoc()) {
	 $tem = $row;  
	echo $json;
	 } 
	} 
	else {
	 echo "You Are a new user please add data into todays list";
	}
	$arr = json_decode($json);
?>
