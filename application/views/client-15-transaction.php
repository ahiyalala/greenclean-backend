<?php include("includes/header.php"); 
      include("includes/nav.php");
      include("includes/colleft.php");
?>

<div class="card border-0">
      <div class="card-header">
            <p class="display-4 mt-1 ml-1">User Dashbord</p>
      </div>
      <div class="card-body">
            <h5 class="card-title display-4">Transactions</h5>

            <table class="table table-striped table-hover">
                  <thead>
                        <tr>
                              <th scope="col">#</th>
                              <th scope="col">Date</th>
                              <th scope="col">Cleaning Type</th>
                              <th scope="col">Amount</th>
                              <th scope="col"></th>
                        </tr>
                  </thead>
                  <tbody>
                        <tr>
                              <th scope="row">1</th>
                              <td>April 20, 2018</td>
                              <td>A</td>
                              <td>₱400.00</td>
                              <td>
                                    <button class="btn btn-success d-block accordion " data-toggle="collapse" data-target="#collapse-btn-1">
                                    <i class="fas fa-chevron-down"></i> </button>
                              </td>
                        </tr>
                        <tr>
                              <th scope="row">2</th>
                              <td>April 20, 2018</td>
                              <td>A</td>
                              <td>₱400.00</td>
                              <td>
                                    <button class="btn btn-success d-block " data-toggle="collapse" data-target="#collapse-btn-1">
                                    <i class="fas fa-chevron-down"></i> </button>
                              </td>
                        </tr>
                        <tr>
                              <th scope="row">3</th>
                              <td>April 20, 2018</td>
                              <td>A</td>
                              <td>₱400.00</td>
                              <td>
                                    <button class="btn btn-success d-block " data-toggle="collapse" data-target="#collapse-btn-1">
                                    <i class="fas fa-chevron-down"></i> </button>
                              </td>
                        </tr>
                  </tbody>
            </table>
            <div class="my-3">
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
            </div>
            <!-- now -->
            <div class="collapse" id="collapse-btn-1">
                  <div class="card mb-2">
                        <div class="card-block  bg-faded">

                              <div class="container">
                                    <div class="row">
                                          <div class="col">
                                                <table class="table mt-4 table-hover">
                                                      <tr>
                                                            <th scope="row">Date</th>
                                                            <td>April 20, 2018</td>

                                                      </tr>
                                                      <tr>
                                                            <th scope="row">Cleaning Type</th>
                                                            <td>A</td>
                                                      </tr>
                                                      <tr>
                                                            <th scope="row">Place:</th>
                                                            <td>Rizal</td>
                                                      </tr>
                                                      <tr>
                                                            <th scope="row">Payment:</th>
                                                            <td>Cash</td>
                                                      </tr>
                                                      <tr>
                                                            <th scope="row">Amount:</th>
                                                            <td>₱400.00</td>
                                                      </tr>
                                                      <tr>
                                                            <th scope="row">Time Start:</th>
                                                            <td>13:00</td>
                                                      </tr>
                                                      <tr>
                                                            <th scope="row">Time End:</th>
                                                            <td> 16:00</td>
                                                      </tr>
                                                      </tbody>
                                                </table>
                                          </div>
                                          <div class="col">
                                                <div class="border-2">
                                                      <div class="text-center mt-2 mx-auto ">
                                                            <div class="col-sm-3 mx-auto">
                                                                  <img src="img/gab.jpg" class="rounded-circle img-fluid mt-2"
                                                                  />
                                                            </div>
                                                            <a href="#">
                                                                  <h5 class="h5 my-3"> Francis Gabriel T. Gella II </h3>
                                                            </a>
                                                            <span class="fa fa-star checked"></span> 4.5
                                                            <div class="dropdown-divider mb-2"></div>
                                                            <p>Rate Given:</p>
                                                            <p>
                                                                  <span class="fa fa-star checked"></span>
                                                                  <span class="fa fa-star checked"></span>
                                                                  <span class="fa fa-star checked"></span>
                                                                  <span class="fa fa-star checked"></span>
                                                                  <span class="fa fa-star"></span>
                                                            </p>
                                                            <div class="dropdown-divider mb-2"></div>
                                                            <p> Message: </p>
                                                            <p class="text-left">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas
                                                                  ducimus atque quo dolor tenetur quidem autem, esse ipsum
                                                                  aspernatur architecto pariatur, dolore error alias natus.</p>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>

            <!-- now -->

      </div>
</div>
</br>
</br>
<br>




<?php include("includes/footer.php"); ?>