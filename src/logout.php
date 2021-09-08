<?php
	session_start();
	$_SESSION['pwd']==null;
	$_SESSION['user']=null;
	$_SESSION['region']=null;
	$_SESSION['tel']=null;
	session_destroy(); //session destroy
	echo "<script>window.location.href='index.html';</script>"; //go back to main page
?>