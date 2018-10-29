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
<script type="text/javascript">
function createInstance()
	{
        var req = null;
		if (window.XMLHttpRequest)
		{
 			req = new XMLHttpRequest();
		} 
		else if (window.ActiveXObject) 
		{
			try {
				req = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e)
			{
				try {
					req = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) 
				{
					alert("XHR not created");
				}
			}
	        }
        return req;
	};

	function storing(data, element)
	{
		element.innerHTML = data;
	}

	function submitForm(element)
	{ 
		var req =  createInstance();

		req.onreadystatechange = function()
		{ 
			if(req.readyState == 4)
			{
				if(req.status == 200)
				{
					storing(req.responseText, element);	
				}	
				else	
				{
					alert("Error: returned status code " + req.status + " " + req.statusText);
				}	
			} 
		}; 
		req.open("GET", "displayData.php", true);
		req.send(); 
	} 
//used for display yesterday data..............
function yesterday()
{
var xmlhttp;
if(window.XMLHttpRequest)
{
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("displayData").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("GET","yesterday.php",true);
xmlhttp.send();
}
//used for display today data
function aajkaKam()
{
var xmlhttp;
if(window.XMLHttpRequest)
{
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("displayData").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("GET","Today.php",true);
xmlhttp.send();
}
</script>
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
				$date = date('Y-m-d');
				$res=mysqli_query($conn,"SELECT * FROM `todotable` WHERE uploadedBy='$email' AND todoDate='$date' ORDER by time DESC LIMIT 0,10");
				//$res=mysqli_query($conn,"SELECT * FROM `todotable` ORDER by time DESC LIMIT 0,10"); 
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

		<button class="btn btn-danger" id="Yesterday" ONCLICK="yesterday(document.getElementById('displayData'))">Yesterday</button>
		<button class="btn btn-info" id="Today" name="Today" ONCLICK="aajkaKam(document.getElementById('displayData'))">Today</button>
		<button class="btn btn-success" id="All Day" name="All Day" ONCLICK="submitForm(document.getElementById('displayData'))">All Day</button>

					    </div>
					<div id="displayData" class="displayData">

					</div>
				    </div>
				</div>
	</div>
  </div>
 

     <script src="./js/scripts.js"></script>
</body>
</html>

