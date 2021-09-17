<?php 
include('Menu Bar.php');
include('connection.php');
$roomType= $_GET['type'];
$Occupancy=$_POST['Occupancy'];
$cdate=$_POST['cdate'];
$ctime=$_POST['ctime'];
$codate=$_POST['codate'];
if($eid=="")
{
header('location:Login.php');
}
$sql= mysqli_query($con,"select * from room_booking_details where email='$eid' "); 
$result=mysqli_fetch_assoc($sql);
//print_r($result);
extract($_REQUEST);
error_reporting(1);
if(isset($savedata))
{
  $query= "select * from room_booking_details where email='$eid'and roomType='$roomType'";
  $sql= mysqli_query($con,$query);
  if(mysqli_num_rows($sql)) 
  {
  $error= "You have already booked this room";   
  }
  else
  {
   $sql="insert into room_booking_details(email,roomType,Occupancy,check_in_date,check_in_time,check_out_date) 
  values('$eid','$roomType','$Occupancy','$cdate','$ctime','$codate')";
   if(mysqli_query($con,$sql))
   {
   $msg="You have Successfully booked this room"; 
   }
  }
}
?>
<html>
<head>
<title>HMS | Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="fontawesome/css/all.css" rel="stylesheet">
  <link href="css/style.css"rel="stylesheet"/>
</head>
<body>
  <div style="margin:100px 100px 100px 100px;">
      <?php if($error){?><div class="alert alert-danger"><strong>ERROR</strong>:<p style="color:red"><?php echo htmlentities($error); ?> </p></div><?php } 
				else if($msg){?><div class="alert alert-success"><strong>GREAT</strong>:<?php echo htmlentities($msg); 
                ?> </div></br><?php 
                include('payment.php');
                }?>
  </div> 
    <?php include('Footer.php')?> 
</body>

</html>

	



	
