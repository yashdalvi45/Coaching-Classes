<?php
 include "config/conn.php";
 require_once('controller/auth2.php');
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Load Composer's autoloader
// require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
if (isset($_POST['submit'])) 
{
    $EMAIL  = $_POST['email'];
    $EMAIL  = filter_var($EMAIL, FILTER_SANITIZE_EMAIL);
    $EMAIL  = mysqli_real_escape_string($con,$EMAIL);
    $s      = "select * from classreg where Email ='$EMAIL'";
    $result = mysqli_query($con, $s);
    $num    = mysqli_num_rows($result);
    $code   = uniqid(true);
    $timee  = time();
    $query  = mysqli_query($con,"Insert into resetpswd(Email,Code,Timee) values('$EMAIL','$code','$timee')");    
    if (empty($EMAIL))
      {
        $email_error = 'Field required';
      }
    elseif (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $EMAIL))
      {
        $email_error = "Invalid Email Address";
      }
    elseif ($num != 1)
          {
            $email_error = "<p>This email is not registered</p>";
          }
    elseif (!$query) 
    {
        exit("error");
    }
    else
    {
       $mail = new PHPMailer(true);

            try {
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'admin@gmail.com';                     // SMTP username
                $mail->Password   = 'xxxxxxxx';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('admin@gmail.com', 'Himalaya Classes');
                $mail->addAddress($EMAIL);     // Add a recipient
                $mail->addReplyTo('No-reply@gmail.com');

                // Content
                $url ="http://localhost/himclasses/pswd.php?code=$code";
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Link for Password reset';
                $mail->Body    = "<h2>Reset Password</h2><br>Himalaya Classes received request to reset your password<br><a href='$url'>Click here </a>to reset your password<br> This link will get expire after 10 minutes";
                $mail->AltBody = "Click on the link to reset password<br><a href='$url'>this</a>";

                $mail->send();
                // echo 'Message has been sent';
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
            } catch (Exception $e) {
                // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
    }
}
?>