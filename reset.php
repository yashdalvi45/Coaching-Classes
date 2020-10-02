<?php include"includes/header.php";
require_once('controller/resetpswd.php');?>
<!-- Background image -->
  <div class="bgimage">
    <div class="container-fluid" style=" padding: 0; ">
      <img src="images/books.jpg" class="img-responsive" style="max-height: 300px; width: 100%;  object-fit: cover; ">
    </div>
  </div>
<!-- Breadcrum -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="login.php">Login</a></li>
      <li class="breadcrumb-item active" aria-current="page">Reset password</li>
    </ol>
  </nav>
<!-- Form -->
  <div>
    <form class="bg-white shadow rounded mt-5 mb-5" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
      <div class="form-label-group">
        <label for="email"><b>Email address</b></label>
        <input type="email" name="email" class="form-control" placeholder="Email address"  autofocus="" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
        <span class="error"><?php if(isset($email_error)){echo $email_error;}?></span>
      </div>
      <br><button class="btn btn-lg btn-primary btn-block" name=submit type="submit">Send</button> 
    </form>
  </div>
<!-- Modal -->
  <div class="modal fade"  role="dialog" id="Modal1">
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-body">
          <form class="bg-white rounded" method="POST">
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
        <div class="modal-body">
          <p><b>Link has been sent on your email. Please Check your Email</b></p>
        </div>
        <div class="modal-footer" style="justify-content: center;">
          <a  href="login.php"  class="btn btn-primary" >OK</a> 
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade"  role="dialog" id="Modal0">
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-body">
          <p><b>Something went wrong please try again later</b></p>
        </div>
        <div class="modal-footer" style="justify-content: center;">
          <a  href="login.php"  class="btn btn-primary" >OK</a> 
        </div>
      </div>
    </div>
  </div>
<!-- Footer -->
  <?php include "includes/footer.php" ?>
</body>
</html>