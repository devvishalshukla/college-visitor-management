<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['emplogin'])==0)
    {   
header('location:index.php');
}
else{
$eid=$_SESSION['emplogin'];

    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Student | Info</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">  -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
  <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>





    </head>
    <body>
  <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
   <main class="mn-inner">
                <div class="row">
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="updatemp">
                                    <div>
                                        <h3>Your Info.</h3>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">

                                                    <!-- Personal Info-->
                                                    <div class="col m6">
                                                        <div class="row">
<?php 
$eid=$_SESSION['emplogin'];
$sql = "SELECT * from  tblstudents where Phonenumber=:eid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':eid',$eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ 
    $id= $result->id;
             //echo $id; ?> 
 <div class="input-field col  s12">
<label for="empcode">Student Code</label>
<input  name="empcode" id="empcode" value="<?php echo htmlentities($result->EmpId);?>" type="text" autocomplete="off" readonly >
<span id="empid-availability" style="font-size:12px;"></span> 
</div>


<div class="input-field col m6 s12">
<label for="firstName">First name</label>
<input id="firstName" name="firstName" value="<?php echo htmlentities($result->FirstName);?>"  type="text">
</div>

<div class="input-field col m6 s12">
<label for="lastName">Last name </label>
<input id="lastName" name="lastName" value="<?php echo htmlentities($result->LastName);?>" type="text" autocomplete="off">
</div>

<div class="input-field col s12">
<label for="email">Email</label>
<input  name="email" type="email" id="email" value="<?php echo htmlentities($result->EmailId);?>" readonly autocomplete="off">
<span id="emailid-availability" style="font-size:12px;"></span> 
</div>

<div class="input-field col s12">
<label for="phone">Mobile number</label>
<input id="phone" name="phone" type="tel" value="<?php echo htmlentities($result->Phonenumber);?>" maxlength="10" autocomplete="off">
 </div>

 <div class=" col m6 s12">
    <label for="gender">Gender</label>
<select  name="gender" autocomplete="off">
<option value="<?php echo htmlentities($result->Gender);?>"><?php echo htmlentities($result->Gender);?></option>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Other">Other</option>
</select>
</div>

<div class="input-field col s12">
<label for="address">Address</label>
<input id="address" name="address" type="text"  value="<?php echo htmlentities($result->Address);?>" autocomplete="off">
</div>

<div class="input-field col m6 s12">
<label for="city">City/Town</label>
<input id="city" name="city" type="text"  value="<?php echo htmlentities($result->City);?>" autocomplete="off">
 </div>

</div>
</div> 

<!-- Personal Info End-->
<!-- College Info-->                                        
<div class="col m6">
<div class="row">

<div class="input-field col  s12">
<label for="RoomNo">Hostel Name</label>
<input id="RoomNo" name="RoomNo" type="text" value="<?php echo htmlentities($result->hostelName);?>" readonly autocomplete="off">
 </div>


    <div class="input-field col m6 s12">
<label for="RoomNo">Room No</label>
<input id="RoomNo" name="RoomNo" type="text" value="<?php echo htmlentities($result->RoomNo);?>" readonly autocomplete="off">
 </div>

<div class="input-field col m6 s12">
<label for="MessType">Mess Type</label>
<input id="MessType" name="MessType" type="text" value="<?php echo htmlentities($result->MessType);?>" autocomplete="off" readonly>
 </div>

<div class=" col m6  s12">
<label for="FoodPreference">Food Preference</label>
<select  name="FoodPreference" autocomplete="off">
<option value="<?php echo htmlentities($result->FoodPreference);?>"><?php echo htmlentities($result->FoodPreference);?></option>                                          
<option value="veg">Veg</option>
<option value="non-veg">Non-veg</option>
</select>
</div>

<div class=" col m6 ">
<label for="Fast">Do you Keep fast ?</label>
<select  name="Fast" autocomplete="off">
<option value="<?php echo htmlentities($result->Fast);?>"><?php echo htmlentities($result->Fast);?></option>                                          
<option value="yes">Yes</option>
<option value="no">No</option>
</select>
</div>

 <div class="input-field col m6 s12">
<label for="BusId">Bus Id</label>
<input id="BusId" name="BusId" type="text" value="<?php echo htmlentities($result->BusId);?>" readonly autocomplete="off" >
 </div>

  <div class="input-field col m6 s12">
<label for="BusName">Bus Name</label>
<input id="BusName" name="BusName" type="text" value="<?php echo htmlentities($result->BusName);?>" readonly autocomplete="off" >
 </div>

  <div class="input-field col m6 s12">
<label for="College">College Name</label>
<input id="college" name="college" type="text" value="<?php echo htmlentities($result->college);?>" readonly autocomplete="off">
 </div>

  <div class="input-field col m6 s12">
<label for="year">Year</label>
<input id="year" name="year" type="text" value="<?php echo htmlentities($result->year);?>" readonly autocomplete="off" >
 </div>

  <div class="input-field col m6 s12">
<label for="department">Department</label>
<input id="department" name="department" type="text" value="<?php echo htmlentities($result->department);?>" readonly autocomplete="off" >
 </div>


<?php }}?>


                                                        </div>
                                                    </div>

                                                    <!-- College Info End-->
                                                </div>
                                            </div>


                                        </section>
                                     
                                    
                                        </section>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/form_elements.js"></script>
        
    </body>
</html>
<?php } ?> 