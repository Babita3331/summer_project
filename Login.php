<?php 
session_start();
error_reporting(1);
$roomType=$_GET['type'];
if($_SESSION['create_account_logged_in']!="")
{
header('location:Booking Form.php?type='.urlencode(serialize($roomType)));
}
error_reporting(1);
require('connection.php');
extract($_REQUEST);
$emailErr=$passwordErr="";
$email=$password="";
if(isset($login))
{
  if(empty($_POST['eid']))
  {
    $emailErr="Enter Email address";
  }
  else{
    $email=$_POST['eid'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  
  if(empty($_POST['pass']))
  {
    $passwordErr="Enter Password";
  }
  else{
    $password=$_POST['pass'];
   
   }

  if(!empty($emailErr)||!empty($passwordErr))
  {
    
  $error= "<h4 style='color:red'>fill all details</h4>";  
  }   
  else
  {
  $sql=mysqli_query($con,"select * from create_account where email='$eid' && password='$pass' ");
    if(mysqli_num_rows($sql))
    {
    $_SESSION['create_account_logged_in']=$eid;  
    header('location:index.php'); 
    }
    else
    {
    $error= "<h4 style='color:red'>Invalid login details</h4>"; 
    } 
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hotel Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="fontawesome/css/all.css" rel="stylesheet">
  <link href="css/style.css"rel="stylesheet"/>
</head>
<body style="margin-top:50px;">
<?php
include('Menu Bar.php');
?>
<div class="container-fluid"><!-- Primary Id-->
  <div class="container">
    <div class="row"><br>
    <center><?php echo $_GET['msg'];?></center>
      <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center"style="box-shadow:2px 2px 2px;background-color:#f4ac41;"><br>

        	<h1 align="center"><b><font style="font-family: 'Libre Baskerville', serif;text-shadow:3px 3px #000;">User Login ?</font></b></h1>
          <img src="image/clipart/login-user-icon.png" class="img-circle" alt="Bird" width="130" height="120">
          <?php echo @$error; ?>
          <form method="post"><br>
              <div class="form-group">
                <input type="text" class="form-control"name="eid"placeholder="Email Id" value="<?php echo htmlspecialchars($email)?>">
                <span class="text-danger"><?php if(isset($emailErr)) echo htmlspecialchars($emailErr);?></span>
              </div>
            <div class="form-group"> 
                <input type="Password" class="form-control"name="pass"placeholder="Password" value="<?php echo htmlspecialchars($password);?>">
                <span class="text-danger"><?php if(isset($passwordErr)) echo htmlspecialchars($passwordErr);?></span>
            </div>
          <input type="submit" value="Login" name="login" class="btn btn-primary btn-group btn-group-justified"required>
          <div class="form-group forget">
                <a href="Forgot account.php">Forget Account</a>&nbsp; <b>|</b>&nbsp; 
                <a href="Registation form.php">Create an Account</a>
            </div>
      	</form><br>
        </div>
    </div><br>
  </div>
</div>
<?php
include('Footer.php')
?>
</body>
</html>
