<?php $this->view("includes/admin_header.php");
      $this->view("includes/admin_nav.php");
      $this->view("includes/admin_sidebar.php");

?>
      <!-- Page Content -->
      <div id="page-content-wrapper ">
        <div class="container-fluid bg-secondary">

          <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
          <main class="col-sm-9 offset-sm-2 col-md-10 offset-md-1 pt-3">
            <h1 class="text-center display-4">Employee Management</h1>
            <div class="dropdown-divider"></div>
		<!--	<div class="alert alert-success alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</button>
					Employee <strong>created</strong>!
			  </div>
			  <div class="alert alert-success alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</button>
					Employee <strong>updated</strong>!
			  </div>
			  <div class="alert alert-success alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</button>
					Employee <strong>deleted</strong>!
			  </div> -->
            <h2 class="display-5 pt-5 pb-3">Employees <?php
            $message = $this->session->flashdata('message');
            if($message != null){
              echo $message;
            }
            ?></h2>

            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover table-sm" id="myTable">
                <thead>
                  <tr>

                    <th>No.</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                    <th>Rating</th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                  <!-- stuffff -->
                <?php foreach($housekeepers as $housekeeper): ?>
                  <tr>

                    <td><?php echo $housekeeper->housekeeper_id ?></td>
                    <td>
                      <a href="<?php echo base_url("/admin/employee/".$housekeeper->housekeeper_id) ?>"> <?php echo $housekeeper->last_name.", ".$housekeeper->first_name; ?> </a>
                    </td>
                    <td><?php echo $housekeeper->gender ?></td>
                    <td><?php echo $housekeeper->contact_number ?></td>
                    <th><?php echo ($housekeeper->rating > 0)? $housekeeper->rating:"Rating not yet available"; ?> </th>
                    <th>
                    <div class="btn-group w-100 btn-block" role="group">
                        <button type="button" class="btn btn-danger employee-delete" data-employee-id="<?php echo $housekeeper->housekeeper_id; ?>" data-toggle="modal" data-target="#confirmEmployee"><i class="fas fa-trash-alt"></i> Delete</button>
                    </div>
                    </th>
                  </tr>
                <?php endforeach; ?>
                  <!-- stuffff -->
                </tbody>
              </table>
            </div>

            <hr class="py-2">
            <div class="d-flex justify-content-center clearfix pt-3">
              <button class="btn btn-outline-primary mx-1 btn-lg" data-toggle="modal" data-target="#addEmployee"> <i class="fas fa-plus"></i> Add New Employee</button>
            </div>


            <h2 class="display-5 pt-5 pb-3">Employees Schedule</h2>

            <div class="table-responsive">
              <table class="table table-striped" id="myTable2">
                <thead>
                  <tr>
                    <th>Employee Name</th>
                    <th>Client Name</th>
                    <th>Date of Service</th>
                    <th>Time of Service</th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($housekeeper_schedules as $housekeeper_schedule): ?>
                  <tr>
                    <td><?php echo $housekeeper_schedule->h_first_name." ".$housekeeper_schedule->h_last_name ?></td>
                    <td><?php echo $housekeeper_schedule->c_first_name." ".$housekeeper_schedule->c_last_name ?></td>
                    <td><?php echo $housekeeper_schedule->date ?></td>
                    <td><?php echo $housekeeper_schedule->start_time." - ".$housekeeper_schedule->end_time ?></td>
                    <td> <button type="button" class="btn btn-info " data-toggle="modal" data-target="#assignEmployee"><i class="fas fa-edit"></i> Re-assign Employee</button></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>




          </main>


        </div>
	<!-- /#wrapper -->
    <!-- MODAL ADD EMPLOYEE-->
    <div class="modal fade" id="addEmployee">
      <div class="modal-dialog modal-lg">
        <div class="modal-content ">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Create an Employee</h5>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
          <?php echo form_open_multipart('employee/add'); ?>
            <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">First Name:</label>
              <div class="col-10 mb-2">
                <input class="form-control" type="text" name="first_name" placeholder="John" id="example-text-input">
              </div>
              <label for="example-text-input" class="col-2 col-form-label">Middle Name:</label>
              <div class="col-10 mb-2">
                <input class="form-control" type="text" name="middle_name" placeholder="Vincent" id="example-text-input">
              </div>
              <label for="example-text-input" class="col-2 col-form-label">Last Name:</label>
              <div class="col-10">
                <input class="form-control" type="text" name="last_name" placeholder="Doe" id="example-text-input">
              </div>
            </div>

            <div class="form-group row">

              <label for="example-search-input" class="col-2 col-form-label">Birthday:</label>
              <div class="col-4">
                <input class="form-control" type="date" name="birth_date" placeholder="How do I shoot web" id="example-search-input">
              </div>


              <label for="example-text-input" class="col-1 col-form-label">Gender:</label>
              <div class="col-5 mt-2">
                <label class="custom-control custom-radio">
                  <input id="radio1" name="gender" type="radio" value="Male" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Male</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="gender" type="radio" value="Female" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Female</span>
                </label>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label">Contact number:</label>
              <div class="col-10">
                <input class="form-control" type="tel" name="contact_number" placeholder="9361234567" id="example-search-input">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-email-input" class="col-2 col-form-label">E-mail Address:</label>
              <div class="col-10">
                <input class="form-control" type="email" name="email" placeholder="bootstrap@example.com" id="example-email-input">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label">Days off</label>
              <div class="col-10">
                <div class="row">
                  <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Monday" name="work_schedule[]" placeholder="" id="date_1">
                      <label class="form-check-label" for="date_1">
                        Monday
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Tuesday"  name="work_schedule[]" placeholder="" id="date_2">
                      <label class="form-check-label" for="date_2">
                        Tuesday
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Wednesday"  name="work_schedule[]" placeholder="" id="date_3">
                      <label class="form-check-label" for="date_3">
                        Wednesday
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Thursday"  name="work_schedule[]" placeholder="" id="date_4">
                      <label class="form-check-label" for="date_4">
                        Thursday
                      </label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Friday"  name="work_schedule[]" placeholder="" id="date_5">
                      <label class="form-check-label" for="date_5">
                        Friday
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Saturday"  value="" name="work_schedule[]" placeholder="" id="date_6">
                      <label class="form-check-label" for="date_6">
                        Saturday
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Sunday" name="work_schedule[]" placeholder="" id="date_7">
                      <label class="form-check-label" for="date_7">
                        Sunday
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label">Upload Photo:</label>
              <div class="col-10">
                <input type="file" name="image" class="form-control-file">
              </div>
            </div>

          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-outline-success">Submit</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
<!-- /MODAL ADD EMPLOYEE-->
<!-- MODAL UPDATE EMPLOYEE-->
<div class="modal fade" id="updateEmployee">
      <div class="modal-dialog modal-lg">
        <div class="modal-content ">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Update an Employee</h5>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">

            <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">First Name:</label>
              <div class="col-10 mb-2">
                <input class="form-control" type="text" name="first_name" placeholder="John" id="example-text-input">
              </div>
              <label for="example-text-input" class="col-2 col-form-label">Middle Name:</label>
              <div class="col-10 mb-2">
                <input class="form-control" type="text" name="middle_name" placeholder="Vincent" id="example-text-input">
              </div>
              <label for="example-text-input" class="col-2 col-form-label">Last Name:</label>
              <div class="col-10">
                <input class="form-control" type="text" name="last_name" placeholder="Doe" id="example-text-input">
              </div>
            </div>

            <div class="form-group row">

              <label for="example-search-input" class="col-2 col-form-label">Birthday:</label>
              <div class="col-4">
                <input class="form-control" type="date" name="birth_date" placeholder="How do I shoot web" id="example-search-input">
              </div>


              <label for="example-text-input" class="col-1 col-form-label">Gender:</label>
              <div class="col-5 mt-2">
                <label class="custom-control custom-radio">
                  <input id="radio1" name="gender" type="radio" value="Male" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Male</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="gender" type="radio" value="Female" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Female</span>
                </label>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label">Contact number:</label>
              <div class="col-10">
                <input class="form-control" type="tel" name="contact_number" placeholder="9361234567" id="example-search-input">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-email-input" class="col-2 col-form-label">E-mail Address:</label>
              <div class="col-10">
                <input class="form-control" type="email" name="email" placeholder="bootstrap@example.com" id="example-email-input">
              </div>
            </div>

            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label">Days off</label>
              <div class="col-10">
                <div class="row">
                  <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Monday" name="work_schedule[]" placeholder="" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        Monday
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Tuesday"  name="work_schedule[]" placeholder="" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        Tuesday
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Wednesday"  name="work_schedule[]" placeholder="" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        Wednesday
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Thursday"  name="work_schedule[]" placeholder="" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        Thursday
                      </label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Friday"  name="work_schedule[]" placeholder="" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        Friday
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Saturday"  value="" name="work_schedule[]" placeholder="" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        Saturday
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Sunday" name="work_schedule[]" placeholder="" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        Sunday
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label">Upload Photo:</label>
              <div class="col-10">
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
              </div>
            </div>

          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-outline-success">Update</button>
          </div>

        </div>
      </div>
    </div>
<!-- /MODAL UPDATE EMPLOYEE-->
<!-- MODAL DELETE END -->
<div class="modal fade" id="confirmEmployee" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Delete Confirmation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to delete this employee?
                      <div class="form-row">
                        <div class="form-group my-3 col-sm-12 d-flex justify-content-center">
                          <a id="employee-delete" class="mx-2 btn btn-danger">Yes</a>
						  <button type="button" data-dismiss="modal" aria-label="Close" class="mx-2 btn btn-primary">No</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
          </div>
				<!-- /MODAL DELETE END -->
<!-- MODAL REASSIGN EMPLOYEE-->
    <div class="modal fade" id="assignEmployee">
      <div class="modal-dialog modal-xs">
        <div class="modal-content ">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Reassign an Employee</h5>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
      			<div class="dropdown d-flex justify-content-center mt-2 mb-3">
      				<select style="width:80%">
      					<option placeholder="1">Re-assign an Employee</option>
      					<option placeholder="1" selected>Sample Employee</option>
      					<option placeholder="2">Employee 1</option>
      					<option placeholder="3">Employee 2</option>
      					<option placeholder="4">Employee 3</option>
      				</select>
      			</div>
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-outline-success">Re-assign</button>
          </div>

        </div>
      </div>
    </div>
<!-- /MODAL REASSIGN EMPLOYEE-->



      </div>
      <!-- /#page-content-wrapper -->


<?php $this->view("includes/admin_footer.php"); ?>
