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
    <title>Admin Management</title>
    <style>
      @media (max-width: 576px) {
        nav .container {
          width: 100%;
        }
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
        <div class="container-fluid bg-secondary">

          <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
          <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <h1 class="text-center display-4">Administrator Management</h1>
            <div class="dropdown-divider"></div>
            <h2 class="display-5 pt-5 pb-3">Available Packages</h2>

            <!-- ACCORDION -->
            <div id="accordion" role="tablist">
              <div class="card">
                <div class="card-header" role="tab" id="heading">
                  <h5 class="mb-0">
                    <a href="#collapse1" data-parent="#accordion" data-toggle="collapse">
                      Package A
                    </a>
                  </h5>
                </div>
                <div id="collapse1" class="collapse">
                  <div class="card-block">
                    Offered Services: 3
                    <br/> Time Duration: 4 hours
                    <br/> Subscription: One-time only
                    <br/> Price: P299.00
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header" role="tab" id="heading">
                  <h5 class="mb-0">
                    <a href="#collapse2" data-parent="#accordion" data-toggle="collapse">
                      Package B
                    </a>
                  </h5>
                </div>
                <div id="collapse2" class="collapse">
                  <div class="card-block">
                    Offered Services: 6
                    <br/> Time Duration: 6 hours
                    <br/> Subscription: One-time only
                    <br/> Price: P499.00
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header" role="tab" id="heading">
                  <h5 class="mb-0">
                    <a href="#collapse3" data-parent="#accordion" data-toggle="collapse">
                      Package C
                    </a>
                  </h5>
                </div>
                <div id="collapse3" class="collapse">
                  <div class="card-block">
                    Offered Services: 9
                    <br/> Time Duration: 8 hours
                    <br/> Subscription: Monthly
                    <br/> Price: P799.00
                  </div>
                </div>
              </div>

            </div>
            <div class="d-flex justify-content-center clearfix pt-5">
              <button class="btn btn-outline-primary mx-1 " data-toggle="modal" data-target="#myModal">Add Service Package</button>
              <button class="btn btn-outline-success mx-1">Update</button>
              <button class="btn btn-outline-danger mx-1">Delete</button>
            </div>

            <h2 class="display-5 pt-5 pb-3">Available Services</h2>

            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <td> </td>
                    <th>No.</th>
                    <th>Services Available</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <p class="float-right">
                        <input class="form-check-input" name="a1" type="radio" value="option1">
                      </p>
                    </td>
                    <td>1</td>
                    <td>Sweep Floor</td>
                  </tr>
                  <tr>
                    <td>
                      <p class="float-right">
                        <input class="form-check-input" name="a1" type="radio" value="option1">
                      </p>
                    </td>
                    <td>2</td>
                    <td>Wash Dishes</td>
                  </tr>
                  <tr>
                    <td>
                      <p class="float-right">
                        <input class="form-check-input" name="a1" type="radio" value="option1">
                      </p>
                    </td>
                    <td>3</td>
                    <td>Clean Comfort Room</td>
                  </tr>
                  <tr>
                    <td>
                      <p class="float-right">
                        <input class="form-check-input" name="a1" type="radio" value="option1">
                      </p>
                    </td>
                    <td>4</td>
                    <td>Laundry</td>
                  </tr>
                  <tr>
                    <td>
                      <p class="float-right">
                        <input class="form-check-input" name="a1" type="radio" value="option1">
                      </p>
                    </td>
                    <td>5</td>
                    <td>Car Wash</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-center clearfix pt-5">
              <button class="btn btn-outline-primary mx-1 " data-toggle="modal" data-target="#myModal">Add New Service</button>
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


          </main>


        </div>


      </div>
      <!-- /#page-content-wrapper -->
      <br>
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

    <!-- /#wrapper -->

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