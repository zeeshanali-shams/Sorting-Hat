<?php
	session_start();
	unset($_SESSION['loginemail']);
	
	session_destroy();
	header('Location: index.php');
	exit();
  ?>
