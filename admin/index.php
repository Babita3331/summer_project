<?php 
session_start();
error_reporting(1);
require('../connection.php');
extract($_REQUEST);
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


	if(!empty($emailErr)|| !empty($passwordErr))
	{
	$error= "<h3 style='color:red'>fill all details</h3>";	
	}		
	else
	{
	$sql=mysqli_query($con,"select * from admin where username='$eid' && password='$pass' ");
		if(mysqli_num_rows($sql))
		{
		$_SESSION['admin_logged_in']=$eid;	
		header('location:dashboard.php');	
		}
		else
		{
		$error= "<h3 style='color:red'>Invalid login details</h3>";	
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
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link href="../fontawesome/css/all.css" rel="stylesheet">
  <link href="../css/style.css"rel="stylesheet"/>
</head>
<body id="primary"style="margin-top:50px;">
	<?php
include('Menu Bar.php');
	?>
<div class="container-fluid"> <!-- Primary Id-->
  <div class="container">
    <div class="row"><br>
      <div class="col-sm-4"></div>
		<div class="col-sm-4 text-center"style="box-shadow:2px 2px 2px;background-color:#990707;">
			
			<h1 align="center"><b><font style="font-family: 'Libre Baskerville', serif;text-shadow:5px 5px #000;">Admin Login ?</font></b></h1>

          <img src="../image/clipart/user.png"alt="Bird" width="200" height="170"style="padding-top:30px;">

			<?php echo @$error;?>
          <form action="" method="post"><br>
              <div class="form-group">
                <input type="Email" class="form-control" name="eid" placeholder="Email Id" value="<?php echo htmlspecialchars($email);?>">
                <span style="color:white;"><?php if(isset($emailErr)) echo htmlspecialchars($emailErr);?></span>
              </div>
            <div class="form-group">
                <input type="Password" class="form-control" name="pass" placeholder="Password" value="<?php echo htmlspecialchars($password);?>">
                <span style="color:white;"><?php if(isset($passwordErr)) echo htmlspecialchars($passwordErr);?></span>
            </div>
          <input type="submit" value="Login" name="login" class="btn btn-primary btn-group btn-group-justified">
      	</form><br>  
        </div>
    </div><br>
  </div>
</div>
<?php
include('Footer.php');
?>
</body>
</html>
