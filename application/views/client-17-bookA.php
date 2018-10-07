<?php include("includes/header.php");
include("includes/nav.php");

?>
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-2"><img src="http://via.placeholder.com/120x120" class="rounded-circle img-fluid mt-2" /></div>
            <div class="col-4 table-responsive">
                <table class="table table-borderless">
                        <tr>
                        <td class="borderless">Name:</td>
                        <td class="borderless">John Doe</td>
                        </tr>
                        <tr>
                        <td class="borderless">John Doe</td>
                        <td class="borderless">john.doe@gmail.com</td>
                        </tr>
                        <tr>
                        <td class="borderless">Contact Number:</td>
                        <td class="borderless">204918272381</td>
                        </tr>
                    </table>
            </div>
            <div class="col-4 table-responsive">
                <table class="table table-borderless borderless">
                        <tr>
                        <td class="borderless">Gender:</td>
                        <td class="borderless">Male</td>       
                        </tr>
                        <tr>
                        <td class="borderless">Birthday:</td>
                        <td class="borderless">October 03, 2000</td>
                        </tr>
                </table>
            </div>
    </div>
</div>
<hr class="style8">
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-4 text-left">My Dashboard</h1>
        </div>
        <div class="col-4"><button class="btn btn-lg btn-outline-success mt-2 ">Schedule an Appointment <i class="fas fa-plus"></i></button></div>
    </div>

    <!-- Needs Card -->
    <div class="mt-2">
        <p class="h3">Needs Feedback</p>
        <hr>
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
    <div class="card-dash my-2" data-toggle="modal" data-target="#myAppointmentCompleted">
        <div class="row justify-content-center align-self-center">
            <div class="col-2">
                <table id="wrapper">
                <tr>
                    <td class="tdboy"> <img src="http://via.placeholder.com/100x100" class="rounded-circle img-fluid m-2" /></td>
                </tr>
                </table>
            </div>
            <div class="col">
                    <div class="table-responsive">
                        <table class="table table-borderless borderless">
                                <tr>
                                <td class="borderless">Appointment #:</td>
                                <td class="borderless">000-001</td>       
                                </tr>
                                <tr>
                                <td class="borderless">Service Type:</td>
                                <td class="borderless">Service A</td>
                                </tr>
                                <tr>
                                <td class="borderless">Date and Time:</td>
                                <td class="borderless">10/31/2018 14:00</td>
                                </tr>
                        </table>
                    </div>
            </div>
            <div class="col" >
            <table id="wrapper">
                <tr>
                    <td class="tdboy"><h4 class="h4">Price: ₱ 500</h4> </td>
                </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- Needs Close Tag -->

    <!-- Pending Card -->
    <div class="mt-5">
        <p class="h3">Pending Appointments</p>
        <hr>
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
    <div class="card-dash my-2">
        <div class="row justify-content-center align-self-center">
            <div class="col-2">
                <table id="wrapper">
                <tr>
                    <td class="tdboy"> <img src="http://via.placeholder.com/100x100" class="rounded-circle img-fluid m-2" /></td>
                </tr>
                </table>
            </div>
            <div class="col">
                    <div class="table-responsive">
                        <table class="table table-borderless borderless">
                                <tr>
                                <td class="borderless">Appointment #:</td>
                                <td class="borderless">000-001</td>       
                                </tr>
                                <tr>
                                <td class="borderless">Service Type:</td>
                                <td class="borderless">Service A</td>
                                </tr>
                                <tr>
                                <td class="borderless">Date and Time:</td>
                                <td class="borderless">10/31/2018 14:00</td>
                               
                                </td>
                                </tr>
                        </table>
                    </div>
            </div>
            <div class="col">
            <table id="wrapper">
                <tr>
                    <td class="tdboy"><h4 class="h4">Price: ₱ 500</h4> </td>
                </tr>

                </table>
            </div>
        </div>
    </div>
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
                                            <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
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




<?php include("includes/footer.php");?>