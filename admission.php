<?php include"includes/header.php"?>
<?php require_once('controller/admval.php');?>
<!-- Bgimage -->
    <div class="bgimage">
      <div class="container-fluid" style=" padding: 0; ">
        <img src="images/books.jpg" class="img-responsive" style="max-height: 300px; width: 100%;  object-fit: cover; ">
      </div>
    </div>
<!-- Breadcrum -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Admission</li>
      </ol>
    </nav>
<!-- Form -->
    <div class="container-fluid down">
      <h1>Admission Form</h1>
      <br>
      <form class="border shadow p-3 mb-5 bg-white rounded" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
        <div class="form-group">
          <div class="form-row">
            <div class="col-sm">
              <label><b>First Name<span style='color:red'>*</b></span></label>
              <input type="text" class="form-control" name="fname" autofocus value="<?= isset($_POST['fname']) ? $_POST['fname'] : ''; ?>"  >
              <span class="error"><?php if(isset($fname_error)){echo $fname_error;}?></span>
            </div>
            <div class="col-sm">
              <label for="mname"><b>Middle Name</b></label>
              <input type="text" class="form-control" name="mname"  value="<?= isset($_POST['mname']) ? $_POST['mname'] : ''; ?>">
              <span class="error"><?php if(isset($mname_error)){echo $mname_error;}?></span>
            </div>
            <div class="col-sm">
              <label for="lname"><b>Last Name<span style='color:red'>*</b></span></label>
              <input type="text" class="form-control" name="lname" value="<?= isset($_POST['lname']) ? $_POST['lname'] : ''; ?>"  >
              <span class="error"><?php if(isset($lname_error)){echo $lname_error;}?></span>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md">
            <label for="standard"><b>Select Standard<span style='color:red'>*</b></span></label>
            <select name="standard" class="form-control">
              <option value="10th" <?php echo (isset($_POST['standard']) && $_POST['standard'] == '10th') ? 'selected="selected"' : ''; ?>>10th</option>
              <option value="11th" <?php echo (isset($_POST['standard']) && $_POST['standard'] == '11th') ? 'selected="selected"' : ''; ?>>11th</option>
              <option value="12th" <?php echo (isset($_POST['standard']) && $_POST['standard'] == '12th') ? 'selected="selected"' : ''; ?>>12th</option>
            </select>
          </div>
          <div class="form-group col-md">
            <label for="course"><b>Select Course<span style='color:red'>*</b></span></label>
            <select name="course" class="form-control">
              <option value="SSC" <?php echo (isset($_POST['course']) && $_POST['course'] == 'SSC') ? 'selected="selected"' : ''; ?>>SSC</option>
              <option value="Science" <?php echo (isset($_POST['course']) && $_POST['course'] == 'Science') ? 'selected="selected"' : ''; ?>>Science</option>
              <option value="Commerce" <?php echo (isset($_POST['course']) && $_POST['course'] == 'Commerce') ? 'selected="selected"' : ''; ?>>Commerce</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="schoolname"><b>School Name<span style='color:red'>*</b></span></label>
          <input type="text" class="form-control" name="schoolname" value="<?=isset($_POST['schoolname']) ? $_POST['schoolname'] : ''; ?>" >
          <span class="error"><?php if(isset($schoolname_error)){echo $schoolname_error;}?></span>
        </div>
        <div class="form-row">
          <div class="form-group col-md">
            <label for="email"><b>Email<span style='color:red'>*</b></span></label>
            <input type="email" class="form-control" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>" >
            <span class="error"><?php if(isset($email_error)){echo $email_error;}?></span>
          </div>
          <div class="form-group col-md">
            <label for="contact"><b>Contact Number<span style='color:red'>*</b></span></label>
            <input type="number" class="form-control" name="contact" value="<?= isset($_POST['contact']) ? $_POST['contact'] : ''; ?>" >
            <span class="error"><?php if(isset($contact_error)){echo $contact_error;}?></span>
          </div>
        </div>
        <div class="form-group">
          <label for="address"><b>Residence Address<span style='color:red'>*</b></span></label>
          <input type="text" class="form-control" name="address" value="<?= isset($_POST['address']) ? $_POST['address'] : ''; ?>" >
          <span class="error"><?php if(isset($address_error)){echo $address_error;}?></span>
        </div>
        <div class="form-group">
          <label><b>Photo ID</b></label>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name=file id="inputGroupFile01">
            <label class="custom-file-label" for="inputGroupFile01">Choose</label>
            <div><?php if(isset($_POST['f_error'])) { echo $f_error;}?></div>
            <script type="application/javascript">
              $('input[type="file"]').change(function(e){
                  var fileName = e.target.files[0].name;
                  $('.custom-file-label').html(fileName);
              });
            </script>
          </div>
        </div>
        <div class="form-group">
          <label for="pswd"><b>Set Password<span style='color:red'>*</b></span></label>
          <input type="password" class="form-control" name="pswd" autocomplete="off" >
          <small id="passwordHelpBlock" class="form-text text-muted">
          Your password must be minimum of 4 characters long and must consist of  letters and numbers.
          </small>
          <span class="error" ><?php if(isset($pswd_error)){echo $pswd_error;}?></span>
        </div>
        <button type="submit" name='submit' class="btn btn-lg btn-primary btn-block">Sumbit</button>
      </form>
    </div>
<!-- Modal -->
    <div class="modal fade"  role="dialog" id="Modal">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Registration Successful!!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p><b>Please Login Now.</b></p>
          </div>
          <div class="modal-footer">
            <a  href="index.php"  class="btn btn-secondary">Close</a>
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
            <a  href="index.php"  class="btn btn-primary" >OK</a> 
          </div>
        </div>
      </div>
    </div>
<!-- Footer -->
  <?php include"includes/footer.php"?>
</body>
</html>