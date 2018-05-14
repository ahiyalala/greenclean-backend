<?php $this->view("includes/admin_header.php"); 
      $this->view("includes/admin_nav.php");
      $this->view("includes/admin_sidebar.php");
	  
?>

      <!-- Page Content -->
      <div id="page-content-wrapper ">
        <div class="container-fluid bg-secondary">

          <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
          <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <h1 class="text-center display-4">User Management</h1>
            <div class="dropdown-divider"></div>
            <h2 class="display-5 pt-5 pb-3">Clients</h2>

            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <td> </td>
                    <th>No.</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Date Registered</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <p class="float-right">
                        <input class="form-check-input" name="a1" type="radio" placeholder="option1">
                      </p>
                    </td>
                    <td>1</td>
                    <td>
                      <a href="gc_adm-6-view client.html">Kat Cruz</a>
                    </td>
                    <td>F</td>
                    <td>January 4, 2018</td>
                  </tr>
                  <tr>
                    <td>
                      <p class="float-right">
                        <input class="form-check-input" name="a1" type="radio" placeholder="option1">
                      </p>
                    </td>
                    <td>2</td>
                    <td>
                      <a href="#">Pat Santos</a>
                    </td>
                    <td>F</td>
                    <td>January 9, 2018</td>
                  </tr>
                  <tr>
                    <td>
                      <p class="float-right">
                        <input class="form-check-input" name="a1" type="radio" placeholder="option1">
                      </p>
                    </td>
                    <td>3</td>
                    <td>
                      <a href="#">Juan dela Cruz</a>
                    </td>
                    <td>M</td>
                    <td>January 11, 2018</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-center clearfix pt-5">
              <button class="btn btn-outline-primary mx-1">Edit Client</button>

              <button class="btn btn-outline-danger mx-1">Delete</button>
            </div>


            <h2 class="display-5 pt-5 pb-3">Client Status</h2>

            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Client Name</th>
                    <th>Employee Name</th>
                    <th>Date of Service</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Kat Cruz</td>
                    <td>John Doe</td>
                    <td>February 1, 2018</td>
                    <td>Finished</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Pat Santos</td>
                    <td>John Doe</td>
                    <td>February 1, 2018</td>
                    <td>Finished</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Juan dela Cruz</td>
                    <td>Mark Poe</td>
                    <td>February 3, 2018</td>
                    <td>In-Progress</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Kat Cruz</td>
                    <td>John Doe</td>
                    <td>February 5, 2018</td>
                    <td>Not Started</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Kat Cruz</td>
                    <td>Lisa Zoe</td>
                    <td>February 8, 2018</td>
                    <td>Not Started</td>
                  </tr>

                </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-center clearfix pt-5">
              <button class="btn btn-outline-primary mx-1">Re-assign Employee</button>
              <button class="btn btn-outline-danger mx-1">Delete</button>
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
	  <!-- /#wrapper -->
      <!-- /#page-content-wrapper -->
      
<?php $this->view("includes/admin_footer.php"); ?>
