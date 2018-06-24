<?php 

	 session_start();

	$email=$_SESSION['loginemail'];
	$partner=$_GET['id'];
	include('connect.php');
	if($con->query("insert into partner(myemail,partner,request) values('$email','$partner','0')"))
		header('location: index.php');
?>
