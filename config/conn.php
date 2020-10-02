<?php
  error_reporting(0);
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "himclasses";
  $con = @new mysqli($servername, $username, $password, $dbname);
  	if (!$con)
  	  {
  		die('Unable to connect to Database Server');
  	  }
?>