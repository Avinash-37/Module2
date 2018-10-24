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
	$date = date('Y-m-d H:i:s');

	$result=mysqli_query($conn,"INSERT INTO `todotable` (`list`, `todoDate`, `uploadedBy`) VALUES ('$dataList', '$date', '$user')");
	
	header("Location:todolist.php");
	}

?>
