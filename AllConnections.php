<?php session_start(); ?>
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
    <div class="col-sm-3"></div>
    <div class="col-sm-6"> 
      <center>
        <h2 style="color:#68DB0C ">ALL CONNECTIONS</h2>
        </center>
          <table class="table">
        <?php 
          include('connect.php');
          $sql=$con->query("select * from partner where request='1'");
          if($sql->num_rows > 0)
            while ($data=$sql->fetch_array()) {
              $e=$data['myemail'];
         $sqli=$con->query("select * from user where email='$e'");
       $mya=$sqli->fetch_array();
        $em=$data['partner'];
         $sqlii=$con->query("select * from user where email='$em'");
       $my=$sqlii->fetch_array();

         ?>
        
      
          <tr>
            
            <td><font style="font-size: 20px; color: #FF2A55; "><b><a href="Publicprofile.php?email=<?php echo $e; ?>"><?php echo $mya['name'] ?></a></b></font></td>
            
            <td><img src="connection.jpg" style="height: 20px; width: auto;"></td>
       
            <td><font style="font-size: 20px; color: #002AFF;"><b><a href="Publicprofile.php?email=<?php echo $em; ?>"><?php echo $my['name'] ?></a></b></font></td>
  

          </tr>
       <br>
        <?php } ?>
      
 </table>

    </div>
    <div class="col-sm-3"></div>
 	 </div>
 	 <br>
	</div>

</body>
</html>