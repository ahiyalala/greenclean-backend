<?php $this->view("includes/admin_header.php");
      $this->view("includes/admin_nav.php");
      $this->view("includes/admin_sidebar.php");

?>
      <!-- Page Content -->
      <div id="page-content-wrapper ">
        <div class="container-fluid bg-secondary">

          <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
          <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <h1 class="text-center display-4">Appointments</h1>
            <div class="dropdown-divider"></div>

            <h2 class="display-5 pt-5 pb-3">Completed Appointments</h2>

            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th>Client Name</th>
                    <th>Type of Service</th>
                    <th>Housekeeper Assigned</th>
                    <th>Price Paid</th>
					<th>Schedule</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>

            <ul class="pagination pt-2 d-flex justify-content-center mt-4">
              <li class="page-item">
                <a class="page-link text-muted" href="#">Previous</a>
              </li>
              <li class="page-item active">
                <a class="page-link text-inverse" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link text-inverse" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link text-inverse" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link text-inverse" href="#">4</a>
              </li>
              <li class="page-item">
                <a class="page-link text-inverse" href="#">5</a>
              </li>
              <li class="page-item">
                <a class="page-link text-muted" href="#">Next</a>
              </li>
            </ul>


          </main>


        </div>


      </div>
      <!-- /#page-content-wrapper -->


<?php $this->view("includes/admin_footer.php"); ?>
