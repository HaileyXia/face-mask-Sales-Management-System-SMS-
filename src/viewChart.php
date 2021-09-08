<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>View order by Employee</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div class="menu">
		<ul class="menubar">
			<li><a class="a" href="assignRep.html">Assign Rep</a></li>
			<li><a class="a" href="viewRegion.php">Order(Region)</a></li>
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
		<h3>View the Order by Employee</h3>
		<tr><td></td><th>N95</th><th>Surgical Mask</th><th>Surgical N95</th><th>Total Amount($)</th><th>Region</th></tr>
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
			//get the info of each rep
			if(isset($_SESSION['user'])!=null){
			$rep1region ="SELECT region from rep where employeeID=1";
			$rep1=mysqli_query($conn,$rep1region);
			while($row = mysqli_fetch_array($rep1,MYSQLI_ASSOC)){
				$rep1 =  $row['region'];
			}
    		$q1="SELECT SUM(quantityN95) AS rep1n95,SUM(quantityS) As rep1smask, SUM(quantitySN95) AS rep1sn95, SUM(amount) AS total from ordering where employeeID=1 AND excess=0";
			$result1=mysqli_query($conn,$q1);
			$res = array();
			while($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC))
    		{
    			$res[]=$rows;
    			echo "<tr><th>EmployeeID 1</th><td>".$row1["rep1n95"]."</td><td>".$row1["rep1smask"]."</td><td>".$row1["rep1sn95"]."</td><td>".$row1["total"]."</td><td>".$rep1."</td></tr>";
    		}

    		$rep2region ="SELECT region from rep where employeeID=2";
			$rep2=mysqli_query($conn,$rep2region);
			while($row = mysqli_fetch_array($rep2,MYSQLI_ASSOC)){
				$rep2 =  $row['region'];
			}
    		$q2="SELECT SUM(quantityN95) AS rep2n95,SUM(quantityS) As rep2smask, SUM(quantitySN95) AS rep2sn95, SUM(amount) AS total from ordering where employeeID=2 AND excess=0";
			$result2=mysqli_query($conn,$q2);
			$res = array();
			while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC))
    		{
    			$res[]=$rows;
    			echo "<tr><th>EmployeeID 2</th><td>".$row2["rep2n95"]."</td><td>".$row2["rep2smask"]."</td><td>".$row2["rep2sn95"]."</td><td>".$row2["total"]."</td><td>".$rep2."</td></tr>";
    		}

    		$rep3region ="SELECT region from rep where employeeID=3";
			$rep3=mysqli_query($conn,$rep3region);
			while($row = mysqli_fetch_array($rep3,MYSQLI_ASSOC)){
				$rep3 =  $row['region'];
			}
    		$q3="SELECT SUM(quantityN95) AS rep3n95,SUM(quantityS) As rep3smask, SUM(quantitySN95) AS rep3sn95, SUM(amount) AS total from ordering where employeeID=3 AND excess=0";
			$result3=mysqli_query($conn,$q3);
			$res = array();
			while($row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC))
    		{
    			$res[]=$rows;
    			echo "<tr><th>EmployeeID 3</th><td>".$row3["rep3n95"]."</td><td>".$row3["rep3smask"]."</td><td>".$row3["rep3sn95"]."</td><td>".$row3["total"]."</td><td>".$rep3."</td></tr>";
    		}

    		$rep4region ="SELECT region from rep where employeeID=4";
			$rep4=mysqli_query($conn,$rep4region);
			while($row = mysqli_fetch_array($rep4,MYSQLI_ASSOC)){
				$rep4 =  $row['region'];
			}
    		$q4="SELECT SUM(quantityN95) AS rep4n95,SUM(quantityS) As rep4smask, SUM(quantitySN95) AS rep4sn95, SUM(amount) AS total from ordering where employeeID=4 AND excess=0";
			$result4=mysqli_query($conn,$q4);
			$res = array();
			while($row4 = mysqli_fetch_array($result4,MYSQLI_ASSOC))
    		{
    			$res[]=$rows;
    			echo "<tr><th>EmployeeID 4</th><td>".$row4["rep4n95"]."</td><td>".$row4["rep4smask"]."</td><td>".$row4["rep4sn95"]."</td><td>".$row4["total"]."</td><td>".$rep4."</td></tr>";
    		}

    		$rep5region ="SELECT region from rep where employeeID=5";
			$rep5=mysqli_query($conn,$rep5region);
			while($row = mysqli_fetch_array($rep5,MYSQLI_ASSOC)){
				$rep5 =  $row['region'];
			}
    		$q5="SELECT SUM(quantityN95) AS rep5n95,SUM(quantityS) As rep5smask, SUM(quantitySN95) AS rep5sn95, SUM(amount) AS total from ordering where employeeID=5 AND excess=0";
			$result5=mysqli_query($conn,$q5);
			$res = array();
			while($row5 = mysqli_fetch_array($result5,MYSQLI_ASSOC))
    		{
    			$res[]=$rows;
    			echo "<tr><th>EmployeeID 5</th><td>".$row5["rep5n95"]."</td><td>".$row5["rep5smask"]."</td><td>".$row5["rep5sn95"]."</td><td>".$row5["total"]."</td><td>".$rep5."</td></tr>";
    		}

    		$rep6region ="SELECT region from rep where employeeID=6";
			$rep6=mysqli_query($conn,$rep6region);
			while($row = mysqli_fetch_array($rep6,MYSQLI_ASSOC)){
				$rep6 =  $row['region'];
			}
    		$q6="SELECT SUM(quantityN95) AS rep6n95,SUM(quantityS) As rep6smask, SUM(quantitySN95) AS rep6sn95, SUM(amount) AS total from ordering where employeeID=6 AND excess=0";
			$result6=mysqli_query($conn,$q6);
			$res = array();
			while($row6 = mysqli_fetch_array($result6,MYSQLI_ASSOC))
    		{
    			$res[]=$rows;
    			echo "<tr><th>EmployeeID 6</th><td>".$row6["rep6n95"]."</td><td>".$row6["rep6smask"]."</td><td>".$row6["rep6sn95"]."</td><td>".$row6["total"]."</td><td>".$rep6."</td></tr>";
    		}

    		$rep7region ="SELECT region from rep where employeeID=7";
			$rep7=mysqli_query($conn,$rep7region);
			while($row = mysqli_fetch_array($rep7,MYSQLI_ASSOC)){
				$rep7 =  $row['region'];
			}
    		$q7="SELECT SUM(quantityN95) AS rep7n95,SUM(quantityS) As rep7smask, SUM(quantitySN95) AS rep7sn95, SUM(amount) AS total from ordering where employeeID=7 AND excess=0";
			$result7=mysqli_query($conn,$q7);
			$res = array();
			while($row7 = mysqli_fetch_array($result7,MYSQLI_ASSOC))
    		{
    			$res[]=$rows;
    			echo "<tr><th>EmployeeID 7</th><td>".$row7["rep7n95"]."</td><td>".$row7["rep7smask"]."</td><td>".$row7["rep7sn95"]."</td><td>".$row7["total"]."</td><td>".$rep7."</td></tr>";
    		}

    		$rep8region ="SELECT region from rep where employeeID=8";
			$rep8=mysqli_query($conn,$rep8region);
			while($row = mysqli_fetch_array($rep8,MYSQLI_ASSOC)){
				$rep8 =  $row['region'];
			}
    		$q8="SELECT SUM(quantityN95) AS rep8n95,SUM(quantityS) As rep8smask, SUM(quantitySN95) AS rep8sn95, SUM(amount) AS total from ordering where employeeID=8 AND excess=0";
			$result8=mysqli_query($conn,$q8);
			$res = array();
			while($row8 = mysqli_fetch_array($result8,MYSQLI_ASSOC))
    		{
    			$res[]=$rows;
    			echo "<tr><th>EmployeeID 8</th><td>".$row8["rep8n95"]."</td><td>".$row8["rep8smask"]."</td><td>".$row8["rep8sn95"]."</td><td>".$row8["total"]."</td><td>".$rep8."</td></tr>";
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