<?php
	date_default_timezone_set("PRC");//set the default time
	header('Content-type:application/json');
	session_start();
	$json_raw = file_get_contents("php://input");
    $json_arr = json_decode($json_raw,true);

    $employeeID = $json_arr["employeeID"]; //use json to pass value
    $n95 = $json_arr["n95"];
    $smask = $json_arr["smask"];
    $sn95 = $json_arr["sn95"];

	$user = $_SESSION['user'];//store username and tel in session
	$tel = $_SESSION['tel'];

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

    if($employeeID>8){ //check if employeeID is out of range
        $result = "range";
    }
    else{ //update the quota information
        $sql1 = "UPDATE rep SET quotaN95='{$n95}', quotaS='{$smask}', quotaSN95='{$sn95}' where employeeID ='{$employeeID}' " ;
        if($conn->query($sql1) === true)
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
