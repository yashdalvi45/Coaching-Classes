<?php require_once('controller/homephp.php');?>
<!DOCTYPE html>
<html>
  <head>
    <title>Himalaya Classes</title>
    <meta name="viewport" charset="UTF-8" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.5.1.min.js"></script> 
    <script src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet"  href="css/bootstrap.css"/>
    <link rel="stylesheet"  href="css/style.css">
    <link rel="icon" href="images/favicon.ico">
    <style type="text/css">
      .error
      {
      color: red;
      }
    </style>
    <script> 
    $(window).bind('beforeunload',function(){
      $.ajax({
        type:'get',
        async:false,
        url:'http://localhost/himclasses/logot.php'
        });
      });
    </script>
  </head>
  <body>
<!-- Menu -->
    <nav class="navbar navbar-expand-md navbar-dark sticky-top">
      <a class="navbar-brand " href="homepg.php"><img src="images/logo.png"  alt="Logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menu" style="">
        <ul class="navbar-nav ml-auto justify-content-end">
          <li class="nav-item"><a class="nav-link " href="homepg.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="">Fee Structure</a></li>
          <li class="nav-item"><a class="nav-link" href="">Pay Fees</a></li>
          <li class="nav-item"><a class="nav-link" href="myaccount.php">My Account</a></li>
          <li class="nav-item"><a class="nav-link active" href="logot.php" >Logout</a></li>
        </ul>
      </div>
    </nav>
<!-- Content -->   
    <div class="container-fluid" style="margin-top: 30px;margin-bottom: 40px;">
      <div class="row">
        <div class="col-md-3" style="text-align: center;">
          <?php
            $str="DP/";
            if($row[5]=="DP/")
                { echo "<img src='images/default.jpg' style='width:200px;height:200px'>";}
            else{
            echo "<img src='$row[5]' style='width:200px;height:200px'>"; }
            ?> 
          <div class="col-md" style="margin-top: 1rem;margin-bottom: 2rem;">
            <table class="table table-bordered bg-white " >
              <tr>
                <th >Name</th>
                <td><?php echo $FNAME." ".$MNAME." ".$LNAME;?></td>
              </tr>
              <tr>
                <th >Standard</th>
                <td><?php echo $STANDARD;?></td>
              </tr>
              <tr>
                <th >Course</th>
                <td><?php echo $COURSE;?></td>
              </tr>
              <tr>
                <th >Registration Date</th>
                <td><?php echo $REG_DATE;?></td>
              </tr>
              <tr>
                <th >Balance Fees</th>
                <td><?php echo (rand(10000,20000));?></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-md-5 border bg-white" style="margin-bottom: 25px;">
          <h3 style="text-align: center; color: red;border-bottom: 2px solid;">WELCOME</h3>
          <p>Thank you for visiting your portal ! Himalaya Classes welcome you to this Web Portal designed for you.</p>
          <p> With this portal you will be able to see the your balance fees an will also be able to pay fees online.You can also go through the fees structure.
            Keeping your contact details updated will ensure timely and effective communication from your institute.
          </p>
          <p>You have successfully used your login credentials to come to this portal. Kindly keep your login details confidential for your safety and to avoid misuse. Under any circumstances do not share your login details with anybody. In worst case if you happen to do so please ensure that you change your password immediately after such incident.</p>
          <p>Your feedback about the information and resources available on the Portal is important to us. Please use the "feedback" link to communicate your recommendations.</p>
        </div>
        <div class="col-md">
          <form class="border shadow p-3 mb-5 bg-white rounded" method="POST" action="">
            <h3 style="text-align: center;">Feedback</h3>
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" name="subject" value="<?=isset($_POST['subject']) ? $_POST['subject'] : ''; ?>" >
              <span class="error"><?php if(isset($subject_error)){echo $subject_error;}?></span>
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" name="message"><?php if (isset($_POST['message'])){ $MSG=$_POST['message']; echo ($MSG);}?></textarea>
              <span class="error"><?php if(isset($message_error)){echo $message_error;}?></span>
            </div>
            <div>
              <button type="submit" name='submit' class="btn btn-lg btn-primary btn-block">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
<!-- Modal -->
    <div class="modal fade"  role="dialog" id="Modal">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-body">
            <p><b>Thank you for your valueable feedback</b></p>
          </div>
          <div class="modal-footer" style="justify-content: center;">
            <a  href="homepg.php"  class="btn btn-primary" >OK</a> 
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade"  role="dialog" id="Modal1">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-body">
            <p><b>Something went wrong please try again later</b></p>
          </div>
          <div class="modal-footer" style="justify-content: center;">
            <a  href="homepg.php"  class="btn btn-primary" >OK</a> 
          </div>
        </div>
      </div>
    </div>
<!-- Footer -->
    <footer class="footer text-center fixed-bottom" style="margin-top: 20px;">
      <br>
      <p class="text-muted">Developed by Yash Dalvi</p>
    </footer>
  </body>
</html>