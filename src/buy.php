<?php
	header('Content-type:application/json'); //set the default time 
	session_start();
	$json_raw = file_get_contents("php://input");
    $json_arr = json_decode($json_raw,true);

    $choose = $json_arr["choose"];  //use json to pass value
    $n95 = $json_arr["n95"];
    $smask = $json_arr["smask"];
    $sn95 = $json_arr["sn95"];
    $totalCost = $json_arr['totalCost'];

	$user = $_SESSION['user']; //store username, tel, region in session
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

	$repn95 = "SELECT quotaN95 FROM rep WHERE employeeID ='{$choose}' "; //get the quota of N95
	$rs0 = mysqli_query($conn,$repn95);
    while($row = mysqli_fetch_array($rs0,MYSQLI_ASSOC))
    {
        $selectn95 = $row['quotaN95'];
    }

    $repsn95 = "SELECT quotaSN95 FROM rep WHERE employeeID ='{$choose}' ";//get quota of surgical N95
	$rs1 = mysqli_query($conn,$repsn95);
    while($row = mysqli_fetch_array($rs1,MYSQLI_ASSOC))
    {
        $selectsn95 = $row['quotaSN95'];
    }

    $repsmask = "SELECT quotaS FROM rep WHERE employeeID ='{$choose}' ";//get quota of surgical mask
	$rs2 = mysqli_query($conn,$repsmask);
    while($row = mysqli_fetch_array($rs2,MYSQLI_ASSOC))
    {
        $selectsmask = $row['quotaS'];
    }

	$repregion = "SELECT region FROM rep WHERE employeeID ='{$choose}' ";//get rep's region
    $rs = mysqli_query($conn,$repregion);
    while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC))
    {
        $selectrep = $row['region'];
    } 

    $leftn95 = $selectn95 - $n95;//calculate the left masks
    $leftsmask = $selectsmask - $smask;
    $leftsn95 = $selectsn95 - $sn95;

    if(($leftn95<0)||($leftsmask<0)||($leftsn95<0)){//check if exceeds quota
        $excess = 1;
    }
    else{
        $excess = 0;
    }

    if($selectrep != $userregion)//check if the rep is in the same region as user
    {
    	$result = "invalidrep";
    }
    else{ //insert the order information
    	$sql = "INSERT INTO ordering (quantityN95, quantityS, quantitySN95, amount, user,tel,region, employeeID,excess) VALUES ($n95, $smask, $sn95, $totalCost,'$user', '$tel','$userregion',$choose,$excess)";

    	$sql1 = "UPDATE rep SET quotaN95='{$leftn95}', quotaSN95='{$leftsn95}', quotaS='{$leftsmask}' where employeeID ='{$choose}' " ;
		if(($conn->query($sql) === true)&&($conn->query($sql1) === true))
		{
			$result = "success";
		}
		else
		{
			$result = "fail";
		}
    }
	ob_end_clean();
    echo json_encode(array('status'=>$result));//pass the value back to js
    $conn->close();//close connection
	
?>
