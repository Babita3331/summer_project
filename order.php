<?php 
session_start();
error_reporting(1);
include('connection.php');
$eid=$_SESSION['create_account_logged_in'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
<div class="container-fluid"><!--Primary Id-->
  <h1 class="text-center text-success"style="text-shadow: 1px 3px 7px #1b1314;">Booking Details</h1><br>
  <div class="container">
    <div class="row">
    <table class="table table-bordered table-striped table-hover" style="margin-bottom:20px;margin-top:-50px;">
	<h1>Room Booking Details</h1><hr>
	<tr>
		<th>Sr No</th>	
		<th>Email</th>
		<th>Room Type</th>
		<th>Check in Date</th>
		<th>Check Out Date</th>
		<th>Check Out Time</th>
		<th>Occupancy</th>
		<th>Cancel Order</th>
	</tr>

<?php 
$i=1;
$query="select * from room_booking_details";
$sql=mysqli_query($con,$query);
while($res=mysqli_fetch_assoc($sql))
{
$oid=$res['id'];
?>
     <tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['email']; ?></td>
		<td><?php echo $res['roomType']; ?></td>
		<td><?php echo $res['check_in_date']; ?></td>
		<td><?php echo $res['check_out_date']; ?></td>
		<td><?php echo $res['check_in_time']; ?></td>
		<td><?php echo $res['Occupancy']; ?></td>
		<td><a style="color:red" href="cancel_order.php?booking_id=<?php echo $oid; ?>">Cancel</a></td>
	</td>
	</tr>
<?php 	
}

?>	
</table>

    </div>
    </div>
  </div>
<?php
include('Footer.php')
?>
</body>
</html>
