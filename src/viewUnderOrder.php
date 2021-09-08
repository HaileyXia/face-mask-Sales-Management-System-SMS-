<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>View Mask Under Ordering</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div class="menu">
		<ul class="menubar">
			<li><a class="a" href="viewRegion.php">Order(Region)</a></li>
			<li><a class="a" href="viewChart.php">Order(Rep)</a></li>
			<li><a class="a" href="viewCustomer.html">Order(User)</a></li>
			<li><a class="a" href="viewAll.php">All Order</a></li>
			<li><a class="a" href="assignRep.html">Assign Rep</a></li>
			<li><a class="a" href="changeQuota.html">Change Quota</a></li>
			<li><a class="a" href="viewRepInfo.php">Rep Info</a></li>
			<li><a class="a" href="logout.php">Log out</a></li>
		</ul>
	</div>
	<div>
	<form>
		<h1>Woolin Auto Mask Under Ordering View</h1>
		<center><table style="border:dotted;border-color:black" id="mytable">
		<caption>Ordering List</caption>
		<tr><th>Quantity of N95</th><th>Quantity of Surgical Mask</th><th>Quantity Surgical N95</th><th>Amount</th><th>Ordering ID</th><th>Customer Username</th><th>Telephone</th><th>Employee ID</th><th>Date</th><th>Excess(0/1)</th></tr>
		<?php
			session_start();
			$repregion = $_SESSION['region']; //get value store in session
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
			//select all the order exceeds order
			if(isset($_SESSION['user'])!=null){
			$q="SELECT * from ordering where excess=0";
			$result=mysqli_query($conn,$q);
			$res = array();
			while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    		{
    			$now = time();
    			$hour = floor(($now-(strtotime($row["ordertime"])))/60/60);
    			if($hour<24){
    				$res[]=$rows; //echo the order
        			echo"<tr><td>".$row["quantityN95"]."</td><td>".$row["quantityS"]."</td><td>".$row["quantitySN95"]."</td><td>".$row["amount"]."</td><td>".$row["orderingID"]."</td><td>".$row["user"]."</td><td>".$row["tel"]."</td><td>".$row["employeeID"]."</td><td>".$row["ordertime"]."</td><td>".$row["excess"]."</td></tr>";
    			}
			}
		}	
		?>
		</table></center>
		<br>
	</form>	
	</div>
	<div id="footer">Copyright © 2020 Tianqi XIA. All rights reserved. </div>
</body>
</html>