<?php
include "config/conn.php";
if (isset($_POST['submit']))
  {
    $FNAME      = $_POST['fname'];
    $MNAME      = $_POST['mname'];
    $LNAME      = $_POST['lname'];
    $STANDARD   = $_POST['standard'];
    $COURSE     = $_POST['course'];
    $SCHOOLNAME = $_POST['schoolname'];
    $EMAIL      = $_POST['email'];
    $EMAIL      = filter_var($EMAIL, FILTER_SANITIZE_EMAIL);
    $CONTACT    = $_POST['contact'];
    $ADDRESS    = $_POST['address'];
    $PSWD       = $_POST['pswd'];
    $name       = $_FILES['file']['name'];
    $temp_name  = $_FILES['file']['tmp_name'];
    if (empty($FNAME) or !strlen(trim($FNAME)))
      {
        $fname_error = 'Field required';
      }
    elseif (!preg_match("/^[a-zA-Z][a-zA-Z\s]*$/", $FNAME))
      {
        $fname_error = 'Only alphabets are allowed';
      }
    // elseif (!preg_match("/^[a-zA-Z][a-zA-Z\s]*$/", $MNAME))
    //   {
    //     $mname_error = "Only alphabets are allowed";
    //   }
    elseif (empty($LNAME) or !strlen(trim($LNAME)))
      {
        $lname_error = 'Field required';
      }
    elseif (!preg_match("/^[a-zA-Z][a-zA-Z\s]*$/", $LNAME))
      {
        $lname_error = "Only alphabets are allowed";
      }
    elseif (empty($SCHOOLNAME))
      {
        $schoolname_error = 'Field required';
      }
    elseif (!preg_match("/^[a-zA-Z][a-zA-Z\s]*$/", $SCHOOLNAME))
      {
        $schoolname_error = "Only alphabets are allowed";
      }
    elseif (empty($EMAIL))
      {
        $email_error = 'Field required';
      }
    elseif (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $_POST["email"]))
      {
        $email_error = "Invalid Email Address";
      }
    elseif (empty($CONTACT))
      {
        $contact_error = 'Field required';
      }
    elseif (strlen($CONTACT) < 10 or strlen($CONTACT) > 10)
      {
        $contact_error = 'Enter valid contact';
      }
    elseif (!preg_match("/^[0-9]*$/", $CONTACT))
      {
        $contact_error = 'Enter only numbers';
      }
    elseif (empty($ADDRESS))
      {
        $address_error = 'Field required';
      }
    elseif (empty($PSWD))
      {
        $pswd_error = 'Field required';
      }
    elseif (strlen($PSWD) < 4)
      {
        $pswd_error = "Password must contain minimum 4 characters";
      }
    elseif (!preg_match("/^.*(?=.{4,})(?=.*[0-9])(?=.*[a-zA-Z]).*$/", $PSWD))
      {
        $pswd_error = "Password must contain Alphabets and Digits with minimum length of 4.";
      }
   
    else
      { 
        $EMAIL  = mysqli_real_escape_string($con,$EMAIL);
        $s      = "select * from classreg where Email ='$EMAIL'";
        $result = mysqli_query($con, $s);
        $num    = mysqli_num_rows($result);
        if ($num == 1)
          {
            $email_error = "<p>Email is already registered</p>";
          }
        else
          {
            if ($con)
              {
                $location      = 'DP/';
                $target_file   = $location . basename($name);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                (move_uploaded_file($temp_name, $location . $name));
                $Pass = password_hash($PSWD, PASSWORD_DEFAULT);
                $sql  = "INSERT INTO classreg (Fname, Mname,Lname,Standard,Course,Schoolname,Email,Contact,Address,Pswd,DP,Reg_date)
                            VALUES('$FNAME','$MNAME','$LNAME','$STANDARD','$COURSE','$SCHOOLNAME' ,'$EMAIL','$CONTACT','$ADDRESS','$Pass','$target_file',CURDATE())";
                if (mysqli_query($con, $sql))
                  { 
                    echo "<script type='text/javascript'>
					         $(document).ready(function(){
					         $('#Modal').modal('show');
					         });
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
                  window.location.replace('http://localhost/himclasses/index.php')
                  }, 6000);
                   </script>";
                  }
                mysqli_close($con);
              }
          }
      }
  }
?>