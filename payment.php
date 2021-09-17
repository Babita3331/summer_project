<html>
<head>
<title>HMS |Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="fontawesome/css/all.css" rel="stylesheet">
  <link href="css/style.css"rel="stylesheet"/>
</head>
<body>
 <table class="table table-striped table-hover">
<tr>
  <th>ID</th>
  <th>Email</th>
  <th>RoomType</th>
  <th>Price</th>
<tr>
<?php    
include('connection.php');
$roomType=$_GET['type'];

$query = "SELECT room_booking_details.id, room_booking_details.email,room_booking_details.roomType,price 
from room_booking_details INNER JOIN rooms ON room_booking_details.roomType=rooms.type
WHERE room_booking_details.roomType = '$roomType' and room_booking_details.email= '$eid'";

$sql= mysqli_query($con,$query);
  if(mysqli_num_rows($sql)) 
  {
while($results=mysqli_fetch_assoc($sql))
{ ?>
    
        <tr>
            <td><?php echo $results['id']?></td>
            <td><?php echo $results['email']?></td>
            <td><?php echo $results['roomType']?></td>
            <td><?php echo $results['price']?></td>
        </tr>
    </table>
        <form action="https://uat.esewa.com.np/epay/main" method="POST">
        <input value="110" name="tAmt" type="hidden">
        <input value="100" name="amt" type="hidden">
        <input value="5" name="txAmt" type="hidden">
        <input value="2" name="psc" type="hidden">
        <input value="3" name="pdc" type="hidden">
        <input value="EPAYTEST" name="scd" type="hidden">
        <input value="<?php echo $results['id'];?>" name="pid" type="hidden">
        <input value="http://localhost/hms/esewa_success.php?email=<?php echo $eid;?>" type="hidden" name="su">
        <input value="http://localhost/hms/esewa_failed.php?q=fu" type="hidden" name="fu">
        <button style='margin-top:25px; padding:3px 10px 6px 10px;'type="submit" class="btn btn-primary">Pay</button>
        </form>
    <?php }}?>

</body></html>
