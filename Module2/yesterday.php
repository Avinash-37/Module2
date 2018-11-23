<?php
include 'dbconfig.php';
session_start();
$email=$_SESSION["E_MAIL"];
$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
$prev_date = date('Y-m-d', strtotime($date .' -1 day'));

//SELECT * FROM `todotable` WHERE uploadedBy="avinashk.meshram@gmail.com" AND todoDate="";
$result=mysqli_query($conn,"SELECT * FROM `todotable` WHERE uploadedBy='$email' AND todoDate='$prev_date' ORDER by time DESC");
if ($result->num_rows >0) {
	 
	 while($row[] = $result->fetch_assoc()) {
	 
	 $tem = $row;
	 
	 $json = json_encode($tem);
	 
	 }
	 
	} 
	else {
	 echo "$prev_date  - "."You are not doing anything Yesterday";
	}
	$arr = json_decode($json);
		foreach($arr as $a)
		{
		echo $a->list."\t".$a->todoDate."</br>";
		}


$conn->close();


?>
