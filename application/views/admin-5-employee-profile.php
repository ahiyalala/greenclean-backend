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
                              <main class="col-sm-9 offset-sm-2 col-md-10 offset-md-1 pt-3">
                                    <h1 class="text-center display-4"><?php echo $housekeepers->first_name." ".$housekeepers->last_name; ?>'s Profile</h1>
                                    <div class="dropdown-divider"></div>
                                    <!-- START OF 1ST CARD -->

                                    <div class="card  w-75 container">
                                          <div class="card-header bg-success h3">Personal Infomation</div>
                                          <!-- START OF 1ST CARD BODY -->
                                          <div class="card-block bg-faded">
                                                <div class="d-flex justify-content-center">
                                                      <img src="front/img/baby.jpeg" class="img-fluid rounded-circle border-dark" alt="APPLE" width="250" height="250">
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
                                                                  <th scope="row">Work Schedule: </th>
                                                                  <td>
                                                                    <?php
                                                                        $schedule = json_decode($housekeepers->schedule_dates);
                                                                        $dates = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
                                                                        foreach($dates as $date){
                                                                          $sub = substr($date,0,1);
                                                                          if(in_array($date,$schedule)){
                                                                            echo "<strong>$sub</strong>";
                                                                          }
                                                                          else{
                                                                            echo "<span>$sub</span>";
                                                                          }
                                                                          echo " ";
                                                                        }
                                                                    ?>
                                                                  </td>
                                                            </tr>
                                                      </tbody>
                                                </table>

                                          </div>
                                          <!-- END OF 1ST CARD BODY -->
                                          <div class="card-footer">
                                                <div class="d-flex justify-content-center clearfix pt-2">
                                                      <button class="btn btn-outline-success mx-1" data-toggle="modal" data-target="#updateEmployee">Update</button>
                                                      <button class="btn btn-outline-danger mx-1" data-toggle="modal" data-target="#deleteEmployee">Delete</button>
                                                </div>
                                          </div>

                                    </div>
                                    <!-- END OF 1ST CARD -->

                                    <div class="card mt-3 w-75 container">
                                          <div class="card-header bg-success h3">Pending Appointments</div>
                                          <!-- START OF 2ND CARD BODY -->
                                          <div class="card-block bg-faded">
                                                <table class="table bg-faded">
                                                      <thead>
                                                            <tr>
                                                                  <th scope="col">Client Name</th>
                                                                  <th scope="col">Date</th>
                                                                  <th scope="col">Time</th>
                                                            </tr>
                                                      </thead>
                                                      <tbody>
                                                          <?php foreach($appointments as $appointment): ?>
                                                            <tr>
                                                                  <td><?php echo $appointment->c_first_name.' '.$appointment->c_last_name; ?></td>
                                                                  <td><?php echo date('M d Y', strtotime($appointment->date)); ?></td>
                                                                  <td><?php echo $appointment->start_time.' ~ '.$appointment->end_time; ?></td>
                                                            </tr>
                                                          <?php endforeach; ?>
                                                      </tbody>
                                                </table>
                                          </div>
                                    </div>





                                    <div class="card mt-3 w-75 container">
                                          <div class="card-header bg-success h3">Work Schedule</div>
                                          <!-- START OF 3rd CARD BODY -->
                                          <div class="card-block bg-faded">
                                            <div id="calendar"></div>
                                           </div>
                                    </div>

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
              <label for="example-search-input" class="col-2 col-form-label">Work Schedule</label>
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


          <!--
            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label">Upload Photo:</label>
              <div class="col-10">
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
              </div>
            </div>
-->
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-outline-success">Update</button>
          </div>

        </div>
      </div>
    </div>
<!-- /MODAL UPDATE EMPLOYEE-->
<!-- MODAL DELETE EMPLOYEE-->
    <div class="modal fade" id="deleteEmployee">
      <div class="modal-dialog modal-xs">
        <div class="modal-content ">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Delete an Employee</h5>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
		  Are you sure you want to delete this employee?
		  </div>
          <div class="modal-footer d-flex justify-content-center">
            <a class="btn btn-danger" href="<?php echo base_url('/employee/delete/'.$housekeepers->housekeeper_id) ?>">Delete</a>
			<button class="btn btn-primary">Cancel</button>
          </div>

        </div>
      </div>
</div>
		  <!-- /MODAL DELETE EMPLOYEE-->
                              </main>
                              <!-- END OF MAIN -->

                        </div>
                        <!-- End Full Section -->

                  <!-- END Page Content  -->

<?php $this->view("includes/admin_footer.php"); ?>
