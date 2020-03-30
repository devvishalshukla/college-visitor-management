<?php
   session_start();
error_reporting(0);

if(strlen($_SESSION['user'])==0){
  header('location:index.html');
}else{
  include('../includes/dbconn.php');

    $from=$_POST['from'];
    $to=$_POST['to'];
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Report From:<?php echo($from) ?> To:<?php echo($to) ?></title>


    <!-- CSS Files-->
    <link rel='stylesheet' type='text/css' media='screen' href='https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css'>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="styelsheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- JS Files-->
    <script src='https://code.jquery.com/jquery-3.3.1.js'></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="assets/js/dateTime.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

   
</head>
<body>

  
</head>
<body>
       <section class="py-3 px-5 mx-5 mx-auto">
           <h2>Visitor's Report From: <?php echo($from) ?> To: <?php echo($to) ?></h2>
       </section> 
<?php

$sql="SELECT * FROM tbl_visitor where date_visit between '$from' and '$to'";
$query=mysqli_query($db,$sql);
	?>
	<div class="container-fluid px-3" style="margin-top: 20px;">
    <table id="example" class="display nowrap table table-bordered" style="width:100%">
        <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Address</th>
                <th> Reason </th>
                <th> To Meet</th>
                <th> Mode Of Transport</th>
                <th> Reg No of Vehicle</th>
                <th> Time In</th>
                <th>Time Out</th>
                <th>Date</th>
            </tr>
        </thead>
<?php
while ($fetch=mysqli_fetch_array($query))
 {
	echo "<tr>";
		echo "<td> $fetch[name]</td>";
		echo "<td> $fetch[gender]</td>";
		echo "<td> $fetch[phoneNumber]</td>";
		echo "<td> $fetch[address]</td>";
		echo "<td> $fetch[reasonVisit]</td>";
		echo "<td> $fetch[toMeet]</td>";
		echo "<td> $fetch[transport]</td>";
		echo "<td> $fetch[regNo]</td>";
        echo "<td> $fetch[timeIn]</td>";
        echo "<td> $fetch[timeOut]</td>";
		echo "<td> $fetch[date_visit]</td>";
	echo "</tr>";
}
echo "</table>";
echo "<br><br>";
?>
		<a href="dashboard.php">	<button  class="btn btn-primary btn-lg btn-block" >Back </button></a><br><br>
</div>
</div>
</div>
<script>
        $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "scrollX": true
    } );
} );
    </script>
</body>
</html>
<?php }?>
