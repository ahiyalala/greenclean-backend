<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
            crossorigin="anonymous">

      <!-- Custom styles for this template -->
      <link href="css/simple-sidebar.css" rel="stylesheet">

      <head>
            <title>Employee Management</title>
            <style>
                  @media (max-width: 576px) {
                        nav .container {
                              width: 100%;
                        }
                  }

                  .card-body {
                        -webkit-box-flex: 1;
                        -ms-flex: 1 1 auto;
                        flex: 1 1 auto;
                        padding: 1.25rem
                  }

                  .card-header {
                        padding: 1.25rem 1.25rem;
                        margin-bottom: 0;
                        border-bottom: 1px solid rgba(0, 0, 0, .125)
                  }
            </style>
      </head>

      <body>
            <!-- NAV START -->
            <div class="nav">
                  <nav class="navbar navbar-light navbar-toggleable-md bg-success fixed-top">
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav">
                              <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                              <img src="http://lorempixel.com/60/50/sports/" class="img-responsive" alt="Cinque Terre">
                        </a>
                        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
                              <ul class="navbar-nav">
                                    <li class="nav-item m-2 dropdown">
                                          <a class="nav-link dropdown-toggle  dropleft" href="#" data-toggle="dropdown">
                                                <img src="apple.jpg" class="img-responsive rounded-circle" alt="APPLE" width="30" height="30">
                                          </a>
                                          <div class="dropdown-menu  dropdown-menu-right">
                                                <a href="#" class="dropdown-item font-weight-bold">John Doe</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item">View Profile</a>
                                                <a href="gc_0-indexpage.html" class="dropdown-item">Logout</a>
                                          </div>
                                    </li>
                              </ul>
                        </div>
                  </nav>
            </div>
            <!-- NAV END -->
            <br>
            <br>
            <br>
            <div id="wrapper">
                  <!-- Sidebar -->
                  <div id="sidebar-wrapper" class="bg-dark">
                        <ul class="sidebar-nav">
                              <li class="sidebar-brand">
                                    <a href="gc_adm-1-dashboard.html" class="text-warning active">Home</a>
                              </li>
                              <li>
                                    <a href="gc_adm-2-admin mgmt.html" class="text-warning">Admin Management</a>
                              </li>
                              <li>
                                    <a href="gc_adm-3-employee mgmt.html" class="text-warning ">Employee Management</a>
                              </li>
                              <li>
                                    <a href="gc_adm-5-user mgmt.html" class="text-warning">User Management</a>
                              </li>
                        </ul>
                  </div>
                  <!-- /#sidebar-wrapper -->

                  <!-- Page Content -->
                  <div id="page-content-wrapper ">
                        <!-- Full Section -->
                        <div class="container-fluid bg-secondary">
                              <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
                              <!-- START OF MAIN -->
                              <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
                                    <h1 class="text-center display-4">John Doe's Profile</h1>
                                    <div class="dropdown-divider"></div>
                                    <!-- START OF 1ST CARD -->

                                    <div class="card  w-75 container">
                                          <div class="card-header bg-success h3">Personal Infomation</div>
                                          <!-- START OF 1ST CARD BODY -->
                                          <div class="card-block bg-faded">
                                                <div class="d-flex justify-content-center">
                                                      <img src="apple.jpg" class="img-fluid rounded-circle" alt="APPLE" width="250" height="250">
                                                </div>
                                                <div class="text-center mb-3">
                                                      <h3 class="h3">John Doe</h3>
                                                </div>
                                                <table class="table bg-faded">
                                                      <tbody>
                                                            <tr>
                                                                  <th scope="row">Address: </th>
                                                                  <td>Blk. 23 Lot. 12 Colorado St. Phase 2 Ampid San Mateo, Rizal</td>
                                                            </tr>
                                                            <tr>
                                                                  <th scope="row">Birthday: </th>
                                                                  <td>October 31, 1997</td>
                                                            </tr>
                                                            <tr>
                                                                  <th scope="row">Gender: </th>
                                                                  <td>Male</td>
                                                            </tr>
                                                            <tr>
                                                                  <th scope="row">Date Registered: </th>
                                                                  <td>July 21, 2018</td>
                                                            </tr>
                                                            <tr>
                                                                  <th scope="row">Work Registered: </th>
                                                                  <td>Monday - Friday</td>
                                                            </tr>
                                                            <tr>
                                                                  <th scope="row">OFF Days: </th>
                                                                  <td>Saturday, Sunday</td>
                                                            </tr>
                                                      </tbody>
                                                </table>

                                          </div>
                                          <!-- END OF 1ST CARD BODY -->
                                          <div class="card-footer">
                                                <div class="d-flex justify-content-center clearfix pt-2">
                                                      <button class="btn btn-outline-success mx-1">Update</button>
                                                      <button class="btn btn-outline-danger mx-1">Delete</button>
                                                </div>
                                          </div>

                                    </div>
                                    <!-- END OF 1ST CARD -->

                                    <div class="card mt-3 w-75 container">
                                          <div class="card-header bg-success h3">Work Infomation</div>
                                          <!-- START OF 2ND CARD BODY -->
                                          <div class="card-block bg-faded">
                                                <table class="table bg-faded">
                                                      <thead>
                                                            <tr>
                                                                  <th scope="col">#</th>
                                                                  <th scope="col">Client Name</th>
                                                                  <th scope="col">Date</th>
                                                                  <th scope="col">Time</th>
                                                            </tr>
                                                      </thead>
                                                      <tbody>
                                                            <tr>
                                                                  <th scope="row"> 1 </th>
                                                                  <td>Kat Cruz</td>
                                                                  <td>July 26, 2019</td>
                                                                  <td>16:00 - 17:00</td>
                                                            </tr>
                                                      </tbody>
                                                </table>
                                          </div>
                                    </div>



                              </main>
                              <!-- END OF MAIN -->

                        </div>
                        <!-- End Full Section -->
                        <div>
                              <footer class="footer">
                                    <div class="container-fluid text-center text-light bg-success ">
                                          <p class="font-weight-bold m-2 p-2">
                                                <span>(c) Green Clean Copyrights 2018 Developed by CodeBehind Inc.</span>
                                          </p>
                                    </div>
                              </footer>
                        </div>
                  </div>
                  <!-- END Page Content  -->






            </div>

      </body>

      <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
            crossorigin="anonymous"></script>
      <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl"
            crossorigin="anonymous"></script>
      <!-- Menu Toggle Script -->

      <script>
            $("#menu-toggle").click(function (e) {
                  e.preventDefault();
                  $("#wrapper").toggleClass("toggled");
            });
      </script>

</html>