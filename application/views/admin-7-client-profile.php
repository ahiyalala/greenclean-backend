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
                                    <h1 class="text-center display-4">Kat Cruz's Profile</h1>
                                    <div class="dropdown-divider"></div>
                                    <!-- START OF 1ST CARD -->

                                    <div class="card  w-75 container">
                                          <div class="card-header bg-success h3">Personal Infomation</div>
                                          <!-- START OF 1ST CARD BODY -->
                                          <div class="card-block bg-faded">
                                                <div class="d-flex justify-content-center">
                                                      <img src="http://via.placeholder.com/250x250" class="img-fluid rounded-circle" alt="APPLE">
                                                </div>
                                                <div class="text-center mb-3">
                                                      <h3 class="h3">Kat Cruz</h3>
                                                </div>
                                                <table class="table bg-faded">
                                                      <tbody>
                                                            <tr>
                                                                  <th scope="row">Address: </th>
                                                                  <td>Blk. 23 Lot. 12 Colorado St. Phase 2 Ampid San Mateo, Rizal</td>
                                                            </tr>
                                                            <tr>
                                                                  <th scope="row">Birthday: </th>
                                                                  <td>October 31, 1997</td>
                                                            </tr>
                                                            <tr>
                                                                  <th scope="row">Gender: </th>
                                                                  <td>Femle</td>
                                                            </tr>
                                                            <tr>
                                                                  <th scope="row">Date Registered: </th>
                                                                  <td>July 21, 2018</td>
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
                                          <div class="card-header bg-success h3">Client Booking Information</div>
                                          <!-- START OF 2ND CARD BODY -->
                                          <div class="card-block bg-faded">
                                                <table class="table bg-faded">
                                                      <thead>
                                                            <tr>
                                                                  <th scope="col">#</th>
                                                                  <th scope="col">Employee Name</th>
                                                                  <th scope="col">Date</th>
                                                                  <th scope="col">Time</th>
                                                                  <th scope="col">Status</th>
                                                            </tr>
                                                      </thead>
                                                      <tbody>
                                                            <tr>
                                                                  <th scope="row"> 1 </th>
                                                                  <td>John Doe</td>
                                                                  <td>February 1, 2018</td>
                                                                  <td>8:00am - 12:00pm</td>
                                                                  <td>Finished</td>
                                                            </tr>
                                                            <tr>
                                                                  <th scope="row"> 2 </th>
                                                                  <td>John Doe</td>
                                                                  <td>February 5, 2018</td>
                                                                  <td>8:00am - 12:00pm</td>
                                                                  <td>Not Started</td>
                                                            </tr>
                                                            <tr>
                                                                  <th scope="row"> 3 </th>
                                                                  <td>Lisa Zoe</td>
                                                                  <td>February 8, 2018</td>
                                                                  <td>4:00pm - 8:00pm</td>
                                                                  <td>Not Started</td>
                                                            </tr>
                                                      </tbody>
                                                </table>
                                          </div>
                                    </div>



                              </main>
                              <!-- END OF MAIN -->

                        </div>
                        <!-- End Full Section -->
<?php $this->view("includes/admin_footer.php"); ?>