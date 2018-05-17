 <!-- Page Content -->
 <div id="page-content-wrapper ">
        <div class="container-fluid bg-secondary">

          <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
          <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <h1 class="text-center display-4">Employee Management</h1>
            <div class="dropdown-divider"></div>
            <h2 class="display-5 pt-5 pb-3">Employees</h2>

            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Date Registered</th>
                    <th>Customer's Rating</th>
                  </tr>
                </thead>
                <tbody>
                <!-- stuffff -->
                <?php foreach($housekeepers as $housekeeper): ?>
                  <tr>
                    <td>
                      <a href="<?php echo base_url("/admin/employee/".$housekeeper->housekeeper_id) ?>"> <?php echo $housekeeper->last_name.", ".$housekeeper->first_name ?> </a>
                    </td>
                    <td><?php echo $housekeeper->gender ?></td>
                    <td>Date registered not yet available</td>
                    <th> Rating not yet available </th>
                  </tr>
                <?php endforeach; ?>
                  <!-- stuffff -->
                </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-center clearfix pt-5">
              <button class="btn btn-outline-primary mx-1" data-toggle="modal" data-target="#myModal">Add New Employee</button>
            </div>


            <h2 class="display-5 pt-5 pb-3">Employees Schedule</h2>

            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <td> </td>
                    <th>No.</th>
                    <th>Employee Name</th>
                    <th>Client Name</th>
                    <th>Date of Service</th>
                    <th>Time of Service</th>
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
                    <td>John Doe</td>
                    <td>Kat Cruz</td>
                    <td>February 1, 2018</td>
                    <td>8:00am - 12:00pm</td>
                  </tr>
                  <tr>
                    <td>
                      <p class="float-right">
                        <input class="form-check-input" name="a1" type="radio" placeholder="option1">
                      </p>
                    </td>
                    <td>2</td>
                    <td>John Doe</td>
                    <td>Pat Santos</td>
                    <td>February 1, 2018</td>
                    <td>1:00pm - 4:00pm</td>
                  </tr>
                  <tr>
                    <td>
                      <p class="float-right">
                        <input class="form-check-input" name="a1" type="radio" placeholder="option1">
                      </p>
                    </td>
                    <td>3</td>
                    <td>Mark Poe</td>
                    <td>Juan dela Cruz</td>
                    <td>February 3, 2018</td>
                    <td>10:00am - 2:00pm</td>
                  </tr>
                  <tr>
                    <td>
                      <p class="float-right">
                        <input class="form-check-input" name="a1" type="radio" placeholder="option1">
                      </p>
                    </td>
                    <td>4</td>
                    <td>John Doe</td>
                    <td>Kat Cruz</td>
                    <td>February 5, 2018</td>
                    <td>8:00am - 12:00pm</td>
                  </tr>
                  <tr>
                    <td>
                      <p class="float-right">
                        <input class="form-check-input" name="a1" type="radio" placeholder="option1">
                      </p>
                    </td>
                    <td>5</td>
                    <td>Lisa Zoe</td>
                    <td>Kat Cruz</td>
                    <td>February 8, 2018</td>
                    <td>4:00pm - 8:00pm</td>
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
      <!-- /#page-content-wrapper -->