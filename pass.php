<?php 
session_start();
error_reporting(0);

if(strlen($_SESSION['user'])==0){
  header('location:index.html');
}else{
  include('includes/dbconn.php');
  
date_default_timezone_set('Asia/Kolkata');
$date=date("Y-m-d");

$phone=$_POST['phone'];
$sql="select * from inquery where Phone='$phone' ";
$query=mysqli_query($db,$sql);
$fetch=mysqli_fetch_array($query);
$count=mysqli_num_rows($query);

if($count>0)
{	
	if($fetch[8]=="")
	{
		echo"<script>alert('Out time'); 
		location.href='../dashboard.php';
		</script>";
	}
	else
	{
		$_SESSION['phone']=$phone;
		echo"<script> 
		location.href='createpass.php';
		</script>";
	}
}
else
{
		$_SESSION['phone']=$phone;
		echo "<script> 
			location.href='createpass.php';	
				</script>";
}
}
?>
