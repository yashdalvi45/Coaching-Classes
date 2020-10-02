<?php include"includes/header.php"?>
<?php require_once('controller/logval.php');?>
<!-- Bg-image -->
    <div class="bgimage">
      <div class="container-fluid" style=" padding: 0; ">
        <img src="images/books.jpg" class="img-responsive" style="max-height: 300px; width: 100%;  object-fit: cover; ">
      </div>
    </div>
<!-- Breadcrum -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Login</li>
      </ol>
    </nav>
<!-- Login Form -->
    <div class="container-fluid down">
      <h1>Login</h1>
      <br>
      <?php
        if (isset($_GET['logout']))
        {
        echo'<div class="alert alert-warning alert-dismissible hide text-center mx-auto" id="alert" style="max-width:640px; width:100%;"role="alert"> You have  been logged out because their is a session active on other browser or device.If its not you contact us or <a href="reset.php" class="alert-link">Click here</a>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
        ?>
      <form class="border shadow p-3 mb-5 bg-white rounded" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <div class="form-label-group">
          <label for="email"><b>Email address</b></label>
          <input type="email" name="email" class="form-control" placeholder="Email address"  autofocus="" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
          <span class="error"><?php if(isset($email_error)){echo $email_error;}?></span>
        </div>
        <div class="form-label-group">
          <br><label for="pswd"><b>Password</b></label>
          <input type="password" name="pswd" class="form-control" placeholder="Password" autocomplete="off">  
          <span class="error" ><?php if(isset($pswd_error)){echo $pswd_error;}?></span> 
        </div>
        <br><button class="btn btn-lg btn-primary btn-block"id="submit" name=submit type="submit">Sign in</button> 
        <br>
        <p style="text-align: center;"><a href="reset.php" >Forgot Password</a></p>
        <p style="text-align: center;">Not Registered? <a href="admission.php">Sign Up</a></p>
      </form>
    </div>
    <div class="modal fade"  role="dialog" id="Modal1">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-body">
            <p><b>Something went wrong please try again later</b></p>
          </div>
          <div class="modal-footer" style="justify-content: center;">
            <a  href="index.php"  class="btn btn-primary" >OK</a> 
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade"  role="dialog" id="Modal">
      <div class="modal-dialog" >
        <div class="modal-content">
          <button type="button" style="text-align: end" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-body">
            <form class="bg-white rounded" method="POST">
              <div class="form-label-group">
                <label for="em"><b>Email address</b></label>
                <input type="email" name="em" class="form-control" placeholder="Email address"  autofocus="" value="<?= isset($_POST['em']) ? $_POST['em'] : ''; ?>">
                <span class="error"><?php if(isset($email_error)){echo $email_error;}?></span>
              </div>
              <br><button class="btn btn-lg btn-primary btn-block" name=submit type="submit">Send</button> 
            </form>
          </div>
        </div>
      </div>
    </div>
<!-- Footer -->
    <?php include"includes/footer.php"?>      
</body>
</html>