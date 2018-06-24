<?php 
session_start();
include('connect.php');

	if (isset($_GET['email'])) {
  $email=$_GET['email'];
 $sql = $con->query("SELECT * FROM user WHERE email='$email'");
         $data = $sql->fetch_array();
         
         }
 
       
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Sorting Hat</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include("nav.php"); ?>
	<div class="container">
	<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4"> 
<center>
   <h2 style="color: #629AAB"><?php echo $data['name']; ?>'s Profile</h2>
</center>
    	<!-- form starts -->
    	  <hr style=" display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0; ">
    <fieldset class="form-group" style="font-size: 20px;">
      <div>Name: <strong><?php echo $data['name']; ?></strong></div>
      <div>Gender: <strong><?php echo $data['gender']; ?></strong></div>
      
      <div>Department: <strong><?php echo $data['department']; ?></strong></div>
      <div>Field of interest: <strong><?php echo $data['interest']; ?></strong></div>
      <div>Expertise Level: <strong><?php echo $data['rating']; echo '/10' ?></strong></div>
      <div>Contact No: <strong><?php echo $data['contact']; ?></strong></div>
      <div>E-mail: <strong><?php echo $data['email']; ?></strong></div>
       <br>

    </fieldset>
        <hr  style=" display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0; ">
    	<!-- form end -->

    </div>
    <div class="col-sm-4"></div>
 	 </div>
 	 <br>
	</div>

</body>
</html>