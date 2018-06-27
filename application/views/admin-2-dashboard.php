<?php $this->view("includes/admin_header.php"); 
      $this->view("includes/admin_nav.php");
      $this->view("includes/admin_sidebar.php");
	  
?>
        <!-- Page Content -->
        <div id="page-content-wrapper ">
          <div class="container-fluid bg-secondary">
            <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
            <main class="col-sm-9 offset-sm-2 col-md-10 offset-md-1 pt-3">
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
        
        
                <table class="table table-striped table-bordered table-hover" id="myTable" >
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Header</th>
                      <th>Header</th>
                      <th>Header</th>
                      <th>Header</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                     
                      <td>1</td>
                      <td>Lorem</td>
                      <td>ipsum</td>
                      <td>dolor</td>
                      <td>
                        <div class="btn-group w-100 btn-block" role="group">
                        <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#deleteAdminModal"><i class="fas fa-trash-alt"></i> Delete</button>
                        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#updateAdminModal"><i class="fas fa-edit"></i> Update</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                    
                      <td>2</td>
                      <td>amet</td>
                      <td>consectetur</td>
                      <td>adipiscing</td>
                      <td>
                        <div class="btn-group w-100 btn-block" role="group">
                        <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#deleteAdminModal"><i class="fas fa-trash-alt"></i> Delete</button>
                        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#updateAdminModal"><i class="fas fa-edit"></i> Update</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                    
                      <td>3</td>
                      <td>Integer</td>
                      <td>nec</td>
                      <td>odio</td>
                      <td>
                        <div class="btn-group w-100 btn-block" role="group">
                        <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#deleteAdminModal"><i class="fas fa-trash-alt"></i> Delete</button>
                        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#updateAdminModal"><i class="fas fa-edit"></i> Update</button>
                        </div>
                      </td>
                    </tr>
                


                  </tbody>
                </table>
            
                <div class="d-flex justify-content-center clearfix">
                  <button class="btn btn-outline-primary mx-1 btn-lg" data-toggle="modal" data-target="#addAdminModal"><i class="fas fa-plus"></i> Add</button>

                </div>
				
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
                        <button class="close" data-dismiss="modal">×</button>
                      </div>
                      <div class="modal-body">
					  
						<div class="dropdown d-flex justify-content-center">
								<select style="width:80%">
								  <option placeholder="1">Select an Administrator</option>
								  <option placeholder="1" selected="">John Doe</option>
								  <option placeholder="2">Admin 1</option>
								  <option placeholder="3">Admin 2</option>
								  <option placeholder="4">Admin 3</option>
								</select>
						</div>
					
					<hr>
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
				

				<div class="modal" id="deleteAdminModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Delete Confirmation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
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
				
              </main></div>
            
          </div>
        </div>
        <!-- /#page-content-wrapper -->
<?php $this->view("includes/admin_footer.php"); ?>

 