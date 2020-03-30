<?php
session_start();
error_reporting(0);

if(strlen($_SESSION['user'])==0){
  header('location:../index.html');
}else{
  include('../includes/dbconn.php');
  $username = $_SESSION['user'];
  // echo "<script>
  //         alert('".$username."');
  //       </script>";
  
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
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
    <section class="py-3">
      <div class="row px-3">
        <div class="col-lg-4 col-sm-12 col-md-12">
        <?php 
          $sql = "SELECT * FROM `login_user` WHERE username='$username'";
          $query = mysqli_query($db,$sql);
          while ($fetch=mysqli_fetch_array($query))
 {
        ?>


          <div class="card">
          
            <div class="card-body">
              <h5 class="card-title">User Details</h5>
              <hr/>
              <p class="card-text">Username : <?php echo htmlentities($fetch[username]);?> </p>
              <p class="card-text">Name : <?php echo htmlentities($fetch[name]);?></p>
              <p class="card-text">Age : <?php echo htmlentities($fetch[age]);?>  </p>
              <p class="card-text">Phone  : <?php echo htmlentities($fetch[phone]);?> </p>
              <p class="card-text">email : <?php echo htmlentities($fetch[email]);?>  </p>
              <p class="card-text">Address : <?php echo htmlentities($fetch[phone]);?>  </p>
              <p class="card-text">Adhar Number :  <?php echo htmlentities($fetch[adharno]);?></p>
            </div>
          </div> <!-- User details card end-->
<?php }?>

        </div>
        
        <div class="col-lg-3 col-sm-12 col-md-12">
        <?php 
          $sql2 = "SELECT COUNT(*) AS count FROM `tbl_visitor`";
          $query2 = mysqli_query($db,$sql2);
         
          while ($fetch2=mysqli_fetch_array($query2))
          {   $count = $fetch2['count'];    }
               
        ?>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Visitors Details</h5>
              <hr/>
              <p class="card-text">Total visitors : <?php echo htmlentities($count) ?> </p>

              <?php 
                $sql3 = "SELECT  COUNT(*) AS count FROM `tbl_visitor` where (date_visit) > date(CURDATE(), INTERVAL -1 week))";
                $query3 = mysqli_query($db,$sql3);
              
                while ($fetch3=mysqli_fetch_array($query3))
                {   $count = $fetch3['count'];    }
                    
              ?>

              <p class="card-text">Last week visitor : <?php echo htmlentities($count) ?> </p>

              <?php 
                $sql3 = "SELECT  COUNT(*) AS count FROM `tbl_visitor` where date(date_visit)=date(date_sub(now(),interval 1 day))";
                $query3 = mysqli_query($db,$sql3);
              
                while ($fetch3=mysqli_fetch_array($query3))
                {   $count = $fetch3['count'];    }
                    
              ?>
              <p class="card-text">Yesterday visitor : <?php echo htmlentities($count) ?> </p>
            </div>
          </div><!-- Visitors details end-->
          <br/>
          <?php 
          $sql1 = "SELECT COUNT(*) AS count FROM `login_user`";
          $query1 = mysqli_query($db,$sql1);
         
          while ($fetch1=mysqli_fetch_array($query1))
          {   $var = $fetch1['count'];    }
               
        ?>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Basic Details</h5>
              <hr/>
              <h6 class="card-text text-justify"> Total Users : <?php echo htmlentities($var); ?> </h6>
            </div><!--Basic Details end -->
 
          </div>

        </div>

        <div class="col-lg-5 col-sm-12 col-md-12">
        <div class="card">
                 
            <div class="card-body">
              <h5 class="card-title">Users</h5>
                <hr/>
                <?php  $sql1 = "SELECT * FROM `login_user` WHERE user='guard'";
                    $query1 = mysqli_query($db,$sql1);
                  ?>
              <table id="example" class="table table-responsive" style="width: 100%;">
                  <thead>
                    <th>Users </th>
                    <th>Age</th>
                    <th>Phone</th>
                  </thead>
                 
                  <tbody>
                  <?php 
                    while ($fetch1=mysqli_fetch_array($query1))
                    {     ?>
                    <tr>
                      <td><?php echo htmlentities($fetch1[name]) ?></td>
                      <td><?php echo htmlentities($fetch1[age]) ?></td>
                      <td><?php echo htmlentities($fetch1[phone]) ?></td>
                    </tr>
                    <?php }?>
                  </tbody>
                  
                </table>
                   
            </div>
          </div>
        </div>

      </div>
     
    
    </section>

</div>
</div>
<!-- JavaScript -->
 <script src='https://code.jquery.com/jquery-3.3.1.js'></script>
 <script src='https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js'></script>
 <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="../assets/js/dateTime.js"></script>
</body>
  <script>
  $(document).ready(function() {
    $('#example').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
        
    } );
} );
  
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</html>
<?php } ?>