<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>View order</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div class="menu">
		<ul class="menubar">
			<li><a class="a" href="buy.html">Buy Now</a></li>
			<li><a class="a" href="logout.php">Log out</a></li>
		</ul>
	</div>
	<div>
		<form>
		<h1>Woolin Auto Mask Ordering View</h1>
		<center><table style="border:dotted;border-color:black" id="mytable">
		<h3>Ordering List</h3>
		<tr><th>Quantity of N95</th><th>Quantity of Surgical Mask</th><th>Quantity of Surgical N95</th><th>Amount</th><th>Ordering ID</th><th>Customer Username</th><th>Telephone</th><th>Employee ID</th><th>Date</th><th>Excess(0/1)</th></tr>
		<?php
			session_start();
			$userregion = $_SESSION['region']; //get value store in session
			$user = $_SESSION['user'];

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

			$q="SELECT * from ordering where user = '{$user}' ";
			$result=mysqli_query($conn,$q);
			$res = array();
			while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    		{
        		$res[]=$rows; //echo all the order
        		echo"<tr><td>".$row["quantityN95"]."</td><td>".$row["quantityS"]."</td><td>".$row["quantitySN95"]."</td><td>".$row["amount"]."</td><td>".$row["orderingID"]."</td><td>".$row["user"]."</td><td>".$row["tel"]."</td><td>".$row["employeeID"]."</td><td>".$row["ordertime"]."</td><td>".$row["excess"]."</td></tr>";
    		}	
		?>
		</table></center>
		<br>
		<input type = "button" name = "submit" value="Delete Order Now" id="submit"/>
	</form>	
	</div>
	
	<script type="text/javascript" src="viewOrder.js"></script>
</body>
</html>