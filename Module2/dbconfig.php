<?php
$username = "root";
$password = "root";
$database = "aviDB";
$server ="localhost";

$conn=mysqli_connect($server,$username,$password,$database);

 if (!$conn)
 
 {
 
 die('Could not connect: ' . mysql_error());
 
 }

?>

