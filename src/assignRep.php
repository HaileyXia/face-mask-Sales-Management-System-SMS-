<?php

	date_default_timezone_set("PRC"); //set the default time 
	header('Content-type:application/json');
	session_start();
	$json_raw = file_get_contents("php://input"); 
    $json_arr = json_decode($json_raw,true);

    $employeeID = $json_arr["employeeID"]; //use json to pass value
    $region = $json_arr["region"];

	$user = $_SESSION['user']; //username and tel store in session
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

    if($employeeID>8||$employeeID<=0){ //check if employeeID out of range
        $result = "range";
    }
    else{ //update the rep's region
        $sql1 = "UPDATE rep SET region='{$region}' where employeeID ='{$employeeID}' " ;
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
    echo json_encode(array('status'=>$result)); //pass the value back to js
    $conn->close(); //connection close
	
?>
