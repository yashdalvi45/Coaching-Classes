<?php
include "config/conn.php";
if (isset($_POST['submit']))
  {
    $FNAME   = $_POST['fname'];
    $LNAME   = $_POST['lname'];
    $EMAIL   = $_POST['email'];
    $EMAIL   = filter_var($EMAIL, FILTER_SANITIZE_EMAIL);
    $CONTACT = $_POST['contact'];
    $CONTACT =filter_var($CONTACT,FILTER_SANITIZE_NUMBER_INT);
    $REMARK  = $_POST['remark'];
    if (empty($FNAME))
      {
        $fname_error = 'Field required';
      }
    elseif (!preg_match("/^[a-zA-Z][a-zA-Z\s]*$/", $FNAME))
      {
        $fname_error = 'Only alphabets are allowed';
      }
    elseif (empty($LNAME))
      {
        $lname_error = 'Field required';
      }
    elseif (!preg_match("/^[a-zA-Z][a-zA-Z\s]*$/", $LNAME))
      {
        $lname_error = "Only alphabets are allowed";
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
        $contact_error = 'Enter valid contact number';
      }
    elseif (!preg_match("/^[0-9]*$/", $CONTACT))
      {
        $contact_error = 'Enter only numbers';
      }
    elseif (!strlen(trim($REMARK)))
      {
        $remark_error = 'Field required';
      }
    elseif (strlen($REMARK) > 1000)
      {
        $remark_error = 'You have reached the word count limit';
      }
    else
      {
        if ($con)
          {
            $EMAIL = mysqli_real_escape_string($con,$EMAIL);
            $sql = "INSERT INTO enquiry (Fname,Lname,Email,Contact,Remark,Enquiry_date)
                            VALUES('$FNAME','$LNAME','$EMAIL','$CONTACT','$REMARK',CURDATE())";
            if (mysqli_query($con, $sql))
              {
                echo "<script type='text/javascript'>
                   $(document).ready(function(){
                   $('#Modal').modal('show');
                   });
                   setTimeout(function() 
                   {
                  $('#Modal').modal('hide');
                  window.location.replace('http://localhost/himclasses/index.php')
                  }, 6000);
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
?>  