<?php
   session_start();
error_reporting(0);

if(strlen($_SESSION['user'])==0){
  header('location:index.html');
}else{
  include('includes/dbconn.php');
        if(isset($_GET['inid']))
        {
        $id=$_GET['inid'];
        echo " <script>
          alert('".$id."')
        </script>";
        $date = date("h:i a"); 
        $sql1 = "UPDATE `tbl_visitor` SET `timeOut` = '$date' WHERE `tbl_visitor`.`id` = $id;";
        if (mysqli_query($db, $sql1)) {
            echo "Record Updated successfully";
            header('location:checkout.php');
        } else {
            echo "Error deleting record: " . mysqli_error($db);
        }
        }
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Check-out Time </title>


    <!-- CSS Files-->
    <link rel='stylesheet' type='text/css' media='screen' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css'>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/simple-sidebar.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- JS Files-->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="assets/js/dateTime.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

   
</head>
<body>

  
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
     
<?php

$sql="SELECT * FROM `tbl_visitor` WHERE timeOut IS NULL ORDER BY `tbl_visitor`.`timeOut` ASC";
$query=mysqli_query($db,$sql);
	?>
	<div class="container-fluid">
    <table id="example" class="display nowrap table table-bordered" style="width:100%">
        <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Phone</th>
                <th> To Meet</th>
                <th> Mode Of Transport</th>
                <th> Time In</th>
                <th>Check-out Time</th>
                
            </tr>
        </thead>
<?php
while ($fetch=mysqli_fetch_array($query))
 {
   $id = $fetch[id];
	echo "<tr>";
		echo "<td> $fetch[name]</td>";
		echo "<td> $fetch[gender]</td>";
		echo "<td> $fetch[phoneNumber]</td>";
		echo "<td> $fetch[toMeet]</td>";
		echo "<td> $fetch[transport]</td>";
    echo "<td> $fetch[timeIn]</td>";
    $id = $fetch[id];
    echo "<td><a href='checkout.php?inid=$id'>&nbsp; UPDATE</a>
    </td>";
	echo "</tr>";
}
echo "</table>";
echo "<br><br>";
?>
</div>
</div>
</div>
<script>
        $(document).ready(function() {
    $('#example').DataTable({
      "scrollX": true,
        "scrollCollapse": true
    });
} );
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    </script>
    <!-- JavaScript -->

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="assets/js/dateTime.js"></script>
</body>
</html>
<?php }?>
