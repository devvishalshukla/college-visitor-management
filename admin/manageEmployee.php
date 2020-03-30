<?php
   session_start();
error_reporting(0);

if(strlen($_SESSION['user'])==0){
  header('location:../index.html');
}else{
  include('../includes/dbconn.php');
// code for deleting  employee    
if(isset($_GET['inid']))
{
$id=$_GET['inid'];
$sql1 = "DELETE FROM login_user WHERE id=$id LIMIT 1";
if (mysqli_query($db, $sql1)) {
    echo "Record deleted successfully";
    header('location:manageEmployee.php');
} else {
    echo "Error deleting record: " . mysqli_error($db);
}
}
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Manage Employees / Guards</title>

    <!-- styles -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <!-- JavaScript -->
 <script src='https://code.jquery.com/jquery-3.3.1.js'></script>
 <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../assets/css/simple-sidebar.css"> 
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   <script type="text/javascript">
 $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
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
      <div class="content-body">
       
       <div class="py-3 mx-auto">
           <h2> Guards Details</h2>
       </div> 
            <?php
            $sql="SELECT * FROM login_user WHERE user='guard' ORDER BY 'id' ASC";
            $query=mysqli_query($db,$sql);
              ?>
      <table id="example" class="table table-responsive table-striped" style="width:100%">
     <thead class="thead-light">
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Email</th>
                <th>Aadhar No.</th>                
                <th>Delete User</th>
            </tr>
      </thead>
            <?php
            while ($fetch=mysqli_fetch_array($query))
            {
            ?>
      <tr>
        <td>  <?php echo htmlentities($fetch[username]);?>  </td>
        <td>  <?php echo htmlentities($fetch[name]);?>  </td>
        <td>  <?php echo htmlentities($fetch[age]);?> </td>
        <td>  <?php echo htmlentities($fetch[gender]);?>  </td>
        <td>  <?php echo htmlentities($fetch[phone]);?> </td>
        <td>  <?php echo htmlentities($fetch[address]);?> </td>
        <td>  <?php echo htmlentities($fetch[email]);?> </td>
        <td>  <?php echo htmlentities($fetch[adharno]);?> </td>
        <td>
            <a href="manageEmployee.php?inid=<?php echo htmlentities($fetch[id]);?>" 
            onclick="return confirm('Are you sure you want to delete this Guard?');"> 
            <i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
      </td>
      </tr> 
<?php } ?>
</table>
</div>
</div>
</div>   
<script type="text/javascript" src="../assets/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="../assets/js/dateTime.js"></script>
<script type="text/javascript" src="../assets/js/custom.js"></script>
</body>
</body>
</html>
<?php } ?>
