 <?php 
  session_start();
  $msg='';
 if (isset($_POST['loginbtn'])) {
include('connect.php');
          $email = $con->real_escape_string($_POST['email']);
          $password = $con->real_escape_string($_POST['password']);

          $sql = $con->query("SELECT * FROM user WHERE email='$email'");
          if ($sql->num_rows > 0) {
              $data = $sql->fetch_array();
              if (password_verify($password, $data['password'])) {
                $_SESSION['loginemail'] = $email;
                      header('Location: index.php');
              }
               else 
                $msg= 'You have entered Wrong email or password';
              }
     else
               $msg= 'You have entered Wrong email or password';
  }
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sorting Hat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- form validation starts -->
  <script type="text/javascript">
    function validation()
{
  var email=document.getElementById("email").value;
  var password=document.getElementById("password").value;
  if(email=="" || email==null)
  {
      alert("Email Field Is Empty");
      return false;
  }
  else if(validateEmail())
  {
      alert("invalid Email Id");
      return false;
  }
  else if(password=="" || password==null)
  {
    alert("Password Field Is Empty");
    return false;
  }
  else if( password.length<6)
  {
    alert("Invalid Password");
    return false;
  }
}
function validateEmail()
{
var x=document.getElementById("email").value;

var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");

if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
    return true;
  }
}
  </script>
    <!-- form validation ends -->
</head>
<body>
 <!--navigation starts -->
  <?php include('nav.php'); ?>
  <!--navigation ends -->
<div class="container">
<div class="row">
    <div class="col-sm-4"></div>
<div class="col-sm-4">
  <center>
    <?php if($msg) { ?>
    <div class="alert alert-danger">
      <?php echo $msg; ?>
    </div>
    <?php } ?>
  <h3>Login Form </h3>
</center>
 
  <form method="post" action="login.php">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="email" placeholder="Email">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <br>
     <input type="hidden" name="csrf" value="<?php echo $csrf ?>"> <!--For security protection -->
   <button type="submit" onclick="return validation();" name="loginbtn" class="btn btn-info btn-block">Login</button>
    
  </form>
  <br>
  
  </div>
<div class="col-sm-4"></div>
  
</div>

</body>
</html>

