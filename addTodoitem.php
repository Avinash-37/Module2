<?php
include 'dbconfig.php';
session_start();
if(!$_SESSION["E_MAIL"])
	{
	header("Location:index.html");
	}
	else
	{
	$user=$_SESSION["E_MAIL"];
	$dataList=$_REQUEST["myInput"];
	//$dataList="HTML";
	//$user ="avinash";
	$date = date('Y-m-d');
	$time = date("h:i:s");
	$result=mysqli_query($conn,"INSERT INTO `todotable` (`list`, `todoDate`, `time`, `uploadedBy`, `status`) VALUES ('$dataList', '$date', '$time', '$user', '0')");
	
	header("Location:todolist.php");
	}

?>
