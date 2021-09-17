<?php
    include('connection.php');
    $email=$_GET['email'];
    $query="SELECT room_booking_details.email,room_booking_details.roomType,price
    FROM room_booking_details
    INNER JOIN rooms ON room_booking_details.roomType = rooms.type 
    WHERE room_booking_details.email='$email'";
    
    $sql=mysqli_query($con,$query);
   if (mysqli_num_rows($sql)) 
   {
    $file="Receipt.txt";
    $fp = fopen($file,"a") or die("Unable to open file!");
   while($row=mysqli_fetch_assoc($sql))
   {
    $line2="Email"."\t". $row['email'] ."\n"."RoomType"."\t" . $row['roomType'] . "\n"."RoomPrice"."\t" . $row['price'] . "\t";                              
    $data1=$line2;     
    fwrite($fp, $data1."\n");      
   }
   $query="SELECT sum(price)FROM rooms				
   INNER JOIN room_booking_details ON room_booking_details.roomType = rooms.type 
   WHERE room_booking_details.email='$email'";
     $sql=mysqli_query($con,$query);
     $total=mysqli_fetch_array($sql);
   $total= "Total: ".$total[0];
   fwrite($fp, $total."\n");
   fclose($fp);
}
  header('Content-Description: File Transfer');
  header('Content-Disposition: attachment; filename='.basename($file));
  header('Expires: 0');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  header('Content-Length: ' . filesize($file));
  header("Content-Type: text/plain");
  readfile($file);
   
            