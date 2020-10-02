<?php
// require_once('include.php');
session_start();
//session_regenerate_id(True);
include 'config/conn.php';
require_once ('controller/auth.php');
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
$query = "Select Fname,Mname,Lname,Standard,Course,DP,Reg_date from classreg where EMAIL='$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$FNAME = $row[0];
$MNAME = $row[1];
$LNAME = $row[2];
$STANDARD = $row[3];
$COURSE = $row[4];
$DP = $row[5];
$REG_DATE = $row[6];
if (isset($_POST['submit'])) {
    $SUBJECT = $_POST['subject'];
    $MESSAGE = $_POST['message'];
    if (empty($SUBJECT) or !strlen(trim($SUBJECT))) {
        $subject_error = 'Field required';
    } elseif (!strlen(trim($MESSAGE))) {
        $message_error = 'Field required';
    } else {
        if ($con) {
            $sql = "INSERT INTO feedback (Email, Subject,Message,Feedback_date) VALUES('$id','$SUBJECT','$MESSAGE',CURDATE())";
            if (mysqli_query($con, $sql)) 
            {
                echo "<script>
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
                echo "<script>
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
            mysqli_close($con);
        }
    }
}
?>