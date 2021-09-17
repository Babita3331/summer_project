<?php
include('connection.php');
extract($_REQUEST);
$error = array();

if(isset($_POST['save']))
{
$name=$_POST['fname'];
$email=$_POST['email'];
$password=$_POST['Passw'];
$mobile=$_POST['mobi'];
$address=$_POST['addr'];
$gender=$_POST['gend'];
$country=$_POST['countr'];
$picture=$_POST['pict'];

 if(empty($name))
 {
   $error['name']="name is required"; 
 }
 else{
  $name=$_POST['fname'];
 }
 if(empty($email))
 {
   $error['email']="email is required"; 
 }
 else{
  $email=$_POST['email'];
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error['email'] = "Invalid email format";
  }
 }
 if(empty($password))
 {
   $error['password']="password is required";
   
 }
 else{
   $password=$_POST['Passw'];
 }
 if(empty($mobile))
 {
   $error['mobile']="mobile is required";
 }
 else{
   if(strlen($mobile)!=14){
   $error['mobile']="number should be equal to 10";
   }
   else {
     
    $mobile=$_POST['mobi'];
   }

 }
 if(empty($address))
 {
   $error['address']="address is required";
   
 }
 else{
   $address=$_POST['addr'];
 }
 if(empty($gender))
 {
   $error['gender']="gender is required";
   
 }
 else{
   $gender=$_POST['gend'];
 }
 if(empty($country))
 {
   $error['country']="country is required";
   
 }
 else{
   $country=$_POST['countr'];
 }
 if(empty($picture))
 {
   $error['picture']="picture is required";
   
 }
 else{
   $picture=$_POST['pict'];
 }

 if(!empty($error))
 {
   $msg= "please fill all the form";   
 }
 else{
  $sql= mysqli_query($con,"select * from create_account where email='$email' ");
  if(mysqli_num_rows($sql))
  {
  $msg= "<h1 style='color:red'> account already exists</h1>";    
  }
  else
  {

      $sql="insert into create_account(name,email,password,mobile,address,gender,country,pictrure) values('$name','$email','$password','$mobile','$address','$gender','$country','$picture  ')";
   if(mysqli_query($con,$sql))
   {
   $msg= "<h1 style='color:green'>Data Saved Successfully</h1>"; 
   header('location:Login.php'); 
   }
  }
 } 
 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hotel Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
</head>
<body style="margin-top:50px;">
  <?php 
include('Menu Bar.php');
  ?>
<div class="container-fluid"style="background-color:#4286f4;color:#000;"> <!-- Primary Id-->
  <div class="container">
    <div class="row">
      <center><h1 style="background-color:#ed2553; border-radius:50px;display:inline-block;"><b><font color="#080808">Create New Account?</font></b></h1></center>
       <center><?php echo $msg;?></center><br>
      <div class="col-sm-2"></div>
      <div class="col-sm-6 ">
        <form class="form-horizontal"method="post">
          <div class="form-group">

            <div class="control-label col-sm-5"><h4>Full name :</h4></div>
          <div class="col-sm-7">
              <input type="text" name="fname" class="form-control"placeholder="Enter Your Name" value="<?php echo $name;?>">
              <div style="color:red;"><?php if(isset($error['name'])) echo $error['name'];?></div>
          </div> 
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4>Email-Id:</h4></div>
          <div class="col-sm-7">
              <input type="text" name="email" class="form-control"placeholder="Enter Your Email-id" value="<?php echo $email;?>">
              <div style="color:red;"><?php if(isset($error['email'])) echo $error['email'];?></div>
          </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4>Password :</h4></div>
          <div class="col-sm-7">
              <input type="password" name="Passw" class="form-control"placeholder="Enter Your Password" value="<?php echo $password;?>">
              <div style="color:red;"><?php if(isset($error['password'])) echo $error['password'];?></div>
          </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4>Mobile No:</h4></div>
          <div class="col-sm-7">
              <input type="text" name="mobi" class="form-control"placeholder="Enter Your Mobile Number" pattern="+977[7-9]{2}-[0-9]{3}-[0-9]{4}" value="+977">
              <div style="color:red;"><?php if(isset($error['mobile'])) echo $error['mobile'];?></div>
          </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4>Address :</h4></div>
          <div class="col-sm-7">
              <textarea  name="addr" class="form-control"><?php echo $address;?></textarea>
              <div style="color:red;"><?php if(isset($error['address'])) echo $error['address'];?></div>
          </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4 id="top">Gender :</h4></div>
          <div class="col-sm-7">
              <input type="radio" name="gend"value="male"><b>Male</b>&emsp;
              <input type="radio" name="gend"value="male"><b>Female</b>&emsp;
              <input type="radio" name="gend"value="male"><b>Other</b>
          </div>
          <div style="color:red;"><?php if(isset($error['gender'])) echo $error['gender'];?></div>
          </div>

          <div class="form-group">
            <div class="control-label col-sm-5"><h4>Country :</h4></div>
          <div class="col-sm-7">
            <select name="countr" class="form-control">
              <option value="">----</option>
              <option value="nepal">Nepal</option>
              <option value="pakistan">Pakistan</option>
              <option value="india">India</option>
              <option value="america">America</option>
              <option value="china">China</option>
            </select>
        </div>
        <div style="color:red;"><?php if(isset($error['country'])) echo $error['country'];?></div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4 id="top">profile pic :</h4></div>
          <div class="col-sm-7">
              <input type="file" name="pict"accept="image/*">
          </div>
          <div style="color:red;"><?php if(isset($error['picture'])) echo $error['picture'];?></div>
          <div class="row">
            <div class="col-sm-6"style="text-align:right;"><br>
            <input type="submit" value="Submit" name="save"class="btn btn-success btn-group-justified" style="color:#000;font-family: 'Baloo Bhai', cursive;height:40px;"/>
          </div>
          </div>
          </div>
        </form>
        </div>
      </div>
        <div class="col-sm-4">
        </div>
    </div>
  </div>
</div>
<?php
    include('Footer.php')
?>
</body>
</html>
