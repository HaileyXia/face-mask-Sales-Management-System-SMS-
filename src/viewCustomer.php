<?php
	date_default_timezone_set("PRC"); //set default time
	header('Content-type:application/json');
	session_start();
	$json_raw = file_get_contents("php://input");
    $json_arr = json_decode($json_raw,true);

    $userselect = $json_arr["user"];

	$user = $_SESSION['user']; //get value store in session
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

    $q="SELECT user from ordering where user = '{$userselect}' ";
    $rs0=mysqli_query($conn,$q);
    $res = array();
    while($row = mysqli_fetch_array($rs0,MYSQLI_ASSOC))
    {
        $res[]=$rows;
    }
    if(empty($res)){
        $result = "nouser";
    }
    else{ //get the average, sum, count info for specific user
        $sql1 = "SELECT AVG(quantityN95) as avgn95, AVG(quantityS) as avgs, AVG(quantitySN95) as avgsn95, avg(amount) as avgtotal,sum(quantityN95) as sumn95, sum(quantitySN95) as sumsn95, sum(quantityS) as sums, count(orderingID) as count from ordering where user ='{$userselect}' " ;
        $rs=mysqli_query($conn,$sql1);
        $res = array();
        while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC))
        {
            $result = "success";
            $res[]=$rows;
            $avgn95=$row["avgn95"];
            $avgs=$row["avgs"];
            $avgsn95=$row["avgsn95"];
            $avgtotal=$row["avgtotal"];
            $sumn95=$row["sumn95"];
            $sumsn95=$row["sumsn95"];
            $sums=$row["sums"];
            $count=$row["count"];
        }
    }
	ob_end_clean();
    echo json_encode(array('status'=>$result,'output1'=>$avgn95,'output2'=>$avgs,'output3'=>$avgsn95,'output4'=>$avgtotal,'output5'=>$sumn95,'output6'=>$sums,'output7'=>$sumsn95,'output8'=>$count)); //pass value to js
    $conn->close(); //close connection
	
?>
