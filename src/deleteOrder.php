<?php
	date_default_timezone_set("PRC"); //set the default time
	header('Content-type:application/json');
	session_start();
	$json_raw = file_get_contents("php://input");
    $json_arr = json_decode($json_raw,true);

    $deleteorder = $json_arr["deleteorder"]; //use json to pass value

	$user = $_SESSION['user']; //store username, tel, region in the session
	$tel = $_SESSION['tel'];
	$userregion = $_SESSION['region'];

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
	echo "Connected successfully <br />";

	$employee = "SELECT employeeID FROM ordering WHERE orderingID ='{$deleteorder}' ";
	$rs0 = mysqli_query($conn,$employee);
    while($row0 = mysqli_fetch_array($rs0,MYSQLI_ASSOC))
    {
        $selectid = $row0['employeeID']; //select the employeeID from ordering
    } 

	$ordertime = "SELECT ordertime FROM ordering WHERE orderingID ='{$deleteorder}' ";
	$rs1 = mysqli_query($conn,$ordertime);
    while($row1 = mysqli_fetch_array($rs1,MYSQLI_ASSOC))
    {
        $selecttime = $row1['ordertime']; //select the place order time
    } 
    $now = time();
    $hour = floor(($now-(strtotime($selecttime)))/60/60);

	$deletename = "SELECT user FROM ordering WHERE orderingID ='{$deleteorder}' ";
	$rs2 = mysqli_query($conn,$deletename);
    while($row2 = mysqli_fetch_array($rs2,MYSQLI_ASSOC))
    {
        $selectuser = $row2['user']; 
    } 

    $repn95 = "SELECT quotaN95 FROM rep WHERE employeeID ='{$selectid}' ";
	$rs3 = mysqli_query($conn,$repn95);
    while($row3 = mysqli_fetch_array($rs3,MYSQLI_ASSOC))
    {
        $selectn95 = $row3['quotaN95'];
    }

    $repsn95 = "SELECT quotaSN95 FROM rep WHERE employeeID ='{$selectid}' ";
	$rs4 = mysqli_query($conn,$repsn95);
    while($row4 = mysqli_fetch_array($rs4,MYSQLI_ASSOC))
    {
        $selectsn95 = $row4['quotaSN95'];
    }

    $repsmask = "SELECT quotaS FROM rep WHERE employeeID ='{$selectid}' ";
	$rs5 = mysqli_query($conn,$repsmask);
    while($row5 = mysqli_fetch_array($rs5,MYSQLI_ASSOC))
    {
        $selectsmask = $row5['quotaS'];
    }

    $n95 = "SELECT quantityN95 FROM ordering WHERE orderingID ='{$deleteorder}' ";
	$rs6 = mysqli_query($conn,$n95);
    while($row6 = mysqli_fetch_array($rs6,MYSQLI_ASSOC))
    {
        $quantityN95 = $row6['quantityN95'];
    }

    $smask = "SELECT quantityS FROM ordering WHERE orderingID ='{$deleteorder}' ";
	$rs7 = mysqli_query($conn,$smask);
    while($row7 = mysqli_fetch_array($rs7,MYSQLI_ASSOC))
    {
        $quantityS = $row7['quantityS'];
    }

    $sn95 = "SELECT quantitySN95 FROM ordering WHERE orderingID ='{$deleteorder}' ";
	$rs8 = mysqli_query($conn,$sn95);
    while($row8 = mysqli_fetch_array($rs8,MYSQLI_ASSOC))
    {
        $quantitySN95 = $row8['quantitySN95'];
    }

    $leftn95 = $selectn95 + $quantityN95; //add quota back to the original quota
    $leftsmask = $selectsmask + $quantityS;
    $leftsn95 = $selectsn95 + $quantitySN95;

    if($selectuser != $user) //check if select name match the username
    {
    	$result = "invalid";
    }
    elseif($hour>24){
    	$result = "overtime";
    }
    else{ //delete order and update the quota
    	$orderupdate = "DELETE FROM ordering WHERE orderingID ='{$deleteorder}' and user = '{$user}' ";
    	$sql1 = "UPDATE rep SET quotaN95='{$leftn95}', quotaSN95='{$leftsn95}', quotaS='{$leftsmask}' where employeeID ='{$selectid}' " ;
    	if(($conn->query($orderupdate) === true)&&($conn->query($sql1) === true))
		{
			$result = "success";
		}
		else
		{
			$result = "fail";
		}
    }
	ob_end_clean();
    echo json_encode(array('status'=>$result)); //pass value back to js
    $conn->close(); //close connection
	
?>
