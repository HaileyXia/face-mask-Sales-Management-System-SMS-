<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Choose Representative</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<script type="text/javascript" src="chooseRep.js"></script>
</head>
<body>
	<div class="menu">
		<ul class="menubar">
			<li><a class="a" href="viewOrder.php">View Order</a></li>
			<li><a class="a" href="logout.php">Log Out</a></li>
		</ul>
	</div>
	<div>
		<form>
		<h1>Woolin Auto Mask Representative Selection</h1>
		<h3>please choose one representative in your region.</h3>
		<center><table style="border:dotted;border-color:black" id="mytable">
		<caption>Representative List</caption>
		<tr><th>Rep Username</th><th>Rep Region</th><th>EmployeeID</th><th>Quota of N95</th><th>Quota of Surgical N95</th><th>Quota of Surgical Mask</th></tr>
		<?php
			session_start();
			$userregion = $_SESSION['region']; //store region in session
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

			$q="SELECT user,region,employeeID,quotaN95,quotaSN95,quotaS from rep where region = '{$userregion}' ";
			$result=mysqli_query($conn,$q);
			$res = array();
			while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    		{
        		$res[]=$rows;//print all the rep in the same region as user
        		echo"<tr><td>".$row["user"]."</td><td>".$row["region"]."</td><td>".$row["employeeID"]."</td><td>".$row["quotaN95"]."</td><td>".$row["quotaSN95"]."</td><td>".$row["quotaS"]."</td></tr>";
    		}	
		?>
		</table></center>
		<br>
		<input type = "button" name = "submit" value="Select Now" id="submit"/>
	</form>	
	</div>
	<div id="footer">Copyright © 2020 Tianqi XIA. All rights reserved. </div>
	<script type="text/javascript" src="chooseRep.js"></script>
</body>
</html>