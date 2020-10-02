<?php
include 'config/conn.php';
require_once('controller/auth2.php');
$timenow = time();
if (!isset($_GET['code'] )) 
{
	header("location:Error404.php");
}
$code=$_GET['code'];
$emailquery=mysqli_query($con,"SELECT Email,Timee from resetpswd WHERE Code='$code' ");
$row=mysqli_fetch_array($emailquery);
$Timee=$row[1];
if(mysqli_num_rows($emailquery)==0)
{
  header("location:Error404.php");
}
if($timenow-$Timee>600)
{
  $que=mysqli_query($con,"DELETE From resetpswd where Code='$code'");
  exit ("Link Expired");
  // echo "<div class=alert alert-warning'>Link Expired</div>";
}
if (isset($_POST['reset']))
    {
        $NEWPSWD=$_POST['newpswd'];
        $CONFIRMPSWD=$_POST['confirmpswd'];
        $r=mysqli_fetch_array($emailquery);
        $email=$r['Email'];       
        if (empty($NEWPSWD)) 
        {
            $newpswd_error='Field required';
        }
        elseif (strlen($NEWPSWD)<4) 
            {
                $newpswd_error="Password must contain minimum 4 characters";
            }
        elseif (!preg_match("/^.*(?=.{4,})(?=.*[0-9])(?=.*[a-zA-Z]).*$/", $NEWPSWD))
            {
                $newpswd_error="Password must contain Alphabets and Digits with minimum length of 4.";
            }
        elseif (empty($CONFIRMPSWD)) 
        {
            $confirmpswd_error='Field required';
        }
        elseif(strcmp($NEWPSWD,$CONFIRMPSWD))
        {
            $confirmpswd_error="Password do not match";
        }
        else
        {
           if($con)
           {    
                $Pass = password_hash($CONFIRMPSWD, PASSWORD_DEFAULT);
                $sql = "UPDATE classreg SET Pswd='$Pass' WHERE EMAIL='$email'";
                if (mysqli_query($con, $sql))
                {   
                  $que=mysqli_query($con,"DELETE From resetpswd where Code='$code'");
                    echo "<script type='text/javascript'>
                   $(document).ready(function(){
                   $('#Modal').modal('show');
                   });
                   setTimeout(function() 
                   {
                  $('#Modal').modal('hide');
                  }, 5000);
                  window.location.replace('http://localhost/himclasses/login.php')
                   </script>";                   
                }
                else
                {
                    echo "<script type='text/javascript'>
                   $(document).ready(function(){
                   $('#Modal1').modal('show');
                   });
                   setTimeout(function() 
                   {
                  $('#Modal1').modal('hide');
                  }, 5000);
                  window.location.replace('http://localhost/himclasses/login.php')
                   </script>";                   
                }
           }
        }
}
?>