<?php $roomType=unserialize(urldecode($_GET['type']));

echo $roomType;
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
     <form class="form-horizontal" method="post" action="success.php?type=<?php echo $roomType;?>">
          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"><h4>Check In Date :</h4></div>
                  <div class="col-sm-7">
                  <input type="date" name="cdate" class="form-control"required>
                  </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                 <div class="control-label col-sm-5"><h4>Check In Time:</h4></div>
                   <div class="col-sm-7">
                    <input type="time" name="ctime" class="form-control"required>
                  </div>
              </div>
            </div>
          </div>
           <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"><h4>Check Out Date :</h4></div>
                <div class="col-sm-7">
                  <input type="date" name="codate" class="form-control"required>
                </div> 
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <label class="control-label col-sm-5"><h4 id="top">Occupancy :</h4></label>
                <div class="col-sm-7">
                  <div class="radio-inline"><input type="radio" value="single" name="Occupancy"required >Single</div>
                  <div class="radio-inline"><input type="radio" value="twin" name="Occupancy" required>Twin</div>
                  <div class="radio-inline"><input type="radio" value="dubble" name="Occupancy" required>Dubble</div>
                </div> 
              </div>
            </div>
            <input style="margin:20px 500px 10px 0px;" type="submit"value="submit" name="savedata" class="btn btn-primary"required/><br><br><br>
          </div>
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
