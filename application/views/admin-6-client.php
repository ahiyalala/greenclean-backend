<?php $this->view("includes/admin_header.php");
      $this->view("includes/admin_nav.php");
      $this->view("includes/admin_sidebar.php");

?>

      <!-- Page Content -->
      <div id="page-content-wrapper ">
        <div class="container-fluid bg-secondary">

          <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
          <main class="col-sm-9 offset-sm-2 col-md-10 offset-md-1 pt-3">
            <h1 class="text-center display-4">Appointments Management</h1>
            <div class="dropdown-divider"></div>
<!---
            <h2 class="display-5 pt-5 pb-3">Clients</h2>

            <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered text-center" id="myTable">
                <thead>
                  <tr>

                    <th class="text-center">No.</th>
                    <th class="text-center">Full Name</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">Date Registered</th>
                    <th class="text-center">Services Rendered</th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>

                    <td>1</td>
                    <td>
                      Kat Cruz
                    </td>
                    <td>F</td>
                    <td>January 4, 2018</td>
                    <td>  3 </td>
                    <td>
                        <div class="btn-group w-100 btn-block" role="group">
                        <button type="button" class="btn btn-danger btn-block " data-toggle="modal" data-target="#confirmAdmin"><i class="fas fa-trash-alt"></i> Delete</button>
                        <!- <button type="button" class="btn btn-success " data-toggle="modal" data-target="#updateAdminModal"><i class="fas fa-edit"></i> Update</button> ->
                        </div>
                      </td>
                  </tr>
                  <tr>

                    <td>2</td>
                    <td>
                      Pat Santos
                    </td>
                    <td>F</td>
                    <td>January 9, 2018</td>
                    <td> 2 </td>
                    <td>
                        <div class="btn-group w-100 btn-block" role="group">
                        <button type="button" class="btn btn-danger btn-block " data-toggle="modal" data-target="#confirmAdmin"><i class="fas fa-trash-alt"></i> Delete</button>
                        <!- <button type="button" class="btn btn-success " data-toggle="modal" data-target="#updateAdminModal"><i class="fas fa-edit"></i> Update</button> ->
                        </div>
                      </td>
                  </tr>
                  <tr>

                    <td>3</td>
                    <td>
                    Juan dela Cruz
                    </td>
                    <td>M</td>
                    <td>January 11, 2018</td>
                    <td> 0 </td>
                    <td>
                        <div class="btn-group w-100 btn-block" role="group">
                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#confirmAdmin"><i class="fas fa-trash-alt"></i> Delete</button>

                    </div>
                      </td>
                  </tr>
                </tbody>
              </table>
            </div>





        <!- Modal Delete ->
        <div class="modal fade" id="confirmAdmin" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Delete Confirmation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to delete this user?
                      <div class="form-row">
                        <div class="form-group my-3 col-sm-12 d-flex justify-content-center">
                          <button type="submit" class="mx-2 btn btn-danger">Yes</button>
						  <button type="submit" class="mx-2 btn btn-primary" data-dismiss="modal">No</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
          </div>

            <hr class="py-2">
            <h2 class="display-5 pb-3">Client Status</h2>-->

            <div class="table-responsive-md">
              <table class="table table-striped table-bordered table-hover" id="myTable2">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Client Name</th>
                    <th>Employee Name</th>
                    <th> Service Type </td>
                    <th>Date of Service</th>
                    <th>Status</th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Kat Cruz</td>
                    <td>John Doe</td>
                    <td> Package A</td>
                    <td>February 1, 2018</td>
                    <td>Finished</td>
                    <td>
                    <div class="btn-group w-100 btn-block" role="group">
                        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#updateAdminModal"><i class="fas fa-edit"></i> Update</button>
                        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#confirmRefund"><i class="fas fa-exclamation"></i> Refund</button>
                    </div>
                    </td>

                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Pat Santos</td>
                    <td>John Doe</td>
                    <td> Package B</td>
                    <td>February 1, 2018</td>
                    <td>Finished</td>
                    <td>
                    <div class="btn-group w-100 btn-block" role="group">
                        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#updateAdminModal"><i class="fas fa-edit"></i> Update</button>
                        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#confirmRefund"><i class="fas fa-exclamation"></i> Refund</button>
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Juan dela Cruz</td>
                    <td>Mark Poe</td>
                    <td> Package C</td>
                    <td>February 3, 2018</td>
                    <td>In-Progress</td>
                    <td>
                    <div class="btn-group w-100 btn-block" role="group">
                        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#updateAdminModal"><i class="fas fa-edit"></i> Update</button>
                        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#confirmRefund"><i class="fas fa-exclamation"></i> Refund</button>
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Kat Cruz</td>
                    <td>John Doe</td>
                    <td> Package A</td>
                    <td>February 5, 2018</td>
                    <td>Not Started</td>
                    <td>
                    <div class="btn-group w-100 btn-block" role="group">
                        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#updateAdminModal"><i class="fas fa-edit"></i> Update</button>
                        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#confirmRefund"><i class="fas fa-exclamation"></i> Refund</button>
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Kat Cruz</td>
                    <td>Lisa Zoe</td>
                    <td> Package B</td>
                    <td>February 8, 2018</td>
                    <td>Not Started</td>
                    <td>
                    <div class="btn-group w-100 btn-block" role="group">
                        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#updateAdminModal"><i class="fas fa-edit"></i> Update</button>
                        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#confirmRefund"><i class="fas fa-exclamation"></i> Refund</button>
                    </div>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
            <!-- Refund Modal -->
                <!-- Modal Reason -->
        <div class="modal fade" id="confirmRefund" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Delete Confirmation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <label for="comment">Reasons for refund:</label>
                      <textarea class="form-control" rows="5" id="comment"></textarea>
                    </div>
                      <div class="form-row">
                        <div class="form-group my-3 col-sm-12 d-flex justify-content-center">
                          <button type="submit" data-dismiss="modal"  data-toggle="modal" data-target="#confirmRefund2" class="mx-2 btn btn-danger">Submit</button>
						              <button type="submit"  data-dismiss="modal" class="mx-2 btn btn-primary">Cancel</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
          </div>



            <div class="modal fade" id="confirmRefund2" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Refund Confirmation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to refund the payment of INSERT NAME?
                      <div class="form-row">
                        <div class="form-group my-3 col-sm-12 d-flex justify-content-center">
                          <button type="submit" class="mx-2 btn btn-danger">Yes</button>
						  <button type="submit" class="mx-2 btn btn-primary" data-dismiss="modal">No</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
          </div>




          </main>


        </div>


      </div>
	  <!-- /#wrapper -->
      <!-- /#page-content-wrapper -->

<?php $this->view("includes/admin_footer.php"); ?>
