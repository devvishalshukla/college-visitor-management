<?php
session_start();
error_reporting(0);

if(strlen($_SESSION['user'])==0){
  header('location:index.html');
}else{
  include('includes/dbconn.php');
 $phone1=$_SESSION['phone']; 

$sql="SELECT * FROM tbl_visitor WHERE phoneNumber='$phone1'";

$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result);
   
?>

<!DOCTYPE html> 
<html>
<head>  
	<title>Create pass</title>     
		
		<!-- styles -->
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
		    <link rel="stylesheet" type="text/css" href="assets/css/simple-sidebar.css"> 
<script>
function onlyAlphabets(evt) {
        var charCode;
        if (window.event)
            charCode = window.event.keyCode;  //for IE
        else
            charCode = evt.which;  //for firefox
        if (charCode == 32) //for &lt;space&gt; symbol
            return true;
        if (charCode > 31 && charCode < 65) //for characters before 'A' in ASCII Table
            return false;
        if (charCode > 90 && charCode < 97) //for characters between 'Z' and 'a' in ASCII Table
            return false;
        if (charCode > 122) //for characters beyond 'z' in ASCII Table
            return false;
        return true;
    }

</script>


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
			<div class="card">
				<div class="card-header">
					<h3> Gate pass for <?php echo($phone1)  ?></h3>
				</div>
				<div class="card-body">
					<form action="upload.php" method="POST">

						<!-- Name -->
						<div class="form-group">
					    <label for="InputName">Name </label>
					    <input type="text" name="name" onkeypress="return onlyAlphabets(event);"  placeholder="Name" value=" <?php echo $row['name'] ?> " class="form-control" id="name" placeholder="Enter Name" required>
						</div>

						<!-- Gender -->
						<label for="Gender">Gender</label>
						<div class="form-check">
						  <input class="form-check-input" <?php if($row['gender']=="male"){echo "checked";} ?> type="radio" name="gender" value="male">
						  <label class="form-check-label" for="GenderMale">
						    Male
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" <?php if($row['gender']=="female"){echo "checked";} ?> type="radio" name="gender" value="female">
						  <label class="form-check-label" for="GenderFemale">
						    Female
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" <?php if($row['gender']=="other"){echo "checked";} ?> type="radio" name="gender" value="other">
						  <label class="form-check-label" for="Genderother">
						   Other
						  </label>
						</div>
						<br>

						<!-- Phone Number -->
						<div class="form-group">
					    <label for="InputPhone">Phone Number : </label>
					    <input type="Number" class="form-control" name="phone" readonly="readonly" placeholder="Phone No" value="<?php echo $phone1 ?>">
						</div>

						<div class="form-group">
							<label>Address :</label>
							<textarea class="form-control" placeholder="Enter visitor's address" rows="5" name="address" id="address" ><?php echo($row['address']) ?></textarea>
						</div>
						<!-- Reason for Visit -->
						<div class="form-group">
					    <label for="InputPhone">Purpose: </label>
					    <input type="text" class="form-control" name="reason" placeholder="Reason For Visit" required="" >
						</div>

						<!-- Whom to Meet -->
						<div class="form-group">
					    <label for="inputWhomtoMeet">Person to Meet : </label>
					    <input type="text" class="form-control" name="meet"  placeholder="Whom to Meet" required="">
						</div>

						<!-- Mode of transport -->
						<div class="form-group">
					    <label for="modeOfTransport">Mode of Tranport</label>
					    <select class="form-control" id="transport" name="transport" required="">
					    	<option value="0">-- select --</option>
					      <option value="2 Wheeler" >2 Wheeler</option>
					      <option value="3 Wheeler">3 Wheeler</option>
					      <option value="4 Wheeler">4  Wheeler</option>
					      <option value="Truck">Truck</option>
					      <option value="By Walk">By Walk</option>
					    </select>

					    <br>
					    <!-- Registeration Number of Vehicle -->
					    <div class="form-group">
					    <label for="inputRegNo">Vehicle Registration No : </label>
					    <input type="text" class="form-control" name="regNo"  placeholder="Registeration of Vehicle if any" >
						</div>
							
					  </div>
					  <div class="card-footer">
					  	<input type="submit" name="submit" value="Create Pass" class="btn btn-success btn-lg btn-block">
					  </div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
</div>
<!-- JavaScript Files -->
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
<?php }?>
