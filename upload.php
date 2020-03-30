<?php
session_start();
error_reporting(0);

if(strlen($_SESSION['user'])==0){
  header('location:index.html');
}else{
  include('includes/dbconn.php');

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$address= $_POST['address'];
	$reason_visit=$_POST['reason'];
	$toMeet=$_POST['meet'];
	$transport=$_POST['transport'];
	$regNo=$_POST['regNo'];
	date_default_timezone_set('Asia/Kolkata');
	$in_time=date("h:i a");
	$date=date("Y-m-d");
	
$sql="INSERT INTO tbl_visitor (
			      name,gender,phoneNumber,address,reasonVisit,toMeet,transport,regNo,timeIn,date_visit) 
	  			  VALUES('$name','$gender','$phone','$address','$reason_visit','$toMeet','$transport',
	  			  '$regNo','$in_time', '$date')"; 
	
$query=mysqli_query($db,$sql); 
	//echo "New record has id: " . mysqli_insert_id($db);
	//echo $date;
if($query) 
		{     
			// echo"<script>alert('Information Registerd  $date');
			echo "<script>location.href='slip.php';</script>";	
		}
		else
		{
			echo "<br>";
			echo"<script>alert ('error');</script>";
		}

}
}
?>

