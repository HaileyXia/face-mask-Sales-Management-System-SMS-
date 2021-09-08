<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>View order</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div>
		<div class="menu">
			<ul class="menubar">
				<li><a class="a" href="repViewOrder.php">View Order</a></li>
				<li><a class="a" href="logout.php">Log out</a></li>
			</ul>
		</div>
		<form>
		<h1>Woolin Auto Mask Personal Information for Representative</h1>
		<center><table style="border:dotted;border-color:black" id="mytable">
		<tr><th>Username</th><th>employeeID</th><th>Telephone</th><th>Region</th><th>Quota of N95</th><th>Quota of Surgical N95</th><th>Quota of Surgical Mask</th></tr>
		<?php
			session_start();
			$repregion = $_SESSION['region']; //get the value store in session
			$user = $_SESSION['user'];
			$employeeID = $_SESSION['employeeID'];

			$servername = "localhost";
			$username = "scytx1";
			$password = "scytx1";
			$dbname = "scytx1";

    		// Create connection
    		$conn = new mysqli($servername, $username, $password, $dbname);

    		// Check connection
    		if ($conn->connect_error) 
    		{	
            	die("Connection failed: " . $conn->connect_error);
    		}
    		//echo "Connected successfully <br/>";

			$q="SELECT * from rep where employeeID = '{$employeeID}' ";
			$result=mysqli_query($conn,$q);
			$res = array();
			while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    		{
        		$res[]=$rows; //echo personal info of the rep who log in 
        		echo"<tr><td>".$row["user"]."</td><td>".$row["employeeID"]."</td><td>".$row["tel"]."</td><td>".$row["region"]."</td><td>".$row["quotaN95"]."</td><td>".$row["quotaSN95"]."</td><td>".$row["quotaS"]."</td></tr>";
    		}	
		?>
		</table></center>
		<br>
	</form>	
	</div>
	<div id="footer">Copyright © 2020 Tianqi XIA. All rights reserved. </div>
</body>
</html>