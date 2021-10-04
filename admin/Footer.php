<?php 
include('connection.php');
extract($_REQUEST);
if(isset($send))
{
  if(empty($_POST['n']))
  {
    $nameErr="Please Enter Name";
  }
  else{
    $name=$_POST['n'];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }


  if(empty($_POST['e']))
  {
    $emailErr="Enter Email address";
  }
  else{
    $email=$_POST['e'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }


  if(empty($_POST['mob']))
  {
    $mobileErr="Enter Mobile Number";
  }
  else
   {
      $mobile=$_POST['mob'];
     
      if(!preg_match('/^[0-9]{10}+$/', $mobile))
      {
        $mobileErr="Numbers should be equal to 10";
      }
    }
    if(empty($_POST['msg']))
    {
      $msgErr="Enter Message";
    }
    else{
      
        $msg = $_POST['msg'];
    }
    if(!empty($nameErr)|| !empty($emailErr)|| !empty($mobileErr)|| !empty($msgErr))
    {
      $msg="<h4 style='color:red'>Please Fill all the details</h4>";
    }
    else
    {
mysqli_query($con,"insert into feedback values('','$n','$e','$mob','$msg')");	
$msg= "<h4 style='color:green;'>feedback sent successfully</h4>";
}
}
?>
<!-- Footer1 Start Here-->

<footer style="background-color: #393939;">
    <div class="container-fluid">
	<div class="col-sm-4 hov">
		<img src="../logo/logo2.png"style="width: 100px; object-fit:contain;
  height: 60px;"/><br><br>
    <p class="text-justify"style="color:white;">A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality mattress in a small room to large suites with bigger, higher-quality beds, a dresser, a refrigerator and other kitchen facilities, upholstered chairs, a flat screen television, and en-suite bathrooms. Small, lower-priced hotels may offer only the most basic guest services and facilities. Larger, higher-priced hotels may provide additional guest facilities such as a swimming pool, business center</p><br>
      <center><a href="../about.php" class="btn btn-danger"><b>Read More..</b></a></center><br><br><br>
 <?php
  include('Social ican.php')
?>
	</div>&nbsp;&nbsp;
	<div class="col-sm-4 text-justify">
	       <h3 style="color:#cdd51f;">Contact Us</h3>
      <p style="color:white;"><strong>Address:&nbsp;</strong>Lazimpat, kathmandu</p>
      <p style="color:white;"><strong>Email-Id:&nbsp;</strong>hotal@gmail.com</p>
      <p style="color:white;"><strong>Contact Us:&nbsp;</strong>(+977) 9863443331</p><br><br><br>
    
	</div>&nbsp;
  <!--Feedback Start Here-->
	<div class="col-sm-4 text-center">
      <div class="panel panel-primary">
        <div class="panel-heading">Feedback</div>
          <div class="panel-body">
            <?php echo @$msg; ?>
      <div class="feedback">
      <form method="post"><br>
        <div class="form-group">
          <input type="text" name="n" class="form-control" id="#"placeholder="Enter Your Name" value="<?php echo htmlentities($name);?>">
          <span class="text-danger"><?php if(isset($nameErr)) echo htmlentities($nameErr);?></span>
        </div>
        <div class="form-group">
          <input type="text" name="e" class="form-control" id="#"placeholder="Email" value="<?php echo htmlentities($email);?>">
          <span class="text-danger"><?php if(isset($emailErr)) echo htmlentities($emailErr);?></span>
        </div>
        <div class="form-group">
          <input type="number" name="mob" class="form-control" id="#"placeholder="Mobile Number" value="<?php echo htmlentities($mobile);?>">
          <span class="text-danger"><?php if(isset($mobileErr)) echo htmlentities($mobileErr);?></span>
        </div>
        <div class="form-group">
          <textarea type="text" name="msg" class="form-control" id="#"placeholder="Type Your Message"><?php echo htmlentities($message);?></textarea>
          <span class="text-danger"><?php if(isset($msgErr)) echo htmlentities($msgErr);?></span>
        </div>
          <input type="submit" value="send" name="send" class="btn btn-primary btn-group-justified">
      </form>     
        </div>
       </div>
      </div>
    </div>

    <!--Feedback Panel Close here-->

  </div>
</footer>
<!--Footer1 Close Here-->

<!--Footer2 start Here-->

<footer class="container-fluid text-center"style="background-color:#000408;height:40px;padding-top:10px;color:#f0f0f0;">
  <p>Develope By AmitVish@ | All Rights Reserved 2019</p>
</footer>

<!--Footer2 start Here-->