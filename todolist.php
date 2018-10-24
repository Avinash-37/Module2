<?php
include 'dbconfig.php';
session_start();
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

</head>
<body>
<div class="container-fluid">
	<img src="./image/header.jpeg" alt="Header image" width="100%" height="100%"/>
</div>
<div class="container">
		<div class="row">
        <div class="col-xs-12 col-sm-6 col-xd-12 col-lg-6">
		<div id="myTodolist" class="small-container">
			<h2>My To Do List</h2>
			<form action="addTodoitem.php" method="post">		
            			<input type="text" id="myInput" name="myInput" class="login-input" placeholder="Add list" required>
					<span ><button type="submit" name="submit" class="addButton" >Add</button></span><br />
            				</form>
				<h2>List</h2>
				<ul id="myTodayList">
				<?php
				$email=$_SESSION["E_MAIL"];
				$res=mysqli_query($conn,"SELECT * FROM `todotable` WHERE uploadedBy='avi' ORDER BY todoDate DESC LIMIT 0,10");
				//$res=mysqli_query($conn,"SELECT * FROM `todotable` ORDER by todoDate DESC LIMIT 0,10"); 
				$cout=mysqli_num_rows($res);
				
					if($cout > 0 )
					{
						
						for($i=1;$i<=$cout;$i++)
						{
						$r=mysqli_fetch_array($res);
						echo'<li>'.$r[0].'</li>';
						}
					}	
				?>
			
					</ul>
				<br>
				<button id="clearDiv" class="btn btn-danger btn-lg" onclick="ClearData()">Clear All</button><br /><br/>
				<form action="log_out.php" method="post"><button class="btn btn-danger btn-block" >Log Out</button></form>
				</div>
    				</div>
				<div class="col-xs-12 col-sm-6 col-xd-12 col-lg-6">
				    <div class="small-container"><h2>My To Do List</h2><br/>
					<div class="flex-container">
					    <button class="btn btn-danger" >Yesterday</button>
					    <button class="btn btn-info" >Today</button>
					    <button class="btn btn-success" >All Day</button>
					    </div>
				    </div>
				</div>
        
	</div>
  </div>
 

     <script src="./js/scripts.js"></script>
</body>
</html>
