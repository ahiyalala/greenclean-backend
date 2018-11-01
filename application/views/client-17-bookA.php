<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>

<div class="container white">
    <br>
    <div class="jumbotron mb-0"></div>
</div>
    <div class="container pure-white">
        <div class="container" style="padding: 8px;"></div>
    <div class="container grey-bg">
    <br>
        <div class="row">
            <div class="col">
                <h1 class="customFont-1 text-left">My Dashboard</h1>
            </div>
            <div class="col-4 text-right"><button class="btn btn-outline-success">Schedule an Appointment <i class="fas fa-plus"></i></button></div>
        </div>

        <!-- Needs Card -->
        <div class="mt-1">
            <p class="customFont-2 mb-0">Needs Feedback</p>
            <hr class="mt-0">
            <div class="row">
                <div class="col-1">
                    <div class="d-flex justify-content-start"><select class="form-control form-control-sm">
                            <option>10</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end"><label class="form-text-label">Search <input type="text" id=""></label></div>
                </div>
            </div>
        </div>
        <div class="my-2 pure-white" data-toggle="modal" data-target="#myAppointmentCompleted">
            <div class="row  card-service align-self-center">

                   <span class="my-1 mx-3"><img src="http://via.placeholder.com/50x50" class="rounded-circle img-fluid m-2" /></span>
                    
                    <p class="my-1 mx-3">Appointment #: 000-001</p>
                    <p class="my-1 mx-3">Service Type: Service A</p>
                    <p class="my-1 mx-3">Date and Time: 10/31/2018 14:00</p>
                    <p class="my-1 mx-3">Price: ₱ 500</p>
            </div>
        </div>
        <!-- Needs Close Tag -->

        <!-- Pending Card -->
        <div class="mt-5">
            <p class="customFont-2 mb-0">Pending Appointments</p>
            <hr class="mt-0">
            <div class="row">
                <div class="col-1">
                    <div class="d-flex justify-content-start"><select class="form-control form-control-sm">
                            <option>10</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end"><label class="form-text-label">Search <input type="text" id=""></label></div>
                </div>
            </div>
        </div>
        <div class="my-2 pure-white">
        <div class="row  card-service align-self-center">

            <span class="my-1 mx-3"><img src="http://via.placeholder.com/50x50" class="rounded-circle img-fluid m-2" /></span>
        
            <p class="my-1 mx-3">Appointment #: 000-001</p>
            <p class="my-1 mx-3">Service Type: Service A</p>
            <p class="my-1 mx-3">Date and Time: 10/31/2018 14:00</p>
            <p class="my-1 mx-3">Price: ₱ 500</p>
        </div>
        </div>
        <br>
        <!-- Pending Close Tag -->
    
        <!-- MODAL Reset Password -->
        <div class="modal fade" id="myAppointmentCompleted" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h5 class="h3 text-dark d-flex justify-content-center" id="myModalLabel">Appointment Completed!</h5>
                                        <button class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-2 col-form-label text-dark font-weight-bold">Email:</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button href="" class="btn btn-outline-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
        </div>
</div>

<br>


<?php include("includes/footer.php");?>