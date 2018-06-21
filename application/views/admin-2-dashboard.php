<?php $this->view("includes/admin_header.php"); 
      $this->view("includes/admin_nav.php");
      $this->view("includes/admin_sidebar.php");
	  
?>
        <!-- Page Content -->
        <div id="page-content-wrapper ">
          <div class="container-fluid bg-secondary">
            <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
            <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
              <h1 class="text-center pb-4 display-4">Dashboard</h1>
             
			  <div class="alert alert-success alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</button>
					Administrator <strong>created</strong>!
			  </div>
			  <div class="alert alert-success alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</button>
					Administrator <strong>updated</strong>!
			  </div>
			  <div class="alert alert-success alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</button>
					Administrator <strong>deleted</strong>!
			  </div>
			  <?php //if($admin['is_super']): ?>
			  <h2 class="pb-2">Administrators</h2>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <!--<td> </td>-->
                      <th>No.</th>
                      <th>Header</th>
                      <th>Header</th>
                      <th>Header</th>
                      <th>Header</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <!--<td>
                        <p class="float-right">
                          <input class="form-check-input" name="a1" type="radio" placeholder="option1">
                        </p>
                      </td>-->
                      <td>1</td>
                      <td>Lorem</td>
                      <td>ipsum</td>
                      <td>dolor</td>
                      <td>sit</td>
                    </tr>
                    <tr>
                      <!--<td>
                        <p class="float-right">
                          <input class="form-check-input" name="a1" type="radio" placeholder="option2">
                        </p>
                      </td>-->
                      <td>2</td>
                      <td>amet</td>
                      <td>consectetur</td>
                      <td>adipiscing</td>
                      <td>elit</td>
                    </tr>
                    <tr>
                      <!--<td>
                        <p class="float-right">
                          <input class="form-check-input" name="a1" type="radio" placeholder="option3">
                        </p>
                      </td>-->
                      <td>3</td>
                      <td>Integer</td>
                      <td>nec</td>
                      <td>odio</td>
                      <td>Praesent</td>
                    </tr>
                    <tr>
                      <!--<td>
                        <p class="float-right">
                          <input class="form-check-input" name="a1" type="radio" placeholder="option4">
                        </p>
                      </td>-->
                      <td>4</td>
                      <td>libero</td>
                      <td>Sed</td>
                      <td>cursus</td>
                      <td>ante</td>
                    </tr>


                  </tbody>
                </table>
                <div class="d-flex justify-content-center clearfix">
                  <button class="btn btn-outline-primary mx-1" data-toggle="modal" data-target="#addAdminModal">Add</button>
                  <button class="btn btn-outline-success mx-1" data-toggle="modal" data-target="#updateAdminModal">Update</button>
                  <button class="btn btn-outline-danger mx-1" data-toggle="modal" data-target="#deleteAdminModal">Delete</button>
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
				<?php //endif ?>
                <!-- MODAL ADD-->
                <div class="modal" id="addAdminModal">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Create an Administrator</h5>
                        <button class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">First Name:</label>
                      <div class="col-10 mb-2">
                        <input class="form-control" type="text" name="first_name" placeholder="" id="example-text-input">
                      </div>
                      <label for="example-text-input" class="col-2 col-form-label">Middle Name:</label>
                      <div class="col-10 mb-2">
                        <input class="form-control" type="text" name="middle_name" placeholder="" id="example-text-input">
                      </div>
                      <label for="example-text-input" class="col-2 col-form-label">Last Name:</label>
                      <div class="col-10">
                        <input class="form-control" type="text" name="last_name" placeholder="" id="example-text-input">
                      </div>
                        </div>

                        <div class="form-group row">

                          <label for="example-search-input" class="col-2 col-form-label">Birthday:</label>
                          <div class="col-4">
                            <input class="form-control" name="birthday" type="date" id="example-search-input">
                          </div>


                          <label for="example-text-input" class="col-1 col-form-label">Gender:</label>
                          <div class="col-5 mt-2">
                            <label class="custom-control custom-radio">
                              <input id="radio1" name="gender" type="radio" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">Male</span>
                            </label>
                            <label class="custom-control custom-radio">
                              <input id="radio2" name="gender" type="radio" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">Female</span>
                            </label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="example-search-input" class="col-2 col-form-label">Address:</label>
                          <div class="col-10">
                            <input class="form-control" name="address" type="text" id="example-search-input">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="example-email-input" class="col-2 col-form-label">E-mail Address:</label>
                          <div class="col-10">
                            <input class="form-control" name="email" type="email" id="example-email-input">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="example-search-input" class="col-2 col-form-label">Username:</label>
                          <div class="col-10">
                            <input class="form-control" name="username" type="text" id="example-search-input">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="example-search-input" class="col-2 col-form-label">Password:</label>
                          <div class="col-10">
                            <input class="form-control" name="password" type="password" id="example-search-input">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="example-search-input" class="col-2 col-form-label">Upload Photo:</label>
                          <div class="col-10">
                            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                          </div>
                        </div>

                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-outline-success">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
				<!-- /MODAL ADD END -->
				
				<!-- MODAL UPDATE-->
                <div class="modal" id="updateAdminModal">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Update an Administrator</h5>
                        <button class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
					  
						<div class="dropdown d-flex justify-content-center">
								<select style="width:80%">
								  <option placeholder="1">Select an Administrator</option>
								  <option placeholder="1" selected>John Doe</option>
								  <option placeholder="2">Admin 1</option>
								  <option placeholder="3">Admin 2</option>
								  <option placeholder="4">Admin 3</option>
								</select>
						</div>
					
					<hr/>
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
                            <input class="form-control" name="birthday" type="date" id="example-search-input">
                          </div>


                          <label for="example-text-input" class="col-1 col-form-label">Gender:</label>
                          <div class="col-5 mt-2">
                            <label class="custom-control custom-radio">
                              <input id="radio1" name="gender" type="radio" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">Male</span>
                            </label>
                            <label class="custom-control custom-radio">
                              <input id="radio2" name="gender" type="radio" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">Female</span>
                            </label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="example-search-input" class="col-2 col-form-label">Address:</label>
                          <div class="col-10">
                            <input class="form-control" name="address" type="text" placeholder="Sample Address" id="example-search-input">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="example-email-input" class="col-2 col-form-label">E-mail Address:</label>
                          <div class="col-10">
                            <input class="form-control" name="email" type="email" placeholder="sample@sample.com" id="example-email-input">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="example-search-input" class="col-2 col-form-label">Username:</label>
                          <div class="col-10">
                            <input class="form-control" name="username" type="text" placeholder="sample_user" id="example-search-input">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="example-search-input" class="col-2 col-form-label">Password:</label>
                          <div class="col-10">
                            <input class="form-control" name="password" type="password" placeholder="12345" id="example-search-input">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="example-search-input" class="col-2 col-form-label">Upload Photo:</label>
                          <div class="col-10">
                            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                          </div>
                        </div>

                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-outline-success">Update</button>
                      </div>
                    </div>
                  </div>
                </div>
				<!-- /MODAL UPDATE END -->
				
				<!-- MODAL DELETE-->
                <div class="modal" id="deleteAdminModal">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Delete an Administrator</h5>
                        <button class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
					  
						<div class="d-flex justify-content-center">
								<select style="width:80%">
								  <option placeholder="1">Select an Administrator</option>
								  <option placeholder="1" selected>John Doe</option>
								  <option placeholder="2">Admin 1</option>
								  <option placeholder="3">Admin 2</option>
								  <option placeholder="4">Admin 3</option>
								</select>
						</div>
                      <div class="my-3 d-flex justify-content-center">
                        <button class="btn btn-danger" data-toggle="modal" data-target="#confirmAdmin">Delete</button>
                      </div>
                    </div>
                  </div>
                </div>
				</div>
				<div class="modal" id="confirmAdmin" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Delete Confirmation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to delete this administrator?	
                      <div class="form-row">
                        <div class="form-group my-3 col-sm-12 d-flex justify-content-center">
                          <button type="submit" class="mx-2 btn btn-danger">Yes</button>
						  <button type="submit" class="mx-2 btn btn-primary">No</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
          </div>
				<!-- /MODAL DELETE END -->
				
              </div>
            </main>
          </div>
        </div>
        <!-- /#page-content-wrapper -->
		
<?php $this->view("includes/admin_footer.php"); ?>

 