  <?php 
session_start();
$msg='';
	if (isset($_POST['loginbtn'])) {
include('connect.php');
            $name = $con->real_escape_string($_POST['name']);
            $email = $con->real_escape_string($_POST['email']);
            $password = $con->real_escape_string($_POST['password']);
            
            $gender = $con->real_escape_string($_POST['gender']);
            $contact = $con->real_escape_string($_POST['contact']);
            $interest = $con->real_escape_string($_POST['interest']);
            $rating = $con->real_escape_string($_POST['rating']);
            $im = $con->real_escape_string($_POST['im']);
            $Department = $con->real_escape_string($_POST['Department']);

                      $hash = password_hash($password, PASSWORD_BCRYPT);

             $sql = $con->query("SELECT id FROM user WHERE email='$email'");
      if ($sql->num_rows > 0) {
        $msg = "Sorry, This Email already exists in the database!";
      } 
      else{ $con->query("INSERT INTO user (name,email,password,department,contact,gender,interest,rating,im) VALUES ('$name', '$email', '$hash','$Department','$contact','$gender','$interest','$rating', '$im')");
              $msg= "Congrats!!!, You have Successfully registered";
            
          }
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
<!--Form validation starts -->
<script>

function validation()
{

  var name=document.getElementById("name").value;
  var contact=document.getElementById("contact").value;
  var email=document.getElementById("email").value;
  var password=document.getElementById("password").value;
  var c_password=document.getElementById("c_password").value;
  var gender=document.getElementById("gender").value;
  var interest=document.getElementById("interest").value;
  var Department=document.getElementById("Department").value;
  var im=document.getElementById("im").value;
  var rating=document.getElementById("rating").value;


  if(name=="" || name==null)
  {
    alert("Name Field Is Empty");
    return false;
  }

 else if (name.length<3)
  {
    alert("Enter proper name");
    return false;
  }

  else if(email=="" || email==null)
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
    alert("Password length should be minimum 6 characters");
    return false;
  }
  else if(password!=c_password)
  {
    alert("Password Does Not Match");
    return false;
  }
 else if(contact=="" || contact==null || contact.length<=0 || contact.length>=11 || contact.length<10)
  {
    alert("Invalid Contact Number");
    return false;
  }

  else if(validatePhone())
  {
    alert("contact Number Can Be Only Number Digit");
    return false;
  }
  else if(gender=="")
  {
    alert("Choose your gender");
    return false;
  }
  else if(Department=="")
  {
    alert("Choose your Department");
    return false;
  }
   else if(interest=="")
  {
    alert("Choose your interest");
    return false;
  }
   else if(rating=="")
  {
    alert("Choose your rating");
    return false;
  }
   else if(im=="")
  {
    alert("Choose Who you are");
    return false;
  }
  else
  {
    return true;
  }

}

function validatePhone()
{
  var val=document.getElementById("contact").value;
  for(var i=0;i<val.length;i++)
  {
    if((val.charCodeAt(i)<48 || val.charCodeAt(i)>57))
    {
      return true;
    }
    else
    {
      false;
    }
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

<!--Form validation ends -->


</head>
<body>
	<?php include("nav.php"); ?>
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
  <h2>Sign up Form</h2>
</center>
    	<!-- form starts -->
    	<form method="post" action="signup.php">
    <div class="form-group">
      <label for="name">Name:</label>
                <div class="input-group">

         <div class="input-group-addon">
     <i class="glyphicon glyphicon-user"></i>
        
       </div>
      <input type="name" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div></div>
    <div class="form-group">
      <label for="email">E-mail:</label>
       <div class="input-group">
       <div class="input-group-addon">
    <i class="glyphicon glyphicon-envelope"></i>
        
       </div>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div></div>
     <div class="form-group">
      <label for="password">Password:</label>
       <div class="input-group">
       <div class="input-group-addon">
    <i class="glyphicon glyphicon-lock"></i>
        
       </div>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div></div>
     <div class="form-group">
      <label for="c_password"> Confirm Password:</label>
       <div class="input-group">
       <div class="input-group-addon">
    <i class="glyphicon glyphicon-lock"></i>
        
       </div>
      <input type="password" class="form-control" id="c_password" placeholder="Enter password again" name="c_password">
    </div></div>
     <div class="form-group">
      <label for="contact">Contact No:</label>
         <div class="input-group">
       <div class="input-group-addon">
    <i class="glyphicon glyphicon-earphone"></i>
        
       </div>
      <input type="text" class="form-control" id="contact" placeholder="Enter contact" name="contact">
    </div></div>
   <div class="form-group">
      <label class="control-label" for="gender">Gender:</label>
      
        <select name="gender" id="gender" class="form-control">
          <option value="" disabled="disabled" selected="selected">Choose your Gender</option>          
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
      
    </div>
     <div class="form-group">
      <label class="control-label" for="Department">Department:</label>
      
        <select name="Department" id="Department" class="form-control">
          <option value="" disabled="disabled" selected="selected">Choose your Department</option>     
           <option value="AEIE">AEIE</option>
          <option value="Applied science">Applied science</option>     
          <option value="CSE">CSE</option>
          <option value="ECE">ECE</option>
          <option value="ME">ME</option>
          <option value="civil">civil</option>
          <option value="CE">CE</option>        
          <option value="EE">EE</option>
          <option value="BT">BT</option>
          <option value="FT">FT</option>
          <option value="IT">IT</option>
        </select>
      
    </div>

     <div class="form-group">
      <label class="control-label" for="interest">Field of interest:</label>
      
        <select name="interest" id="interest" class="form-control">
          <option value="" disabled="disabled" selected="selected">Choose your Field of interest</option>     
           <option value="C">C</option>
          <option value="CPP">CPP</option>     
          <option value="Java">Java</option>
          <option value="Python">Python</option>
          <option value="JavaScript">JavaScript</option>
          <option value="PHP">PHP</option>
          <option value="Guitarist">Guitarist</option>        
          <option value="Vocalist">Vocalist</option>
          <option value="Drummer">Drummer</option>
          <option value="Dancer">Dancer</option>
          <option value="Cricket">Cricket</option>
          <option value="Football">Football</option>
        </select>
      
    </div>
    <div class="form-group">
      <label class="control-label" for="rating">Rate Yourself in above Skil:</label>
      
        <select name="rating" id="rating" class="form-control">
          <option value="" disabled="disabled" selected="selected">Choose your rating</option>     
           <option value="1">1</option>
          <option value="2">2</option>     
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>        
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          
        </select>
      
    </div>
    <div class="form-group">
      <label class="control-label" for="Im"> I am:</label>
      
        <select name="im" id="im" class="form-control">
          <option value="" disabled="disabled" selected="selected">Choose who you are:</option>          
          <option value="Teacher">Teacher</option>
          <option value="Student">Student</option>
          <option value="Associate">Associate</option>
        </select>
      
    </div>


    <button type="submit" onclick="return validation();" name="loginbtn" class="btn btn-info btn-block">Submit</button>
  </form>
    	<!-- form end -->

    </div>
    <div class="col-sm-4"></div>
 	 </div>
 	 <br>
	</div>

</body>
</html>