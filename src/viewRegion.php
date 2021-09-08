<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>View order in Region</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div class="menu">
		<ul class="menubar">
			<li><a class="a" href="assignRep.html">Assign Rep</a></li>
			<li><a class="a" href="viewChart.php">Order(Rep)</a></li>
			<li><a class="a" href="viewCustomer.html">Order(User)</a></li>
			<li><a class="a" href="viewUnderOrder.php">UnderOrdering</a></li>
			<li><a class="a" href="viewAll.php">All Order</a></li>
			<li><a class="a" href="changeQuota.html">Change Quota</a></li>
			<li><a class="a" href="viewRepInfo.php">Rep Info</a></li>
			<li><a class="a" href="logout.php">Log out</a></li>
		</ul>
	</div>
	<div>
		<form>
		<h1>Woolin Auto Mask Ordering Chart-View for Manager</h1>
		<center><table style="border:dotted;border-color:black" id="mytable">
		<caption>View the Order in Region</caption>
		<tr><td></td><th>N95</th><th>Surgical Mask</th><th>Surgical N95</th><th>Total Amount($)</th></tr>
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
			//get order for specific region
			if(isset($_SESSION['user'])!=null){
    		$q1="SELECT SUM(quantityN95) AS reg1n95,SUM(quantityS) As reg1smask, SUM(quantitySN95) AS reg1sn95, SUM(amount) AS total from ordering where region='China'AND excess=0";
			$result1=mysqli_query($conn,$q1);
			$res = array();
			while($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC))
    		{
    			$res[]=$rows;
    			echo "<tr><th>China</th><td>".$row1["reg1n95"]."</td><td>".$row1["reg1smask"]."</td><td>".$row1["reg1sn95"]."</td><td>".$row1["total"]."</td></tr>";
    		}

    		$q2="SELECT SUM(quantityN95) AS reg2n95,SUM(quantityS) As reg2smask, SUM(quantitySN95) AS reg2sn95, SUM(amount) AS total from ordering where region='UK'AND excess=0";
			$result2=mysqli_query($conn,$q2);
			$res = array();
			while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC))
    		{
    			$res[]=$rows;
    			echo "<tr><th>UK</th><td>".$row2["reg2n95"]."</td><td>".$row2["reg2smask"]."</td><td>".$row2["reg2sn95"]."</td><td>".$row2["total"]."</td></tr>";
    		}

    		$q3="SELECT SUM(quantityN95) AS reg3n95,SUM(quantityS) As reg3smask, SUM(quantitySN95) AS reg3sn95, SUM(amount) AS total from ordering where region='USA'AND excess=0";
			$result3=mysqli_query($conn,$q3);
			$res = array();
			while($row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC))
    		{
    			$res[]=$rows;
    			echo "<tr><th>USA</th><td>".$row3["reg3n95"]."</td><td>".$row3["reg3smask"]."</td><td>".$row3["reg3sn95"]."</td><td>".$row3["total"]."</td></tr>";
    		}

    		$q4="SELECT SUM(quantityN95) AS reg4n95,SUM(quantityS) As reg4smask, SUM(quantitySN95) AS reg4sn95, SUM(amount) AS total from ordering where region='Japan'AND excess=0";
			$result4=mysqli_query($conn,$q4);
			$res = array();
			while($row4 = mysqli_fetch_array($result4,MYSQLI_ASSOC))
    		{
    			$res[]=$rows;
    			echo "<tr><th>Japan</th><td>".$row4["reg4n95"]."</td><td>".$row4["reg4smask"]."</td><td>".$row4["reg4sn95"]."</td><td>".$row4["total"]."</td></tr>";
    		}

    		$q="SELECT SUM(quantityN95) AS N95total,SUM(quantityS) AS Smasktotal, SUM(quantitySN95) AS SN95total, SUM(amount) AS total from ordering where excess=0";
			$result=mysqli_query($conn,$q);
			$res = array();
			while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    		{
    			$res[]=$rows;
    			echo "<tr><th>Over All</th><td>".$row["N95total"]."</td><td>".$row["Smasktotal"]."</td><td>".$row["SN95total"]."</td><td>".$row["total"]."</td></tr>";
			}	
		}
		?>
		</table></center>
		<br>
	</form>	
	</div>
	<div id="footer">Copyright © 2020 Tianqi XIA. All rights reserved. </div>
	<script type="text/javascript" src="repViewOrder.js"></script>
</body>
</html>