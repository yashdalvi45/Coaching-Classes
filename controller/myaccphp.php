<?php
include 'config/conn.php';
session_start();
//session_regenerate_id(True);
require_once('controller/auth.php');
echo "<script type='text/javascript'>
                   var idleTime = 0;
          $(document).ready(function () { 
    var idleInterval = setInterval(timerIncrement, 60000); // 1 minute 
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });
});
function timerIncrement() {
    idleTime = idleTime + 1;
    if (idleTime >1) 
    { 
       location.href ='http://localhost/himclasses/logot.php';
    }
}
</script>";
$id = $_SESSION['Email'];
$query = "Select Fname,Mname,Lname,Standard,Course,Schoolname,Email,Contact,Address,Pswd,DP from classreg where EMAIL='$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$FNAME = $row[0];
$MNAME = $row[1];
$LNAME = $row[2];
$STANDARD = $row[3];
$COURSE = $row[4];
$SCHOOLNAME = $row[5];
$EMAIL = $row[6];
$CONTACT = $row[7];
$ADDRESS = $row[8];
$PSWD = $row[9];
$DP = $row[10];
$f_error = "";
$pswd_error = $newpswd_error = $confirmpswd_error= "";
$CURRENTPSWD = $NEWPSWD = $CONFIRMPSWD =$CONFIRMPSWD ="";

if (isset($_POST['submit']))
{
    $SCHOOLNAME = $_POST['schoolname'];
    $EMAIL = $_POST['email'];
    $EMAIL  = filter_var($EMAIL, FILTER_SANITIZE_EMAIL);
    $CONTACT = $_POST['contact'];
    $ADDRESS = $_POST['address'];

    if (empty($CONTACT))
    {
        $contact_error = 'Field required';
    }
    elseif (strlen($CONTACT) < 10)
    {
        $contact_error = 'Enter valid number';
    }
    elseif (!preg_match("/^[0-9]*$/", $CONTACT))
    {
        $contact_error = 'Enter only numbers';
    }
    elseif (empty($SCHOOLNAME))
    {
        $schoolname_error = 'Field required';
    }
    elseif (!preg_match("/^[a-zA-Z]*$/", $SCHOOLNAME))
    {
        $schoolname_error = "Only alphabets are allowed";
    }
    elseif (empty($ADDRESS))
    {
        $address_error = 'Field required';
    }
    else
    {  
        $query = "Update classreg Set Contact = '$CONTACT',Schoolname='$SCHOOLNAME', Address='$ADDRESS' where EMAIL='$id'";
        $result = mysqli_query($con, $query);
        echo "<script type='text/javascript'>
                   $(document).ready(function(){
                   $('#Modal').modal('show');
                   });
                   setTimeout(function() 
                   {
                  $('#Modal').modal('hide');
                  }, 5000);
                   </script>";
                    echo "<meta http-equiv='refresh' content='3'>";
    }
}
// Updating Profile Picture

elseif (isset($_POST['upload']))
{   
    $name = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    $f_error = "";
    if (isset($name))
    {
        if (!empty($name))
        {
            $location = 'DP/';
            $target_file = $location . basename($_FILES["file"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            unlink($DP);
            if (move_uploaded_file($temp_name, $location . $name))
            {
                $sql = "UPDATE classreg SET DP='$target_file' WHERE EMAIL='$id'";
                
                if (mysqli_query($con, $sql))
                {   
                    echo "<script type='text/javascript'>
                   $(document).ready(function(){
                   $('#Modal').modal('show');
                   });
                   setTimeout(function() 
                   {
                  $('#Modal').modal('hide');
                  }, 5000);
                   </script>";
                    echo "<meta http-equiv='refresh' content='3'>";
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
                   </script>";
                    echo "<meta http-equiv='refresh' content='0'>";
                }
            }
        }
        else
        {
            $f_error = 'You should select a file to upload !!';
        }
    }
}
// Password Reset
elseif (isset($_POST['reset']))
    {
        $CURRENTPSWD=$_POST['pswd'];
        $NEWPSWD=$_POST['newpswd'];
        $CONFIRMPSWD=$_POST['confirmpswd'];
        if (empty($CURRENTPSWD))
        {
            $pswd_error='Enter Current Password';
        }
        elseif(password_verify($CURRENTPSWD,$PSWD)==0)
        {
            $pswd_error="You entered a wrong Password";
        }
        elseif (empty($NEWPSWD)) 
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
                $sql = "UPDATE classreg SET Pswd='$Pass' WHERE EMAIL='$id'";
                if (mysqli_query($con, $sql))
                {   
                    echo "<script type='text/javascript'>
                   $(document).ready(function(){
                   $('#Modal0').modal('show');
                   });
                   setTimeout(function() 
                   {
                  $('#Modal0').modal('hide');
                  }, 5000);
                   </script>";
                    echo "<meta http-equiv='refresh' content='3'>";
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
                   </script>";
                    echo "<meta http-equiv='refresh' content='0'>";                    
                }
           }
        }
}
?>