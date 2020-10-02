<?php
include 'config/conn.php';
session_start();
$I=$_SESSION['ID'];
$que=mysqli_query($con,"DELETE From session where SessionID='$I'");
$_SESSION = array();
session_destroy();
header("location:index.php");
exit();
?>