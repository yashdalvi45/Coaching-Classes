<?php include"includes/header.php"?>
<?php require_once('controller/pswdval.php');?>
<!-- Breadcrum -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="login.php">Login</a></li>
      <li class="breadcrumb-item active" aria-current="page">Reset password</li>
    </ol>
  </nav>
<!-- Password reset -->
  <div class="container">
    <form class="border shadow p-3 mb-5 bg-white rounded" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
      <div class="form-row">
        <div class="col-sm">
          <label for="newpswd"><b>New Password</b></label>
          <input type="password" class="form-control" name="newpswd" value="<?= isset($_POST['newpswd']) ? $_POST['newpswd'] : ''; ?>" >
          <small id="passwordHelpBlock" class="form-text text-muted">
          Your password must be minimum of 4 characters long and must consist of  letters and numbers.
          </small>
          <span class="error" ><?php if(isset($newpswd_error)){echo $newpswd_error;}?></span>
        </div>
      </div>
      <div class="form-row">
        <div class="col-sm">
          <br><label for="confirmpswd"><b>Confirm Password</b></label>
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
<!-- Modal -->
  <div class="modal fade"  role="dialog" id="Modal">
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Password Reset Successful</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p><b>Please Login Now.</b></p>
        </div>
        <div class="modal-footer">
          <a  href="login.php"  class="btn btn-primary">Login</a>
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
  <?php include "includes/footer.php" ?>
</body>
</html>