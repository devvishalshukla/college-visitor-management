
<?php
session_start();
error_reporting(0);

if(strlen($_SESSION['user'])==0){
  header('location:index.html');
}else{
  include('includes/dbconn.php');

 $phone1=$_SESSION['phone']; 

include('includes/dbconn.php');

$sql="SELECT * FROM tbl_visitor WHERE phoneNumber='$phone1' ORDER BY `tbl_visitor`.`timeIn` ASC";

$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result);
   
?>

<!DOCTYPE html>
<html>
<head>
	<title>Gate Pass Receipt</title>
	<!-- styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/simple-sidebar.css"> 
    <style type="text/css">
		.form-control-plaintext {
		border: 0;
	}
				input[readonly]{
			background-color:transparent;
			border: 0;
			font-size: 1em;
			}
    	.display-print {
		    display: none;
		}


    	@media print {
    		.display-screen {
       display: none;
    }

    .display-print {
       display: block;
    }
}

    </style>
</head>
<body>

<div class="d-flex" id="wrapper">

   <?php include('includes/sidebar.php');?>

    <!-- Page Content -->
    <div id="page-content-wrapper">

   <?php include('includes/header.php');?>
    <!-- center page-->

	<section class="py-5 px-5 w-75 mx-auto">
		<div class="container">
			<div class="card">
				<div class="card-header">
					<hr>

					<center>
						<h3>Demo Company</h3>
					<h6> Visitor Gate Pass</h6>
					</center>
					<hr>
					<div class="display-print  float-right">
						<?php 
							date_default_timezone_set('Asia/Kolkata');
							$time=date("h:i");
							$date=date("Y-m-d");
	
						?>
						<h4><?php echo " Date :$date"; ?></h4>
						<h3><?php  echo "Time :$time" ?></h3>
					</div>

				</div>
				<div class="card-body">
					<form action="upload.php" method="POST">

						<!-- Name -->
						<div class="form-group row">
					    <label for="InputName" class="col-sm-6">Name :</label>
						<div class="col-sm-6">
					    <input type="text" name="name" value=" <?php echo $row['name'] ?> " class="form-control-plaintext" id="name" readonly="">
						</div>
						</div>
						<!-- Gender -->
						<div class="form-group row">
					    <label for="InputGender" class="col-sm-6">Gender :</label>
						<div class="col-sm-6">
					    <input type="text" name="gender" value=" <?php echo $row['gender'] ?> " class="form-control-plaintext" id="gender" readonly="readonly">
						</div>
						</div>
						<!-- Phone Number -->
						<div class="form-group row">
					    <label for="InputPhone" class="col-sm-6">Phone Number : </label>
						<div class="col-sm-6">
					    <input type="Number" class="form-control-plaintext" name="phone" readonly="readonly" value="<?php echo $row['phoneNumber'] ?>">
						</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-6">Address :</label>
							<div class="col-sm-6">
							<input type="text" class="form-control-plaintext" name="address" readonly="readonly" value="<?php echo $row['address'] ?>">
						</div>
						</div>
						<!-- Reason for Visit -->
						<div class="form-group row">
					    <label for="InputPhone" class="col-sm-6">Purpose : </label>
						<div class="col-sm-6">
					    <input type="text" class="form-control-plaintext" name="reason" value="<?php echo $row['reasonVisit'] ?>" readonly="readonly" >
						</div>
						</div>

						<!-- Whom to Meet -->
						<div class="form-group row">
					    <label for="inputWhomtoMeet" class="col-sm-6">Person To Meet : </label>
						<div class="col-sm-6">
					    <input type="text" class="form-control-plaintext" name="meet" value="<?php echo $row['toMeet'] ?>" readonly="readonly" <?php echo $row['toMeet']; ?>  >
						</div>
						</div>

						<!-- Mode of transport -->
						<div class="form-group row">
					    <label for="inputWhomtoMeet" class="col-sm-6">Mode of Transport : </label>
						<div class="col-sm-6">
					    <input type="text" class="form-control-plaintext" name="meet" value="<?php echo $row['transport'] ?>" readonly="readonly" >
						</div>
						</div>

					    <!-- Registeration Number of Vehicle -->
					    <div class="form-group row">
					    <label for="inputRegNo" class="col-sm-6">Vehicle Registration No : </label>
						<div class="col-sm-6">
					    <?php if($row['regNo']== NULL){ ?>
					    	<input type="text" name="regNo" value="No Vehicle" class="form-control-plaintext" readonly="readonly">
					    <?php } else{ ?>
					    <input type="text" class="form-control-plaintext" name="regNo" value="<?php echo $row['regNo'] ?>" readonly>
					<?php }?>
						</div>
						</div>
							    
					  </div>
					  <div class="card-footer display-screen">
					  	<input type="button" name="print" id="p1" value="Print Gate Pass" class="btn btn-success btn-block" onclick="print1()">
					  	<br>
					  	<a href="dashboard.php">
					  <input type="button"  value="Back" class="btn btn-secondary btn-block" >
					  </a>
					  </div>
					  <div class="display-print float-left">
					  	<br><br>
					  	<h2 class="">Operator Signature</h2>
					  	<br>
					  	<hr style="width: 400px; float: left;">
					  </div>
					  <br><br>
					  <div class="display-print mx-auto">
					  	<h2>Thank you for visiting</h2>
					  </div>
					</form>
				</div>
			</div>
		</div>
	</section>
<script type="text/javascript">
	function print1()
	{
		w=document.getElementById('p1');
		w.style.display='none';
		window.print();
		w.style.display='block';
	}

</script>
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