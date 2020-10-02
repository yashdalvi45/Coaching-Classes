<?php include"includes/header.php"?>
<?php require_once('controller/conval.php');?>
<!-- Bgimage -->
    <div class="bgimage">
      <div class="container-fluid" style=" padding: 0; ">
        <img src="images/contact.jpg" class="img-fluid" style="max-height: 300px; width: 100%;  object-fit: cover; ">
      </div>
    </div>
<!-- Breadcrum -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
      </ol>
    </nav>
<!-- Contact Us -->
    <div class="container-fluid cont" style="align-items: center;">
      <br><br>
      <h1><b>CONTACT US</b></h1>
      <div class="row shadow p-3 mb-5 bg-white rounded border" style="justify-content: center; margin: 20px; border">
        <div class="col-md">
          <h3>Address</h3>
          <p>Jai Ganesh Vision Office Plaza, Office No. 55, Ground Floor,‘B’ Building, Akurdi,Pune-411035.MH INDIA</p>
        </div>
        <div class="col-md">
          <span class="glyphicon glyphicon-map-marker" style="font-size: 60px; color: #000000; width: 60px;height: 60px;"></span>
          <h3>Contact Number</h3>
          <p>022-123456 or 022-147852</p>
        </div>
      </div>
    </div>
<!-- Enquiry Form -->  
    <div class="container-fluid cont" style="margin-bottom: 20px;">
      <div class="row " style="justify-content: space-around; margin: 20px;">
        <div class="col-md">
          <h3 >Enquiry</h3>
          <br>  
          <form class="border shadow p-3 mb-5 bg-white rounded" method="POST" style="margin: 0px;" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <div class="form-group">
              <div class="form-row">
                <div class="col-sm">
                  <label for="fname"><b>First Name</b></label>
                  <input type="text" class="form-control" name="fname" required value="<?= isset($_POST['fname']) ? $_POST['fname'] : ''; ?>">
                  <span class="error"><?php if(isset($fname_error)){echo $fname_error;}?></span>
                </div>
                <div class="col-sm">
                  <label for="lname"><b>Last Name</b></label>
                  <input type="text" class="form-control" name="lname" value="<?= isset($_POST['lname']) ? $_POST['lname'] : ''; ?>" required>
                  <span class="error"><?php if(isset($lname_error)){echo $lname_error;}?></span>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md">
                <label for="email"><b>Email</b></label>
                <input type="email" class="form-control" name="email"value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                <span class="error"><?php if(isset($email_error)){echo $email_error;}?></span>
              </div>
              <div class="form-group col-md">
                <label for="contact"><b>Contact Number</b></label>
                <input type="number" class="form-control" name="contact" value="<?= isset($_POST['contact']) ? $_POST['contact']: ''; ?>" required>
                <span class="error"><?php if(isset($contact_error)){echo $contact_error;}?></span>
              </div>
            </div>
            <div class="form-group">
              <label for="remark"><b>Remark:</b></label>
              <textarea class="form-control" rows="5" name="remark" required><?php if (isset($_POST['remark'])){ $MSG=$_POST['remark']; echo ($MSG);}?></textarea>
              <span class="error"><?php if(isset($remark_error)){echo $remark_error;}?></span>
            </div>
            <button type="submit" name=submit class="btn btn-primary">Sumbit</button>
          </form>
        </div>
<!-- Map -->
        <div class="col-md">
          <h3 >Locate Us</h3>
          <br>  
          <div class="google-maps shadow ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3780.356357342791!2d73.78243941437057!3d18.64799817013285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2b9cfa2941a2f%3A0x5b891fc389cee344!2sCareerTech%20IT%20Solutions!5e0!3m2!1sen!2sin!4v1594819398039!5m2!1sen!2sin" width="100%" height="415" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
        </div>
      </div>
    </div>
<!-- Modal -->
    <div class="modal fade"  role="dialog" id="Modal">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-body">
            <p><b>Thank You for contacting us we will get back to you soon!!</b></p>
          </div>
          <div class="modal-footer" style="justify-content: center;">
            <a  href="index.php"  class="btn btn-primary" >OK</a> 
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