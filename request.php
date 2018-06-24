<?php
include('connect.php');
$id= $_GET['id'];
$sql = $con->query("update partner set
			request='1'						
			where id='$id'");
                      header('Location: index.php');
