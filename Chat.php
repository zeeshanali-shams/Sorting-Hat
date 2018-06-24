 <?php session_start();
    include('connect.php');
          if (isset($_POST['send'])) {
          	$email=$_SESSION['loginemail'];
           $chat = $_POST['chat'];
            date_default_timezone_set('Asia/Calcutta');
        $time= date("j F Y"); 

          	$con->query("INSERT INTO chat (email,messege,posted_on) VALUES ('$email','$chat','$time')");
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
    <div class="col-sm-3"></div>
    <div class="col-sm-6"  > 
      <center>
        <h2 style="color:#68DB0C ">Chat</h2>
        </center>
          <div style="background-color: #e6eaf2 ; height: 370px; overflow: auto;">
        
        <table class="table" style="background-color: #e6eaf2">

        <?php
          $sql=$con->query("select * from chat order by id desc");
          if($sql->num_rows > 0)
            while ($data=$sql->fetch_array()) {
              $e=$data['email'];
         $sqli=$con->query("select * from user where email='$e'");
       $mya=$sqli->fetch_array();
       

         ?>
        
        	<tr>
        		<td ><font style=" color: green;"><b><a href="Publicprofile.php?email=<?php echo $e; ?>"><?php echo $mya['name']; ?></a></b></font></td>
        		<td><?php echo $data['messege']; ?>  </td>
        		<td><small style="font-size: 10px;"><?php echo $data['posted_on']; ?> </small> </td>
        	</tr>
     
        <?php } ?>
       </table>

		</div>
		<center>
			<?php if(isset($_SESSION['loginemail'])){ ?>
		<div><br>
		<form method="post" action="Chat.php">
			<div class="input-group">
			<textarea name="chat" placeholder="Enter here..."></textarea>		

			</div>
				<div class="input-group">
					<input type="submit" name="send" value="Send" class="btn btn-info">
				</div>
			
		</form>
			
		</div><?php } ?></center>
    </div>
    <div class="col-sm-3"></div>
 	 </div>
 	 <br>
	</div>

</body>
</html>