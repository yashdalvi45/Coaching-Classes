<?php
if(!($_SESSION['Email']))
{
	header("location:login.php");
}
else
{
	$I=$_SESSION['ID'];
	$Em=$_SESSION['Email'];
	$sql  = "SELECT Email,SessionID from session WHERE Email = '$Em' and  SessionID= '$I'";
	$res=mysqli_query($con, $sql);
	$que=mysqli_num_rows($res);

	if(($que==False))
	{
		echo "<script>
		window.location.replace('http://localhost/himclasses/login.php?logout');
            </script>";		
	}
}
?>