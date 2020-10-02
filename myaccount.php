<?php require_once('controller/myaccphp.php');?>
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
      $(document).ready(function(){
      $('a[data-toggle="tab"]').on('show.bs.tab', function(e) 
      {
          localStorage.setItem('activeTab', $(e.target).attr('href'));
      });
      var activeTab = localStorage.getItem('activeTab');
      if(activeTab)
      {
          $('#myTab a[href="' + activeTab + '"]').tab('show');
      }
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
          <li class="nav-item"><a class="nav-link active" href="homepg.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="">Fee Structure</a></li>
          <li class="nav-item"><a class="nav-link" href="">Pay Fees</a></li>
          <li class="nav-item"><a class="nav-link" href="myaccount.php">My Account</a></li>
          <li class="nav-item"><a class="nav-link " href="logot.php">Logout</a></li>
        </ul>
      </div>
    </nav>
<!-- Breadcrum -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="homepg.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">MyAccount</li>
      </ol>
    </nav>
<!-- MyAccount -->
    <div class="container-fluid " style="margin-top: 20px; margin-bottom: 50px;">
      <div class="row">
        <div class="col-md-3" style="margin-bottom: 20px;">
          <div class="nav nav-tabs flex-column " id="myTab" role="tablist" aria-orientation="vertical" style="background-color: #5e0a55">
            <a class="nav-link active" data-toggle="tab" href="#basicinfo" role="tab" >Basic Information</a>
            <a class="nav-link" data-toggle="tab" href="#DP" role="tab" >Update Photo</a>
            <a class="nav-link" data-toggle="tab" href="#Newpswd" role="tab" >Change Password</a>
          </div>
        </div>
<!-- Basic Info -->
        <div class="col-md-9">
          <div class="tab-content" >
            <div class="tab-pane fade show active" id="basicinfo" role="tabpanel">
              <form class="border shadow p-3 mb-5 bg-white rounded" method="POST" enctype="multipart/form-data" style="margin-top: 0;" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md">
                      <label><b>First Name</b></label>
                      <input type="text" class="form-control" name="fname" value="<?= $row[0]; ?>" readonly >
                    </div>
                    <div class="col-md">
                      <label for="mname"><b>Middle Name</b></label>
                      <input type="text" class="form-control" name="mname"  value="<?= $row[1]; ?>" readonly >
                    </div>
                    <div class="col-md">
                      <label for="lname"><b>Last Name</b></label>
                      <input type="text" class="form-control" name="lname" value="<?= $row[2]; ?>" readonly  >
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md">
                    <label for="standard"><b>Select Standard</b></label>
                    <input type="text" name="standard" class="form-control" value="<?= $row[3]; ?>" readonly >
                  </div>
                  <div class="form-group col-md">
                    <label for="course"><b>Select Course</b></label>
                    <input type="text" name="course" class="form-control" value="<?= $row[4]; ?>" readonly  >
                  </div>
                </div>
                <div class="form-group">
                  <label for="schoolname"><b>School Name</b></label>
                  <input type="text" class="form-control" name="schoolname" value="<?= $row[5]; ?>"   >
                  <span class="error"><?php if(isset($schoolname_error)){echo $schoolname_error;}?></span>
                </div>
                <div class="form-row">
                  <div class="form-group col-md">
                    <label for="email"><b>Email</b></label>
                    <input type="email" class="form-control" name="email" value="<?= $row[6]; ?>" readonly  >
                  </div>
                  <div class="form-group col-md">
                    <label for="contact"><b>Contact Number</b></label>
                    <input type="number" class="form-control" name="contact" value="<?= $row[7]; ?>"  >
                    <span class="error"><?php if(isset($contact_error)){echo $contact_error;}?></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="address"><b>Residence Address</b></label>
                  <input type="text" class="form-control" name="address" value="<?= $row[8]; ?>"   > 
                  <span class="error"><?php if(isset($address_error)){echo $address_error;}?></span>  
                </div>
                <div>
                  <button type="submit" name='submit' class="btn btn-lg btn-primary btn-block">Update</button>
                </div>
              </form>
            </div>
<!-- PROFILE PIC -->
            <div class="tab-pane fade" id="DP" role="tabpanel" >
              <form class="border shadow p-3 mb-5 bg-white rounded" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
                <div style="text-align: center;">
                  <?php
                    $str="DP/";
                    if($row[10]=="DP/")
                        { echo "<img src='images/default.jpg' style='width:200px;height:200px'>";}
                    else{
                    echo "<img src='$row[10]' style='width:200px;height:200px'>"; }
                    ?>  
                </div>
                <div class="input-group mb-3 mt-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name=file id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose</label>
                    <div><br> <span class="error"><?php if(isset($_POST['name'])) { echo $f_error;}?></span> <br></div>
                    <script type="application/javascript">
                      $('input[type="file"]').change(function(e){
                          var fileName = e.target.files[0].name;
                          $('.custom-file-label').html(fileName);
                      });
                    </script>
                  </div>
                </div>
                <div>
                  <button type="submit" name='upload' class="btn btn-lg btn-primary btn-block">Upload</button>
                </div>
              </form>
            </div>
<!-- PASSWORD CHANGE -->
            <div class="tab-pane fade" id="Newpswd" role="tabpanel" >
              <form class="border shadow p-3 mb-5 bg-white rounded" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <div class="form-row">
                  <div class="col-sm">
                    <label><b>Current Password</b></label>
                    <input type="password" class="form-control" name="pswd"  value="<?= isset($_POST['pswd']) ? $_POST['pswd'] : ''; ?>">
                    <span class="error" ><?php if(isset($pswd_error)){echo $pswd_error;}?></span>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-sm">
                    <label for="newpswd"><b>New Password</b></label>
                    <input type="password" class="form-control" name="newpswd" value="<?= isset($_POST['newpswd']) ? $_POST['newpswd'] : ''; ?>" >
                    <span class="error" ><?php if(isset($newpswd_error)){echo $newpswd_error;}?></span>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-sm">
                    <label for="confirmpswd"><b>Confirm Password</b></label>
                    <input type="password" class="form-control" name="confirmpswd" value="<?= isset($_POST['confirmpswd']) ? $_POST['confirmpswd'] : ''; ?>">
                    <span class="error" ><?php if(isset($confirmpswd_error)){echo $confirmpswd_error;}?></span>
                  </div>
                </div>
                <div>
                  <br><button type="submit" name='reset' class="btn btn-lg btn-primary btn-block">Reset</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- Modal -->
    <div class="modal fade"  role="dialog" id="Modal">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-body">
            <p><b>Profile Updated Successfully</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade"  role="dialog" id="Modal0">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-body">
            <p><b>Password Updated Successfully</b></p>
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
    <footer class="footer text-center fixed-bottom" >
      <br>
      <p class="text-muted">Developed by Yash Dalvi</p>
    </footer>
  </body>
</html>