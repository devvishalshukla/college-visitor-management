<?php 
session_start();
error_reporting(0);

if(strlen($_SESSION['user'])==0){
  header('location:index.html');
}else{
  include('includes/dbconn.php');

?>
    <!DOCTYPE html>
<html>
<head>
 <script>        
           function phoneno(){          
            $('#phone').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
       </script>
	<title>Phone Number</title>
    <!-- styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="assets/css/simple-sidebar.css">
<body>

  <div class="d-flex" id="wrapper">

   <?php include('includes/sidebar.php');?>

    <!-- Page Content -->
    <div id="page-content-wrapper">

   <?php include('includes/header.php');?>
    <!-- center page-->

                <div class="py-3">
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <h4>Enter Phone Number to create the Gate Pass</h4>
                            </div>
                            <div class="card-body">
                <form action="pass.php" method="POST">
  <div class="form-group">
    <label for="InputPhone">Phone Number</label>
    <input id="phone" type="text" pattern="\d{10}" title="Please enter exactly 10 digits" onkeypress="phoneno()" maxlength="10" name="phone" class="form-control" id="phone" aria-describedby="phoneHelp" placeholder="Enter Phone Number" required="">
    <small id="phoneHelp" class="form-text text-muted">We'll never share your Phone number with anyone else.</small>
    <!-- <span id="message"></span><br><br> -->
  </div>
  <button type="submit" value="Create" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- JavaScript Files -->
 <script src='https://code.jquery.com/jquery-3.3.1.js'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.bundle.js"></script>
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