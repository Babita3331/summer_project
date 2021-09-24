<?php
session_start();
include('connection.php');
include('Menu Bar.php');
$roomType=unserialize(urldecode($_GET['type']));
$_SESSION['roomType']=$roomType;
$nameErr=$timeErr=$check_outErr=$check_inErr=$occupancyErr="";
$name=$time=$check_out=$check_in=$occupancy="";

if(isset($_POST['savedata']))
{
 
  if(empty($_POST['name']))
  {
    $nameErr="Enter Name";
  }
  else{
    $name=$_POST['name'];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if(empty($_POST['ctime']))
  {
    $timeErr="Enter Time";
  }
  else{
    
      $time = $_POST['ctime'];
    
  }

  if(empty($_POST['codate']))
  {
    $check_outErr="Enter checkout date";
  }
  else{
    
      $check_out = $_POST['codate'];
      
  }

  if(empty($_POST['cdate']))
  {
    $check_inErr="Enter Checkin date";
    
  }
  else{
    
      $check_in = $_POST['cdate'];
      
  }

  if(empty($_POST['Occupancy']))
  {
    $occupancyErr="Enter Occupancy";
  
  }
  else{
    
      $occupancy = $_POST['Occupancy'];
    
  }
  
  if(!empty($nameErr)|| !empty($timeErr)|| !empty($check_outErr)|| !empty($check_inErr)|| !empty($occupancyErr))
  {
    echo "Please fill all the details";
  }
   
  else{

  $sql= mysqli_query($con,"select * from room_booking_details where email='$eid' and roomType='$roomType'");
  if(mysqli_num_rows($sql)) 
  {
  $error= "You have already booked this room";    
  header('location:success.php?error='.$error); 
  }
  else
  {
    $sql="insert into room_booking_details(name,email,roomType,check_in_date,check_in_time,check_out_date,Occupancy) 
    values('$name','$eid','$roomType','$check_in','$time','$check_out','$occupancy')";
   if(mysqli_query($con,$sql))
   {
    $success="You have successfully booked the room";
    header('location:success.php?type='.$_SESSION['roomType'].'&name='.$name.'&success='.$success); 
   }
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
<body style="margin-top:60px;">
  <?php
  include('Menu Bar.php');
  ?>
<div class="container-fluid text-center"id="primary" style="background:#f8f9fa;"><!--Primary Id-->
  <h1 style="text-shadow: 1px 3px 7px #1b1314;"> BOOKING FORM </h1><br>
  <div class="container">
    <div class="row">
    
      <!--Form Containe Start Here-->
     <form class="form-horizontal" method="POST" action="">
     <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"><h4>Full name :</h4></div>
                  <div class="col-sm-7">
                  <input type="text"  class="form-control" name="name" placeholder="Enter Your full Name" value="<?php echo htmlspecialchars($name);?>">
                  <span class="text-danger"><?php if(isset($nameErr)) echo htmlspecialchars($nameErr);?></span>
                  </div>
              </div>
            </div>
          </div>
          
          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"><h4>Check In Date :</h4></div>
                  <div class="col-sm-7">
                  <input type="date" name="cdate" min="<?php echo date('Y-m-d'); ?>" class="form-control"value="<?php echo htmlspecialchars($check_in);?>">
                  <span class="text-danger"><?php if(isset($check_inErr)) echo htmlspecialchars($check_inErr);?></span>
                  </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                 <div class="control-label col-sm-5"><h4>Check In Time:</h4></div>
                   <div class="col-sm-7">
                    <input type="time" name="ctime" class="form-control"value="<?php echo htmlspecialchars($time);?>">
                    <span class="text-danger"><?php if(isset($timeErr)) echo htmlspecialchars($timeErr);?></span>
                  </div>
              </div>
            </div>
          </div>
           <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"><h4>Check Out Date :</h4></div>
                <div class="col-sm-7">
                  <input type="date" name="codate" min="<?php echo date('Y-m-d'); ?>" class="form-control" value="<?php echo htmlspecialchars($check_out);?>">
                  <span class="text-danger"><?php if(isset($check_outErr)) echo htmlspecialchars($check_outErr);?></span>
                </div> 
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <label class="control-label col-sm-5"><h4 id="top">Occupancy :</h4></label>
                <div class="col-sm-7">
                  <div class="radio-inline"><input type="radio" value="single" name="Occupancy" <?php echo $_POST['Occupancy'] == "single" ?  'checked':""; ?>>Single</div>
                  <div class="radio-inline"><input type="radio" value="twin" name="Occupancy" <?php echo $_POST['Occupancy'] == "twin" ?  'checked':""; ?>>Twin</div>
                  <div class="radio-inline"><input type="radio" value="dubble" name="Occupancy" <?php echo $_POST['Occupancy'] == "dubble" ?  'checked':""; ?>>Dubble</div>
                </div> 
                <span class="text-danger"><?php if(isset($occupancyErr)) echo htmlspecialchars($occupancyErr);?></span>
              </div>
            </div>          
          </div>
          <input style="margin:20px 500px 10px 0px;" type="submit" value="submit" name="savedata" class="btn btn-primary"/><br><br><br>
          </form><br>
        </div>
      </div>
    </div>
  </div>
<?php
include('Footer.php')
?>
</body>
</html>