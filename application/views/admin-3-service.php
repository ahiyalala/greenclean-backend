<?php $this->view("includes/admin_header.php");
      $this->view("includes/admin_nav.php");
      $this->view("includes/admin_sidebar.php");

?>
      <!-- Page Content -->
      <div id="page-content-wrapper ">
        <div class="container-fluid bg-secondary">

          <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
          <main class="col-sm-9 offset-sm-2 col-md-10 offset-md-1 pt-3">
            <h1 class="text-center display-4">Administrator Management</h1>
            <div class="dropdown-divider"></div>
			<div class="alert alert-success alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</button>
					Service <strong>created</strong>!
			  </div>
			  <div class="alert alert-success alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</button>
					Service <strong>updated</strong>!
			  </div>
			  <div class="alert alert-success alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</button>
					Service <strong>deleted</strong>!
			  </div>
            <h2 class="display-5 pt-5 pb-3">Available Packages</h2>
		
            <!-- ACCORDION -->
            <?php foreach($services as $key=>$service): ?>
            <div id="accordion" role="tablist">
              <div class="card">
                <div class="card-header" role="tab" id="heading">
                  <h5 class="mb-0">
                    <a href="#collapse_<?php echo $key?>" data-parent="#accordion" data-toggle="collapse">
                      <?php echo $service->service_type_key; ?>
                    </a>
                  </h5>
                </div>
                <div id="collapse_<?php echo $key?>" class="collapse">
                  <div class="card-block">
                    <br/> Time Duration: <?php echo $service->service_duration; ?> hours
                    <br/> Price: <?php echo $service->service_price; ?>
                    <br/> <?php echo $service->service_description; ?>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>

            </div>
			<!-- /ACCORDION -->
            <div class="d-flex justify-content-center clearfix pt-5">
              <button class="btn btn-outline-primary mx-1" data-toggle="modal" data-target="#addService">Add Service Package</button>
              <button class="btn btn-outline-success mx-1" data-toggle="modal" data-target="#updateService">Update</button>
              <button class="btn btn-outline-danger mx-1" data-toggle="modal" data-target="#deleteService">Delete</button>
            </div>
          </main>
		  
		
		</div>
		<!-- MODAL ADD SERVICE-->
		<div class="modal" id="addService" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add New Service</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <?php echo form_open('services/add'); ?>
                      <div class="form-row">
                        <div class="form-group col-sm-12">
                          <input type="text" class="form-control" id="service_type" name="service_type" required placeholder="Service name" />
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                          <input type="number" class="form-control" id="service_price" name="service_price" required placeholder="Price" />
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                          <input type="number" class="form-control" id="service_duration" name="service_duration" required placeholder="Duration" />
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-sm-12">
                          <textarea class="form-control" id="service_description" name="service_description" placeholder="Description" required ></textarea>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-sm-12 d-flex justify-content-center">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>
          </div>
		  <!-- /MODAL ADD SERVICE-->
		  
		  <!-- MODAL UPDATE SERVICE-->
		<div class="modal" id="updateService" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update Service</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="dropdown d-flex justify-content-center">
								<select style="width:80%">
								  <option placeholder="1">Select Service</option>
								  <option placeholder="1" selected>Service Sample</option>
								  <option placeholder="2">Service 1</option>
								  <option placeholder="3">Service 2</option>
								  <option placeholder="4">Service 3</option>
								</select>
						</div>
						<hr/>
                      <div class="form-row">
                        <div class="form-group col-sm-12">
                          <input type="text" class="form-control" id="service_type" name="service_type" required placeholder="Service Sample" />
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                          <input type="number" class="form-control" id="service_price" name="service_price" required placeholder="100000"/>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                          <input type="number" class="form-control" id="service_duration" name="service_duration" required placeholder="100000"/>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-sm-12">
                          <textarea class="form-control" id="service_description" name="service_description" placeholder="hahahuhu" required ></textarea>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-sm-12 d-flex justify-content-center">
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
          </div>
		  <!-- /MODAL UPDATE SERVICE-->
		  
		  <!-- MODAL DELETE SERVICE-->
		<div class="modal" id="deleteService" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Delete Service</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="dropdown d-flex justify-content-center">
								<select style="width:80%">
								  <option placeholder="1">Select Service</option>
								  <option placeholder="1" selected>Service Sample</option>
								  <option placeholder="2">Service 1</option>
								  <option placeholder="3">Service 2</option>
								  <option placeholder="4">Service 3</option>
								</select>
						</div>
						
                      <div class="form-row">
                        <div class="form-group my-3 col-sm-12 d-flex justify-content-center">
                          <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#confirmService">Delete</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
          </div>
		  
		  <div class="modal" id="confirmService" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Delete Confirmation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to delete this service?	
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
		  <!-- /MODAL DELETE SERVICE-->
	
	</div>
      <!-- /#page-content-wrapper -->

<?php $this->view("includes/admin_footer.php"); ?>
