<?php
include 'dbconfig.php';
session_start();

$email=$_SESSION["E_MAIL"];
$result=mysqli_query($conn,"SELECT * FROM `todotable` WHERE uploadedBy='$email' ORDER by time DESC");
//$result=mysqli_query($conn,"SELECT * FROM `todotable`ORDER by time DESC");
if ($result->num_rows >0) {
	 while($row[] = $result->fetch_assoc()) {
	 $tem = $row; 
	 $json = json_encode($tem); 
	 } 
	} 
	else {
	 echo "You Are a new user please add data into todays list";
	}
	$arr = json_decode($json);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<title>Avinash|Testing data</title>
<link rel="stylesheet" type="text/css" href="./css/style.css"/>
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
<link href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel = "stylesheet">
<script type="text/javascript">
</script>
</head>
<body>
<div class="small-container">
	<div class="row">
	<div class="col-xs-6 col-sm-6 col-xd-6 col-lg-6">
	<h2>List</h2>
	</div>
	<div class="col-xs-6 col-sm-6 col-xd-6 col-lg-6">
	<h2>Date</h2>
	</div>	
	</div>
	<div class="row">
	<?php
	foreach($arr as $a)
		{
		?>
        <div class="col-xs-6 col-sm-6 col-xd-6 col-lg-6">
	<?php echo $a->list ?>
	</div>
	<div class="col-xs-6 col-sm-6 col-xd-6 col-lg-6">
	<?php echo $a->todoDate ?>
	</div>
	<?php
		}
	?>
</div>
</div>
</body>
</html>

