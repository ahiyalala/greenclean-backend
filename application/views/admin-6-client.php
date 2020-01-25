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
            <div class="profit-breakdown">
              <h3>For this month:</h3>
              <div class="profit-summary">
                <div class="profit-block">
                  <span class="profit-title">Finished</span>
                  <span class="profit-value">
                    <?php echo ($accumulated_profit)?$accumulated_profit->profit:0; ?>
                  </span>
                </div>
                  <div class="profit-block">
                    <span class="profit-title">Pending</span>
                    <span class="profit-value">
                      <?php echo ($pending_profit)?$pending_profit->profit:0; ?>
                    </span>
                  </div>
                    <div class="profit-block">
                      <span class="profit-title">Expected</span>
                      <span class="profit-value">
                        <?php echo ($expected_profit)?$expected_profit->profit:0; ?>
                      </span>
                    </div>
              </div>
            </div>
            <div class="table-responsive-md">
              <table class="table table-striped table-bordered table-hover" id="appointments-table">
                <thead>
                  <tr>
                    <th>Client Name</th>
                    <th> Service Type </td>
                    <th>Date of Service</th>
                    <th>Total Price</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($schedules as $schedule): ?>
                  <tr>

                    <td><?php echo $schedule->first_name.' '.$schedule->last_name; ?></td>
                    <td><?php echo $schedule->service_type_key; ?></td>
                    <td><?php echo date('M d Y',strtotime($schedule->date)).', '.date('h:iA', strtotime($schedule->start_time)); ?></td>
                    <td><?php echo $schedule->total_price; ?></td>
                    <td><?php echo ($schedule->is_finished)? "Finished":"Pending" ?></td>
                    <td>
                    <?php /*
                    <div class="btn-group w-100 btn-block" role="group">
                        <?php if(!$schedule->is_finished): ?>
                        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#assignEmployee"><i class="fas fa-edit"></i> Re-assign</button>
                        <?php else: ?>
                        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#confirmRefund"><i class="fas fa-exclamation"></i> Refund</button>
                        <?php endif; ?>
                    </div>
                    */
                    ?>
                    </td>

                  </tr>
                <?php endforeach; ?>
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
