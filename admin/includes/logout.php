<?php
include('dbconn.php');
session_start();
if(isset($_GET['log']))
{
	session_destroy();
	unset($_SESSION['user']);
	header('location:../../index.html');
}

?>