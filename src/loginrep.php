<?php
    
    header('Content-type:application/json'); //set the default time
    session_start();
    $json_raw = file_get_contents("php://input");
    $json_arr = json_decode($json_raw,true);

    $user = $json_arr["user"];  //use json to pass value
    $pwd = $json_arr["pwd"];
    $region = $json_arr["region"];

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
    //check if the username and password match        
    $sql="SELECT user, tel, region, employeeID FROM rep WHERE user ='{$user}' and pwd='{$pwd}' ";
    $rs = mysqli_query($conn,$sql);
    $res = array();
    $rs1 = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC))
    {
        $res[]=$rows;
    }    
    while($row1 = mysqli_fetch_array($rs1,MYSQLI_ASSOC))
    {
        $_SESSION['user']=$row1['user']; //store username in the session
        $_SESSION['tel']=$row1['tel'];  //store tel in the session
        $_SESSION['region']=$row1['region']; //store region in the session
        $_SESSION['employeeID']=$row1['employeeID']; //store employeeID in the session
    } 
    if(!empty($res))
    {
        $result = "success";
    }
    else{
        $result = "fail";
    }

    ob_end_clean();
    echo json_encode(array('status'=>$result));  //pass value back to js
    $conn->close();  //close connection
    
?>



