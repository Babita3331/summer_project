
<table class="table table-bordered table-striped table-hover">
	<h1>Room Booking Details</h1><hr>
	<tr>
		<th>Sr No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Room Type</th>
		<th>Price</th>
		<th>Check in Date</th>
		<th>Check Out Time</th>
		<th>Check Out Date</th>
		<th>Occupancy</th>
		<th>Cancel Order</th>
	</tr>
<?php 
$i=1;
$query = "SELECT room_booking_details.Occupancy,room_booking_details.check_out_date,room_booking_details.check_in_time,room_booking_details.check_in_date,room_booking_details.name, room_booking_details.id, room_booking_details.email,room_booking_details.roomType,room_booking_details.check_in_date,price 
from room_booking_details INNER JOIN rooms ON room_booking_details.roomType=rooms.type";

  $sql=mysqli_query($con,$query);
while($res=mysqli_fetch_assoc($sql))
{
	
$oid=$res['id'];

?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['name']; ?></td>
		<td><?php echo $res['email']; ?></td>
		<td><?php echo $res['roomType']; ?></td>
		<td><?php echo $res['price']; ?></td>
		<td><?php echo $res['check_in_date']; ?></td>
		<td><?php echo $res['check_in_time']; ?></td>
		<td><?php echo $res['check_out_date']; ?></td>
		<td><?php echo $res['Occupancy']; ?></td>
		<td><a style="color:red" href="cancel_order.php?booking_id=<?php echo $oid; ?>">Cancel</a></td>
	</td>
	</tr>
<?php 	
}

?>	
</table>