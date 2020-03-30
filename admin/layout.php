<?php
session_start();
error_reporting(0);

if(strlen($_SESSION['user'])==0){
  header('location:index.html');
}else{
  include('../includes/dbconn.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>VMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
   <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/minus.png">
  
    <!-- styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/simple-sidebar.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
    <div class="d-flex" id="wrapper">

   <?php include('includes/sidebar.php');?>

    <!-- Page Content -->
    <div id="page-content-wrapper">

   <?php include('includes/header.php');?>
    <!-- center page-->
    <section class="py-5">
    <div class="container">
      <div class="content-body">
       
        <div class="row">
       

          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                   <!-- <a href="todays-leaves.php"> -->
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
<?php 

$sql="Select count(*) from inquery";
$query=mysqli_query($db,$sql);
$fetch=mysqli_fetch_array($query);

?>
                      <h2>Today's Visitors</h2>
                      <h4><?php echo $fetch[0] ?></h4>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              <!-- </a> -->
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                   <!-- <a href="todays-leaves.php"> -->
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
<?php 
$sql="Select count(*) from emp_table";
$query=mysqli_query($db,$sql);
$fetch1=mysqli_fetch_array($query);
?>
                      <h2>Yesterday's Visitors</h2>
                      <h4><?php echo $fetch1[0] ?></h4>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              <!-- </a> -->
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                   <!-- <a href="todays-leaves.php"> -->
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
<?php 

$sql="Select count(*) from department";
$query=mysqli_query($db,$sql);
$fetch2=mysqli_fetch_array($query);

?>
                      <h2>Last 7 Days Visitors</h2>
                      <h4><?php echo $fetch2[0] ?></h4>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              <!-- </a> -->
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
    </section>

</div>
</div>
<!-- JavaScript -->
 <script src='https://code.jquery.com/jquery-3.3.1.js'></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="../assets/js/dateTime.js"></script>
</body>
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</html>
<?php } ?>