<?php $this->view("includes/admin_header.php"); 
      $this->view("includes/admin_nav.php");
      $this->view("includes/admin_sidebar.php");
	  
?>

                  <!-- Page Content -->
                  <div id="page-content-wrapper ">
                        <!-- Full Section -->
                        <div class="container-fluid bg-secondary">
                              <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
                              <!-- START OF MAIN -->
                              <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
                                    <h1 class="text-center display-4"><?php echo $housekeepers->first_name." ".$housekeepers->last_name; ?>'s Profile</h1>
                                    <div class="dropdown-divider"></div>
                                    <!-- START OF 1ST CARD -->

                                    <div class="card  w-75 container">
                                          <div class="card-header bg-success h3">Personal Infomation</div>
                                          <!-- START OF 1ST CARD BODY -->
                                          <div class="card-block bg-faded">
                                                <div class="d-flex justify-content-center">
                                                      <img src="https://via.placeholder.com/250x250" class="img-fluid rounded-circle" alt="APPLE" width="250" height="250">
                                                </div>
                                                <div class="text-center mb-3">
                                                      <h3 class="h3"><?php echo $housekeepers->last_name.", ".$housekeepers->first_name; ?></h3>
                                                </div>
                                                <table class="table bg-faded">
                                                      <tbody>
                                                            <tr>
                                                                  <th scope="row">Birthday: </th>
                                                                  <td><?php echo $housekeepers->birth_date; ?></td>
                                                            </tr>
                                                            <tr>
                                                                  <th scope="row">Gender: </th>
                                                                  <td><?php echo $housekeepers->gender; ?></td>
                                                            </tr>
                                                            <tr>
                                                                  <th scope="row">Work Registered: </th>
                                                                  <td>Monday - Friday</td>
                                                            </tr>
                                                            <tr>
                                                                  <th scope="row">OFF Days: </th>
                                                                  <td>Saturday, Sunday</td>
                                                            </tr>
                                                      </tbody>
                                                </table>

                                          </div>
                                          <!-- END OF 1ST CARD BODY -->
                                          <div class="card-footer">
                                                <div class="d-flex justify-content-center clearfix pt-2">
                                                      <button class="btn btn-outline-success mx-1">Update</button>
                                                      <button class="btn btn-outline-danger mx-1">Delete</button>
                                                </div>
                                          </div>

                                    </div>
                                    <!-- END OF 1ST CARD -->

                                    <div class="card mt-3 w-75 container">
                                          <div class="card-header bg-success h3">Work Infomation</div>
                                          <!-- START OF 2ND CARD BODY -->
                                          <div class="card-block bg-faded">
                                                <table class="table bg-faded">
                                                      <thead>
                                                            <tr>
                                                                  <th scope="col">#</th>
                                                                  <th scope="col">Client Name</th>
                                                                  <th scope="col">Date</th>
                                                                  <th scope="col">Time</th>
                                                            </tr>
                                                      </thead>
                                                      <tbody>
                                                            <tr>
                                                                  <th scope="row"> 1 </th>
                                                                  <td>Kat Cruz</td>
                                                                  <td>July 26, 2019</td>
                                                                  <td>16:00 - 17:00</td>
                                                            </tr>
                                                      </tbody>
                                                </table>
                                          </div>
                                    </div>



                              </main>
                              <!-- END OF MAIN -->

                        </div>
                        <!-- End Full Section -->
                    
                  <!-- END Page Content  -->

<?php $this->view("includes/admin_footer.php"); ?>