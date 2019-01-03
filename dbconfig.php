<?php
$username = "root";
$password = "avi123";
$database = "aviDB";
$server ="35.200.214.15";

$conn=mysqli_connect($server,$username,$password,$database);

 if (!$conn)
 
 {
 
 die('Could not connect: ' . mysql_error());
 
 }

?>

