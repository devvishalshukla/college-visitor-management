<?php
session_start();
error_reporting(0);

if(strlen($_SESSION['user'])==0){
  header('location:index.html');
}else{
  include('../includes/dbconn.php');

  if (isset($_POST['submit'])) {
   $username = $_POST['username'];
   $name = $_POST['name'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $password =$_POST['password'];
   $address = $_POST['address'];
   $adhar = $_POST['adhar'];
   $user ='guard';
   $sql = "INSERT INTO login_user (username, name, age, gender, phone, email, password, address, adharno, user) 
            VALUES ('$username', '$name', $age, '$gender', '$phone',' $email', '$password', '$address', 
            '$adhar','$user') ";

  $query=mysqli_query($db,$sql); 
  //echo "New record has id: " . mysqli_insert_id($db);
  //echo $date;
if($query) 
    {     
      echo"<script>
          location.href='manageEmployee.php';
          </script>"; 
    }
    else
    {
      echo "<br>";
      echo"<script>alert ('ERROR !!! Please try again !!');</script>";
    }

  }

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

        function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
document.form1.text1.focus();
return true;
}
else
{
alert("You have entered an invalid email address!");
document.form1.text1.focus();
return false;
}
}

function AadharValidate(aadhar) {
    var id=aadhar.id;
    id='#'+id;
    var aadhar=aadhar.value;
  
        var adharcardTwelveDigit = /^\d{12}$/;
        var adharSixteenDigit = /^\d{16}$/;
        if (aadhar != '') {
            if (aadhar.match(adharcardTwelveDigit)) {
                return true;
            }
            else if (aadhar.match(adharSixteenDigit)) {
                return true;
            }
            else {
                alert("Enter valid Aadhar Number");
                jQuery(id).val('');
                return false;
            }
        }
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
    <section class="py-3">
    <div class="container px-4">
      <div class="content-body">
        <div class="card-header">
          <h2>Register Guard</h2>
        </div>
        <br>
       <form method="POST" action="addEmployee.php">
         <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Name:</label>
          <div class="col-sm-9">
           <input type="text" name="name" class="form-control" placeholder="Enter Employees Name" required="required">
           </div>
         </div>
         <div class="form-group row">
          <label for="age" class="col-sm-3 col-form-label">Age:</label>
           <div class="col-sm-9">
           <input type="Number" name="age" maxlength="2" min="20" class="form-control" placeholder="Enter age " required="required">
           </div>
         </div>
         <div class="form-group row">
          <label for="gender" class="col-sm-3">Gender:</label>
          <div class="col-sm-9">
           <select class="form-control" name="gender">
            <option value="0">-- SELECT --</option>
             <option value="male"> Male</option>
             <option value="female">Female</option>
             <option value="other">Other</option>
           </select>
           </div>
         </div>
         <div class="form-group row">
          <label for="phoneno" class="col-sm-3">Phone:</label>
          <div class="col-sm-9">
           <input id="phone" type="text" pattern="\d{10}" title="Please enter exactly 10 digits" onkeypress="phoneno()" maxlength="10" name="phone" class="form-control" id="phone" aria-describedby="phoneHelp" placeholder="Enter Phone Number" required="">
          </div>
         </div>
         <div class="form-group row">
          <label for="email" class="col-sm-3">Email Id:</label>
          <div class="col-sm-9">
           <input type="text" name="email" class="form-control" placeholder="Enter email Id " required="required" onblur="ValidateEmail(this);" >
           </div>
         </div>
         <div class="form-group row">
          <label for="username" class="col-sm-3">Username:</label>
          <div class="col-sm-9">
           <input type="text" name="username" class="form-control" required="required" placeholder="Enter username">
         </div>
         </div>
         <div class="form-group row">
          <label for="password" class="col-sm-3">Password:</label>
          <div class="col-sm-9">
           <input type="text" name="password" class="form-control" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" >
         </div>
         </div>
         <div class="form-group row">
            <label for="address" class="col-sm-3">Address:</label>
            <div class="col-sm-9">
            <textarea class="form-control" id="address" name="address" placeholder="Enter Address ..." rows="3"></textarea>
          </div>
          </div>
          <div class="form-group row">
            <label for="adhar" class="col-sm-3">Adhar Number:</label>
            <!-- <input id="adhar" type="text" data-type="adhaar-number" maxLength="19" class="form-control" placeholder="Enter Adhar No." required=""> -->
            <div class="col-sm-9">
            <input type="text" class="form-control" name="details_of_proprietor[id_aadhaar_card_no]" onblur="AadharValidate(this)" id="id_aadhaar_card_no" required="required"  />
          </div>
          </div>
          <br>
         <!-- onclick="ValidateEmail(document.form1.text1)" -->
         <div class="">
         <input type="submit" name="submit" value="Register Employee" class="btn btn-block btn-lg btn-success">
         </div>
       </form>
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