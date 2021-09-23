<?php 
include('connection.php');
include('Menu Bar.php');
$roomType= $_GET['type'];
$name= $_GET['name'];
$msg= $_GET['msg']; 
$error= $_GET['error']; 
// $error= $_GET['error']; 
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
  <?php include('Menu Bar.php');?>
      <?php if(isset($error)){?><div class="alert alert-danger"><strong>ERROR</strong>: <span class="text-danger"><?php echo htmlentities($error); ?></span></div><?php } 
				else if(isset($msg)){?><div class="alert alert-success"><strong>GREAT</strong>: <span class="text-success"><?php echo htmlentities($msg); 
                ?> </span></div></br><?php  
                include('payment.php');
                }?>
  </div> 
    <?php include('Footer.php')?> 
</body>

</html>

	



	
