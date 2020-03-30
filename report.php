<?php 
session_start();
error_reporting(0);

if(strlen($_SESSION['user'])==0){
  header('location:index.html');
}else{
  
?>
<!DOCTYPE html>
<html>
<head>
  <title>Report</title>
  <!-- styles -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/redmond/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="assets/css/simple-sidebar.css">

</head>
<body>
  <div class="d-flex" id="wrapper">

   <?php include('includes/sidebar.php');?>

    <!-- Page Content -->
    <div id="page-content-wrapper">

   <?php include('includes/header.php');?>
    <!-- center page-->
  <section class="py-3">
    <div class="container">
      <div class="card col-lg-4 offset-lg-4">
        <div class="card-header">
          <h5>Report Between Dates</h5>
        </div>
        <div class="card-body">
      <form action="report-details.php" method="POSt">
        <div class="form-group">
          <input type="date"  name="from" id="" class="form-control" required="">
        </div>
        <div class="form-group">
          <input type="date"  name="to" id="" class="form-control">
        </div>
        <input type="submit" name="submit" class="btn btn-lg btn-success btn-block">
      </form>
    </div>
    </div>
      </div>
  </section>

  <!-- JavaScript -->
 <script src='https://code.jquery.com/jquery-3.3.1.js'></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="assets/js/dateTime.js"></script>
</body>
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</html>
<?php } ?>
 