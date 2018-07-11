<?php include("includes/admin_header.php");
      include("includes/admin_nav.php");
      include("includes/admin_sidebar.php");

?>
<?php if($this->session->flashdata('message') != NULL): ?>
<div class="alert alert-failure alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </button>
  Administrator <strong>updated</strong>!
</div>
<?php endif; ?>
<?php echo form_open('admin/register_admin') ?>
      <!-- Page Content -->
        <div id="page-content-wrapper ">
          <div class="container-fluid bg-secondary">
            <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu</a>
            <main class="col-sm-9 offset-sm-2 col-md-10 offset-md-1 pt-3">
              <h1 class="text-center pb-4 display-4">Registration</h1>
              <h2 class="pb-2">Sign Up Administrator</h2>
              <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">First Name:</label>
              <div class="col-10 mb-2">
                <input class="form-control" type="text" name="first_name" placeholder="John" >
              </div>
              <label for="example-text-input" class="col-sm-2 col-form-label">Middle Name:</label>
              <div class="col-10 mb-2">
                <input class="form-control" type="text" name="middle_name" placeholder="Vincent" >
              </div>
              <label for="example-text-input" class="col-sm-2 col-form-label">Last Name:</label>
              <div class="col-10">
                <input class="form-control" type="text" name="last_name" placeholder="Doe" >
              </div>
            </div>

            <div class="form-group row">
              <label for="example-email-input" class="col-sm-2 col-form-label">E-mail Address:</label>
              <div class="col-10">
                <input class="form-control" name="email_address" type="email" id="example-email-input">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-search-input" class="col-sm-2 col-form-label">Password:</label>
              <div class="col-sm-10">
                <input class="form-control"  name="password" type="password" >
              </div>
            </div>





<!--

            <div class="form-group row">
              <label for="example-search-input" class="col-sm-2 col-form-label">Upload Photo:</label>
              <div class="col-10">
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
              </div>
            </div>
-->
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-outline-success">Submit</button>
          </div>
		  <!-- /#page-content-wrapper -->
<?php form_close(); ?>
<?php include("includes/admin_footer.php"); ?>
