<?php
include 'dbconfig.php';
session_start();
$email=$_SESSION["E_MAIL"];
$date = date('Y-m-d');
//$result=mysqli_query($conn,"SELECT * FROM `todotable` WHERE uploadedBy='$email' AND todoDate='$date'");
$result=mysqli_query($conn,"SELECT * FROM `todotable` WHERE uploadedBy='$email' AND todoDate='$date' ORDER by time DESC");
if ($result->num_rows >0) {
	 
	 while($row[] = $result->fetch_assoc()) {
	 
	 $tem = $row;
	 
	 $json = json_encode($tem);
	 
	 }
	 
	} 
	else {
	 echo "  -"."Add data into list";
	}
	$arr = json_decode($json);
		foreach($arr as $a)
		{
		echo $a->list."\t".$a->todoDate."</br>";
		}


$conn->close();


?>
