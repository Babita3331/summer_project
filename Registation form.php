<?php
include('connection.php');
// extract($_REQUEST);
$nameErr=$emailErr=$passwordErr=$mobileErr=$addressErr=$genderErr=$countryErr=$pictureErr="";
$name=$email=$password=$mobile=$address=$gender=$country=$picture="";
if(isset($_POST['save']))
{
  if(empty($_POST['fname']))
  {
    $nameErr="Please Enter Name";
  }
  else{
    $name=$_POST['fname'];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if(empty($_POST['email']))
  {
    $emailErr="Enter Email address";
  }
  else{
    $email=$_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if(empty($_POST['Passw']))
  {
    $passwordErr="Enter Password";
  }
  else{
    
      $password = $_POST['Passw'];
  }
  if(empty($_POST['mobi']))
  {
    $mobileErr="Enter Mobile Number";
  }
  else
   {
      $mobile=$_POST['mobi'];
     
      if(!preg_match('/^[0-9]{10}+$/', $mobile))
      {
        $mobileErr="Numbers should be equal to 10";
      }
    }
    if(empty($_POST['addr']))
    {
      $addressErr="Enter Address";
    }
    else{
      
        $address = $_POST['addr'];
    }

    if(empty($_POST['gend']))
    {
      $genderErr="Select Gender";
    }
    else{
      
        $gender = $_POST['gend'];
    }

    if(empty($_POST['countr']))
    {
      $countryErr="Select Gender";
    }
    else{
      
        $country = $_POST['countr'];
    }

    if(empty($_POST['pict']))
    {
      $pictureErr="Select Picture";
    }
    else{
      
        $picture = $_POST['pict'];
    }

  if(!empty($nameErr) ||!empty($emailErr)|| !empty($passwordErr)|| !empty($mobileErr)|| !empty($addressErr)|| !empty($genderErr)|| !empty($countryErr)|| !empty($pictureErr))
  {
    $msg="Please fill all the form";
  } 
  else
  {
    $sql= mysqli_query($con,"select * from create_account where email='$email' ");
      if(mysqli_num_rows($sql))
      {
      $msg= "<h1 style='color:red'> account already exists</h1>";    
      }
      else
      {
            $sql="insert into create_account(name,email,password,mobile,address,gender,country,pictrure) values('$name','$email','$password','$mobile','$address','$gender','$country','$picture')";
        if(mysqli_query($con,$sql))
        {
          $msg= "<h1 style='color:green'>Data Saved Successfully</h1>"; 
        header('location:Login.php?msg='.$msg); 
        
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
      <span class="text-danger"> <center><?php echo $msg;?></center></span><br>
      <div class="col-sm-2"></div>
      <div class="col-sm-6 ">
        <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="form-group">

            <div class="control-label col-sm-5"><h4>Name :</h4></div>
          <div class="col-sm-7">
              <input type="text" name="fname" class="form-control"placeholder="Enter Your Name" value="<?php echo htmlspecialchars($name);?>">
               <span class="text-danger"><?php if(isset($nameErr)) echo htmlspecialchars($nameErr);?></span>
          </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4>Email-Id:</h4></div>
          <div class="col-sm-7">
              <input type="text" name="email" class="form-control"placeholder="Enter Your Email-id" value="<?php echo htmlspecialchars($email);?>">
              <span class="text-danger"><?php if(isset($emailErr)) echo htmlspecialchars($emailErr);?></span>
          </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4>Password :</h4></div>
          <div class="col-sm-7">
              <input type="password" name="Passw" class="form-control"placeholder="Enter Your Password" value="<?php echo htmlspecialchars($password);?>">
              <span class="text-danger"><?php if(isset($passwordErr)) echo htmlspecialchars($passwordErr);?></span>
          </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4>Mobile No:</h4></div>
          <div class="col-sm-7">
              <input type="numberx" name="mobi" class="form-control"placeholder="Enter Your Mobile Number" value="<?php echo htmlspecialchars($mobile);?>">
              <span class="text-danger"><?php if(isset($mobileErr)) echo htmlspecialchars($mobileErr);?></span>
          </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4>Address :</h4></div>
          <div class="col-sm-7">
              <textarea name="addr" class="form-control">
              <?php echo htmlspecialchars($address);?></textarea>
               <span class="text-danger"><?php if(isset($addressErr)) echo htmlspecialchars($addressErr);?></span>
          </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4 id="top">Gender :</h4></div>
          <div class="col-sm-7">
              <input type="radio" name="gend" value="male" <?php echo $_POST['gend'] == "male" ?  'checked':""; ?>><b>Male</b>&emsp;
              <input type="radio" name="gend" value="female" <?php echo $_POST['gend'] == "female" ?  'checked':""; ?>><b>Female</b>&emsp;
              <input type="radio" name="gend" value="other"<?php echo $_POST['gend'] == "other" ?  'checked':""; ?>><b>Other</b>
          </div>
          <span class="text-danger"><?php if(isset($genderErr)) echo htmlspecialchars($genderErr);?></span>
          </div>

          <div class="form-group">
            <div class="control-label col-sm-5"><h4>Country :</h4></div>
          <div class="col-sm-7">
            <select name="countr" class="form-control">
              <option value="">---</option>
              <option value="usa" <?php echo $_POST['countr'] == "usa" ?  'selected':""; ?>>USA</option>
              <option value="india"<?php echo $_POST['countr'] == "india" ?  'selected':""; ?>>India</option>
              <option value="srilanka"<?php echo $_POST['countr'] == "srilanka" ?  'selected':""; ?>>SriLanka</option>
              <option value="china"<?php echo $_POST['countr'] == "china" ?  'selected':""; ?>>China</option>
            </select>
        </div>
        <span class="text-danger"><?php if(isset($countryErr)) echo htmlspecialchars($countryErr);?></span>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4 id="top">profile pic :</h4></div>
          <div class="col-sm-7">
              <input type="file" name="pict"accept="image/*">
          </div>
          <div class="row">
          <span class="text-danger"><?php if(isset($pictureErr)) echo htmlspecialchars($pictureErr);?></span>
            <div class="col-sm-6"style="float:right;"><br>
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