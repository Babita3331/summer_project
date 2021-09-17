<!DOCTYPE HTML>
	<html>
	<head>
<title>Hotel Management System |Success</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="fontawesome/css/all.css" rel="stylesheet">
  <link href="css/style.css"rel="stylesheet"/>
</head>
	<body>
	
<?php			
include('connection.php');

	if( isset($_GET['oid']) &&
		isset( $_REQUEST['amt']) &&
		isset( $_REQUEST['refId'])
		)
	{   	  		
			$url = "https://uat.esewa.com.np/epay/transrec";
			$data =[
			'amt'=>  $_REQUEST['amt'],
			'rid'=>  $_REQUEST['refId'],
		    'pid'=>  $_GET['oid'],
			'scd'=> 'EPAYTEST'
			];
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($curl);		
			curl_close($curl);

			if(strpos($response, 'Success') !== false)
			{
				$email=$_GET['email'];
	        	$query="SELECT room_booking_details.email,room_booking_details.roomType,price
				FROM room_booking_details
				INNER JOIN rooms ON room_booking_details.roomType = rooms.type 
				WHERE room_booking_details.email='$email'";
				
				$sql=mysqli_query($con,$query);
		       
                ?>
				<div style='margin:100px 100px 10px 100px;'>
			   <table class='table table-striped table-hover'>
			   <thead class="alert alert-info" role="alert">
				<tr>
				<th>Email</th>
				<th>Room Type</th>
				<th>Price</th>
				</tr>
				</thead>
               <?php
			   if (mysqli_num_rows($sql)) 
			   {
				   $total=0;
				 while($res=mysqli_fetch_assoc($sql))
						{ ?> 
							<tbody>
							<tr>
							<td><?php echo $res['email']; ?></td>
							<td> <?php echo $res['roomType'];?></td>
							<td><?php echo $res['price'];?></td>
							</tr>
							</tbody>
							
					<?php } echo "<h2 class='alert alert-success' role='alert'>Payment Successful</h2>";?>
					<?php $query="SELECT sum(price)FROM rooms				
						INNER JOIN room_booking_details ON room_booking_details.roomType = rooms.type 
						WHERE room_booking_details.email='$email'";
					      $sql=mysqli_query($con,$query);
						  $total=mysqli_fetch_array($sql);
					?>
					<tr>
					<th style="text-align:center;background:#beccbe;border-top:5px solid green;"colspan="2">TOTAL</th>
					<td style="border-top:5px solid green;">Rs.<?php echo $total[0];?></td>
				  </tr>
					<?php }?>
					
					</table>
	                        </div>
							<form action="download.php?email=<?php echo $email;?>" method="POST">
								<button type="submit" style="margin: 10px 100px 100px 100px; float:right;"type="button" class="btn btn-info">
								Save</button>
						   </form>
						
		   <?php	}
			else
			{
				echo "<h2 class='alert alert-danger' role='alert'>Payment UnSuccessful</h2>";
			}
            
			
    }?>
</body></html>
