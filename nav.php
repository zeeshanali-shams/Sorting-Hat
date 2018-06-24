  
<nav class="navbar navbar-inverse" style="background-color: #283f25; border-color: #283f25;">
	  <div class="container-fluid">

	     <div class="navbar-header">
	      <a class="navbar-brand" style="color: white;" href="index.php"><img src="image.jpg" style="height: 40px; width: 40px; margin-top: -10px; margin-right: 0px;margin-left: 40px;"></a>
	      <a class="navbar-brand" style="color: white;" href="index.php">Sorting Hat</a>
	    </div>
	    <ul class="nav navbar-nav" style="letter-spacing: 1.5px;">
	      <li><a href="index.php">Home</a></li>
	       <li><a href="AllConnections.php">All Connections</a></li>
	       <li><a href="Chat.php">Chat</a></li>
	      
	    
	                    
	        
	      </ul>
	
	   
	    <?php if(isset($_SESSION['loginemail'])){ ?>
	     <ul class="nav navbar-nav navbar-right">
	      <li><a  href="myprofile.php" style="color: white;"><span class="glyphicon glyphicon-user"></span> <?php echo 'My Profile'; ?></a>


	      </li>
	      <li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	    </ul>
	    <?php } else{ ?>

	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	      <li><a href="login.php" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	    </ul>
	    <?php } ?>
	  </div>
	</nav>