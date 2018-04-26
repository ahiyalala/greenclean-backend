        <!-- Page Content -->
        <div id="page-content-wrapper ">
          <div class="container-fluid bg-secondary">
            <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
            <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
              <h1 class="text-center pb-4 display-4"> Dashboard</h1>

              <section class="row text-center placeholders pb-3">
                <div class="col-6 col-sm-3 placeholder">
                  <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle"
                    alt="Generic placeholder thumbnail">
                  <h4>Users</h4>
                  <div class="text-muted"><?php echo $customer ?></div>
                </div>
                <div class="col-6 col-sm-3 placeholder">
                  <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle"
                    alt="Generic placeholder thumbnail">
                  <h4>Employees</h4>
                  <span class="text-muted"><?php echo $housekeeper ?></span>
                </div>
              </section>
              <?php if($admin['is_super']): ?>
              <h2 class="pb-2">Administrators</h2>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <td> </td>
                      <th>No.</th>
                      <th>Header</th>
                      <th>Header</th>
                      <th>Header</th>
                      <th>Header</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <p class="float-right">
                          <input class="form-check-input" name="a1" type="radio" value="option1">
                        </p>
                      </td>
                      <td>1,001</td>
                      <td>Lorem</td>
                      <td>ipsum</td>
                      <td>dolor</td>
                      <td>sit</td>
                    </tr>
                    <tr>
                      <td>
                        <p class="float-right">
                          <input class="form-check-input" name="a1" type="radio" value="option2">
                        </p>
                      </td>
                      <td>1,002</td>
                      <td>amet</td>
                      <td>consectetur</td>
                      <td>adipiscing</td>
                      <td>elit</td>
                    </tr>
                    <tr>
                      <td>
                        <p class="float-right">
                          <input class="form-check-input" name="a1" type="radio" value="option3">
                        </p>
                      </td>
                      <td>1,003</td>
                      <td>Integer</td>
                      <td>nec</td>
                      <td>odio</td>
                      <td>Praesent</td>
                    </tr>
                    <tr>
                      <td>
                        <p class="float-right">
                          <input class="form-check-input" name="a1" type="radio" value="option4">
                        </p>
                      </td>
                      <td>1,003</td>
                      <td>libero</td>
                      <td>Sed</td>
                      <td>cursus</td>
                      <td>ante</td>
                    </tr>


                  </tbody>
                </table>
                
                <div class="d-flex justify-content-center clearfix">
                  <button class="btn btn-outline-primary mx-1 " data-toggle="modal" data-target="#myModal">Add</button>
                  <button class="btn btn-outline-success mx-1">Update</button>
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
                <?php endif ?>
                <!-- MODAL ADD-->
                <div class="modal" id="myModal">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Create an Administrator</h5>
                        <button class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group row">
                          <label for="example-text-input" class="col-2 col-form-label">Full Name:</label>
                          <div class="col-10">
                            <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                          </div>
                        </div>

                        <div class="form-group row">

                          <label for="example-search-input" class="col-2 col-form-label">Birthday:</label>
                          <div class="col-4">
                            <input class="form-control" type="date" value="How do I shoot web" id="example-search-input">
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
                        <!-- Closing div -->
                        <div class="form-group row">
                          <label for="example-search-input" class="col-2 col-form-label">Address:</label>
                          <div class="col-10">
                            <input class="form-control" type="text" value="How do I shoot web" id="example-search-input">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="example-email-input" class="col-2 col-form-label">E-mail Address:</label>
                          <div class="col-10">
                            <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="example-search-input" class="col-2 col-form-label">Username:</label>
                          <div class="col-10">
                            <input class="form-control" type="text" value="How do I shoot web" id="example-search-input">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="example-search-input" class="col-2 col-form-label">Password:</label>
                          <div class="col-10">
                            <input class="form-control" type="password" value="How do I shoot web" id="example-search-input">
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
                    </div>
                  </div>
                </div>


                
              </div>
            </main>
          </div>
        </div>
        <!-- /#page-content-wrapper -->