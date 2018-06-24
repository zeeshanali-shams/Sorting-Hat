 <?php session_start();

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
  <link rel="stylesheet" type="text/css" href="style.css">


</head>
<!-- <body style="background-image: url(image.jpg); background-repeat: no-repeat; background-position: center; width: auto; height: auto;"> -->
<body>
	<?php include("nav.php"); ?>
	<div class="container-fluid">
	
		<div class="row"></div>
    <div class="col-sm-3" style="background-color: #e6eaf2;">
    	<?php 
    	if (isset($_SESSION['loginemail'])) {
include('connect.php');
           $email=$_SESSION['loginemail'];
           
            $sql = $con->query("SELECT * FROM user WHERE email='$email'");
            $data = $sql->fetch_array();

    	?><center>
     	<h3>My Profile</h3>
</center> 
<hr  style=" display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0; ">
		<fieldset class="form-group" >
			<div>Name: <strong><?php echo $data['name']; ?></strong></div>
			<div>Gender: <strong><?php echo $data['gender']; ?></strong></div>
			
			<div>Department: <strong><?php echo $data['department']; ?></strong></div>
			<div>Field of interest: <strong><?php echo $data['interest']; ?></strong></div>
			<div>Expertise Level: <strong><?php echo $data['rating']; echo '/10'; ?></strong></div>
			<div>Contact No: <strong><?php echo $data['contact']; ?></strong></div>
			<div>E-mail: <strong><?php echo $data['email']; ?></strong></div>
			<br>
 <div align="center"><a href="myprofile.php" class="btn btn-success btn-small">Change Skill</a></div>
		</fieldset>
		<hr  style=" display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0; ">
    	<?php } ?>

    </div>

    <div class="col-sm-6">
    	<div>
    		<?php if (isset($_SESSION['loginemail'])) {
 $email=$_SESSION['loginemail'];
     
$new_s = $con->query("SELECT * FROM partner WHERE partner='$email' AND request='0'");
if ($new_s->num_rows >0) { 
     while ($newdata = $new_s->fetch_array()) {

      $partner=$newdata['myemail'];
      $sql=$con->query("SELECT * FROM user WHERE email='$partner'");
      $new_data = $sql->fetch_array();
?>
    			   <center>
      <h3>Requests</h3>
 
          <hr style=" display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0; ">
    <fieldset class="form-group">
      <div>Name: <strong><?php echo $new_data['name']; ?></strong></div>
      <div>Gender: <strong><?php echo $new_data['gender']; ?></strong></div>
      
      <div>Department: <strong><?php echo $new_data['department']; ?></strong></div>
      <div>Field of interest: <strong><?php echo $new_data['interest']; ?></strong></div>
      <div>Expertise Level: <strong><?php echo $new_data['rating']; echo '/10' ?></strong></div>
      <div>Contact No: <strong><?php echo $new_data['contact']; ?></strong></div>
      <div>E-mail: <strong><?php echo $new_data['email']; ?></strong></div>
       <br>
 <div align="center"><a href="request.php?id=<?php echo $newdata['id']; ?>" class="btn btn-info btn-small">Accept Request</a></div>
 
    </fieldset>
        <hr  style=" display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0; ">
<?php } } ?>
    </center>
<?php
    		}else {?>
    			<center>
    		<h1 style=" margin-top: 40px; color:#241212 ;font-family: all;">Looking for a Professional Partner ?</h1>
    	
    	<p style="font-size: 20px; color: #283f25; font-family: all; margin-top: 70px; width: 70%;">
    		<b>We are here, Just Signup with us and
    		 we will find
    		  you the best matches
    		 </b>
    	</p>
    		
    	</center>
    	<?php } ?>
    	
    			
    		
    		
    	</div>
    	
    	
    </div>
     <div class="col-sm-3" style="background-color: #e6eaf2;">
     
<?php
if (isset($_SESSION['loginemail'])) {

?>
	<center>
     	<h3>My Matches</h3>
</center> 
 <?php

	$email=$_SESSION['loginemail'];
include('connect.php');
           
           
            $sql = $con->query("SELECT * FROM user WHERE email='$email'");
            $data = $sql->fetch_array();
            $interest=$data['interest'];
            $im=$data['im'];
            $id=$data['id'];
            $rating=$data['rating'];
            $rating2=$rating + 1;
            $rating3=$rating - 1;
if($im=='Student')
{
       $new_sql = $con->query("SELECT * FROM user WHERE interest='$interest' AND im='Teacher'");
   }
   else if($im=='Teacher')
   {
   	  $new_sql = $con->query("SELECT * FROM user WHERE interest='$interest' AND im='Student'");
   }
   else if ($im=='Associate') {
     	  $new_sql = $con->query("SELECT * FROM user WHERE interest='$interest' AND im='Associate' AND id!='$id' ");

   }

 if ($new_sql->num_rows <=0) { ?>
          <div class="alert alert-danger">
      <?php echo 'No Matching found according to your skills'; ?>
    </div>
   
        	
<?php
}else
{
	 while ($new_data = $new_sql->fetch_array()) {
?>
<hr style=" display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0; ">
		<fieldset class="form-group">
			<div>Name: <strong><?php echo $new_data['name']; ?></strong></div>
			<div>Gender: <strong><?php echo $new_data['gender']; ?></strong></div>
			
			<div>Department: <strong><?php echo $new_data['department']; ?></strong></div>
			<div>Field of interest: <strong><?php echo $new_data['interest']; ?></strong></div>
			<div>Expertise Level: <strong><?php echo $new_data['rating']; echo '/10' ?></strong></div>
			<div>Contact No: <strong><?php echo $new_data['contact']; ?></strong></div>
			<div>E-mail: <strong><?php echo $new_data['email']; ?></strong></div>
       <br>
			<?php 
       $partner=$new_data['email'];
$new_sq = $con->query("SELECT * FROM partner WHERE ( myemail='$email' AND partner='$partner' ) or ( myemail='$partner' AND partner='$email' ) ");
$data=$new_sq->fetch_array();
if ($new_sq->num_rows <=0) { ?>
     
     
 <div align="center"><a href="partner.php?id=<?php echo $new_data['email'];?>" class="btn btn-success btn-small">Add As Partner</a></div>
  <?php } else 
  {  if($data['request']=='1') { ?>
    <div align="center"><a class="btn btn-warning btn-small">Your Partner</a></div>

  <?php } else{ ?>
    <div align="center"><a class="btn btn-danger btn-small">Request Sent</a></div>
    <?php } } ?>
		</fieldset>
        <hr  style=" display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0; ">
		<?php }
}
}
		 ?>
		
	</div>
	</div>
</body>
</html>