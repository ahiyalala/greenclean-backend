<?php include("includes/admin_header.php"); 
      include("includes/admin_nav.php");
      include("includes/admin_sidebar.php");
	  
?>
      <!-- Page Content -->
        <div id="page-content-wrapper ">
          <div class="container-fluid bg-secondary">
            <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
            <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
              <h1 class="text-center pb-4 display-4">Registration</h1>
              <h2 class="pb-2">Sign Up Administrator</h2>
              <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Full Name:</label>
              <div class="col-10">
                <input class="form-control" type="text" id="example-text-input">
              </div>
            </div>

            <div class="form-group row">

              <label for="example-search-input" class="col-2 col-form-label">Birthday:</label>
              <div class="col-4">
                <input class="form-control" type="date" id="example-search-input">
              </div>
              <label for="example-text-input" class="col-1 col-form-label">Gender:</label>
              <div class="col-5 mt-2">
                <label class="custom-control custom-radio">
                  <input id="radio1" name="radio" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Male</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="radio" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Female</span>
                </label>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label">Address:</label>
              <div class="col-10">
                <input class="form-control" type="text" id="example-search-input">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-email-input" class="col-2 col-form-label">E-mail Address:</label>
              <div class="col-10">
                <input class="form-control" type="email" id="example-email-input">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label">Username:</label>
              <div class="col-10">
                <input class="form-control" type="text" id="example-search-input">
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label">Password:</label>
              <div class="col-10">
                <input class="form-control" type="password" id="example-search-input">
              </div>
            </div>

           



            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label">Upload Photo:</label>
              <div class="col-10">
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
              </div>
            </div>

          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-outline-success">Submit</button>
          </div>
		  <!-- /#page-content-wrapper -->
		  
<?php include("includes/admin_footer.php"); ?>