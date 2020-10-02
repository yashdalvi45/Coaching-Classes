<?php
session_start();
$id=$_SESSION['Email'];
if(isset($id))
{	
	$que=mysqli_query($con,"DELETE From resetpswd where Email='$id'");
	header("location:http://himclasses.ml/homepg.php");
}
?>