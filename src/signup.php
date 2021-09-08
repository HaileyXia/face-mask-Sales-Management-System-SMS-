<?php
	header('Content-type:application/json');
	session_start();
	$json_raw = file_get_contents("php://input");
    $json_arr = json_decode($json_raw,true);

    $user = $json_arr["user"]; //use json to pass value
    $realname = $json_arr["realname"];
    $pwd = $json_arr["pwd"];
    $passportID = $json_arr["passportID"];
    $tel = $json_arr['tel'];
    $email = $json_arr['email'];
    $region = $json_arr['region'];

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

	$result = "SELECT * from customer where user='$user'";
	$dup = $conn->query($result);
	$num_users=mysqli_num_rows($dup);
	//$rs = mysql_query($result);
	if($num_users>0) //check if there exists same name
	{
    	$result = "dup";
	}
	else{ //insert value into database
		$sql = "INSERT INTO customer (user, realname, pwd, passportID, tel, email, region) VALUES ('$user', '$realname', '$pwd', '$passportID', '$tel', '$email', '$region')";

		if($conn->query($sql) === true)
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

