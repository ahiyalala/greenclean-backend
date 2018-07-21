<!DOCTYPE html>
<html>
<!-- Homepage-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to GreenKlean!</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="css_admin/Features-Blue.css">
    <link rel="stylesheet" href="css_admin/Project-Clean.css">
    <link rel="stylesheet" href="css_admin/Header-Blue.css">
    <link rel="stylesheet" href="css_admin/Highlight-Phone.css">
    <link rel="stylesheet" href="css_admin/Pretty-Footer.css">
    <link rel="stylesheet" href="css_admin/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="css_admin/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    
</head>

<body>
    <div>
        <div class="header-blue">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container">
                    <a class="navbar-brand" href="#">GreenKlean</a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav list-inline">
                            <li class="nav-item" role="presentation">
                            <li class="nav-item" role="presentation">  <a class="nav-link list-inline-item active">Home</a> </li>
                            <li class="nav-item" role="presentation">  <a class="nav-link list-inline-item " href="#section2">About us</a></li>
                            <li class="nav-item" role="presentation">  <a class="nav-link list-inline-item" data-toggle="modal" data-target="#myModalFAQ">Faq</a></li>
                            <li class="nav-item" role="presentation">  <a class="nav-link list-inline-item" href="#section3">Services</a></li>
                            <li class="nav-item" role="presentation">  <a class="nav-link list-inline-item" data-toggle="modal" data-target="#myModalContact">Contact us / Opportunities </a></li>
                            </li>

                        </ul>
                        <!-- <form class="form-inline mr-auto" target="_self">

                        </form>
                        <span class="navbar-text">
                            <a href="#" class="login" data-toggle="modal" data-target="#myModal">Log In</a>
                        </span>
                        <a class="btn btn-light action-button" role="button" href="#section1">Sign Up</a>  -->
                    </div>
                    <!-- MODAL ADD-->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h5 class="h3 text-dark d-flex justify-content-center" id="myModalLabel">Login</h5>
                                    <button class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label text-dark font-weight-bold">Username:</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label text-dark font-weight-bold">Password:</label>
                                        <div class="col-10">
                                            <input class="form-control" type="password" value="Artisanal kale" id="example-text-input">
                                        </div>
                                    </div>

                                    <div class="modal-footer d-flex justify-content-center">
                                        <label class="form-check-label text-dark" for="exampleCheck1">
                                            <a href="#myModalReset" class="login"  data-toggle="modal" data-dismiss="modal" > Forgot Account?</a>
                                        </label>
                                        <button href="" class="btn btn-outline-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <!-- MODAL Reset Password -->
                    <div class="modal fade" id="myModalReset"  tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h5 class="h3 text-dark d-flex justify-content-center" id="myModalLabel">Reset Password</h5>
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
             <!-- MODAL Contact Us -->
             <div class="modal fade" id="myModalContact"  tabindex="-1" role="dialog">
             <div class="modal-dialog modal-md">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h5 class="h3 text-dark d-flex justify-content-center" id="myModalLabel">Contact us now!</h5>
                                    <button class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label text-dark font-weight-bold">Email:</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="example-text-input" class="col-2 col-form-label text-dark font-weight-bold">Message:</label>
                                    <div class="col-10">
                                    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                                    </div>
                                    </div>




                                    <div class="modal-footer d-flex justify-content-center">  
                                        <button href="" class="btn btn-outline-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal FAQ -->
                    
             <div class="modal fade" id="myModalFAQ"  tabindex="-1" role="dialog">
             <div class="modal-dialog modal-md">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h5 class="h3 text-dark d-flex justify-content-center" id="myModalLabel">Frequently Ask Question</h5>
                                    <button class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                   <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                What is GreenKlean?
                                                </button>
                                            </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body text-dark">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                            </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                 How can I avail your service?
                                                </button>
                                            </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body text-dark">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                            </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Do you have a mobile app? 
                                                </button>
                                            </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="card-body text-dark">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                            </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                                Types of Cleaning: Express Clean and Deep Clean
                                                </button>
                                            </h5>
                                            </div>
                                            <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="card-body text-dark">
                                       <p>     <strong> Express Clean </strong> - Basic, fast and spot cleaning of a few key areas for 1.5 hours with 1 cleaner. </p>
<p>
1. Bathroom Fix toiletries Scrubbing and spot cleaning of toilet bowl, sink and shower <br>
2. Bedroom Fix or change bed covers and pillows Wipe cabinets, furniture, appliances Clean floors 
(vacuum and mop) <br>
3. Dining Wipe dining set and cupboards Clean floors (vacuum and mop) <br>
4. Kitchen Wipe countertops, kitchen appliances (fridge, oven, microwave) and sink Clean floors 
(vacuum and mop)  <br>
5. Living Room Wipe furniture, appliances and shelves Clean floors, sofa and windows (vacuum and 
mop) <br> 
6. Others Throw trash Room spray 
</p>
<p><strong> Deep Clean </strong> - Deep and thorough cleaning of most areas for 3 hours with 1 or
2 cleaners. </p>
<p>
1. Bathroom Fix toiletries Scrubbing and deep cleaning of toilet bowl, sink and shower <br>
2. Bedroom Fix or change bed covers and pillows Wipe cabinets, furniture, appliances Clean floors 
(vacuum and mop) <br>
3. Dining Wipe dining set and cupboards Clean floors (vacuum and mop) <br>
4. Kitchen Wipe countertops and kitchen appliances (fridge, oven, microwave) Clean floors (vacuum and mop) Scrub sink <br>
5. Living Room Wipe furniture, appliances and shelves Clean floors, sofa and windows (vacuum and mop) <br>
6. Others Throw trash Room spray and dehumidifier</p>





                                            </div>
                                            </div>
                                        </div>
                                        </div>
<!-- MODALFAQ-->
                                </div>
                            </div>
                        </div>
                    </div>
                   
            
                    
                
            </nav>
            <div class="container hero">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                        <h1>Welcome to GreenKlean!</h1>
                        <p>Greenklean is a convenient way to keep your home clean. Our housekeepers provide trustworthy professional cleaning services at a great value using our own functional, safe and 
                            non harmful cleaning solutions. </p>

                        <p>We treat your home like it is ours.</p>
                        <button class="btn btn-light btn-lg action-button"
                            type="button">Learn More</button>
                    </div>
                    <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder">
                        <div class="iphone-mockup">
                            <img src="front/img/hand.PNG" class="device w-100 h-250">
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!--<div class="register-photo" id="section1">
            <div class="form-container">
                <div class="image-holder"></div>
                <form method="post">
                    <h2 class="text-center">
                        <strong>Create</strong> an account.</h2>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox">I agree to the license terms.</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                    </div>
                    <a href="#" class="already" data-toggle="modal" data-target="#myModal">You already have an account? Login here.</a>
                </form>
            </div>
        </div> -->
        <div class="highlight-phone">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-7">
                        <div class="intro">
                            <h2>Book your cleaning now!</h2>
                            <p>Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. Aliqua sed justo ligula.</p><a class="btn btn-primary btn-success" style="border-radius:40px;" role="button" href="#">Action Button</a></div>
                    </div>
                    <div class="col-sm-4 col-lg-6 offset-lg-7">
                        <div class="d-none d-md-block iphone-mockup"></div><img src="front/img/sponge.png" class="img-responsive" style="width:310px;height:262px;" /></div>
                </div>
            </div>
        </div>




        <div class="features-blue" id="section2">
            <div class="container">
                <div class="intro">
                    <h2 class="text-center">Why GreenKlean?</h2>
                    <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut
                        laoreet vitae. </p>
                </div>
                <div class="row features">
                    <div class="col-sm-6 col-md-4 item">
                        <i class="fa fa-map-marker icon"></i>
                        <h3 class="name">Works everywhere</h3>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida.
                            Aliquam varius finibus est.</p>
                    </div>
                    <div class="col-sm-6 col-md-4 item">
                        <i class="fa fa-clock icon"></i>
                        <h3 class="name">Always available</h3>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida.
                            Aliquam varius finibus est.</p>
                    </div>
                    <div class="col-sm-6 col-md-4 item">
                        <i class="fa fa-list-alt icon"></i>
                        <h3 class="name">Customizable</h3>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida.
                            Aliquam varius finibus est.</p>
                    </div>
                    <div class="col-sm-6 col-md-4 item">
                        <i class="fa fa-leaf icon"></i>
                        <h3 class="name">Organic</h3>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida.
                            Aliquam varius finibus est.</p>
                    </div>
                    <div class="col-sm-6 col-md-4 item">
                        <i class="fa fa-plane icon"></i>
                        <h3 class="name">Fast</h3>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida.
                            Aliquam varius finibus est.</p>
                    </div>
                    <div class="col-sm-6 col-md-4 item">
                        <i class="fa fa-phone icon"></i>
                        <h3 class="name">Mobile-first</h3>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida.
                            Aliquam varius finibus est.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="projects-clean my-5" id="section3">
            <div class="container text-center my-5">
                <div class="intro">
                    <h2 class="text-center mb-3">Services</h2>
                    <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae.</p>
                </div>
                <div class="row projects">
                    <div class="col-sm-6 col-lg-4 item"><img src="front/img/desk.jpg" class="img-fluid" />
                        <h3 class="name">Service Name</h3>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 item"><img src="front/img/building.jpg" class="img-fluid" />
                        <h3 class="name">Service Name</h3>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 item"><img src="front/img/loft.jpg" class="img-fluid" />
                        <h3 class="name">Service Name</h3>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 item"><img src="front/img/minibus.jpeg" class="img-fluid" />
                        <h3 class="name">ServiceName</h3>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 item"><img src="front/img/minibus.jpeg" class="img-fluid" />
                        <h3 class="name">ServiceName</h3>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 item"><img class="img-fluid" src="front/img/minibus.jpeg" />
                        <h3 class="name">Service Name</h3>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="row">
                <div class="col-sm-6 col-md-4 footer-navigation">
                    <h3>
                        <a href="#">Company
                            <span>logo </span>
                        </a>
                    </h3>
                    <p class="links">
                        <a href="#">Home</a>
                        <strong> | </strong>
                        <a href="#section2">About</a>
                        <strong> | </strong>
                        <a href="#">Faq</a>
                        <strong> | </strong>
                        <a href="#">Contact</a>
                    </p>
                    <p class="company-name">GreenKlean © 2015 </p>
                </div>
                <div class="col-sm-6 col-md-4 footer-contacts">
                    <div>
                        <span class="fa fa-map-marker footer-contacts-icon"> </span>
                        <p>
                            <span class="new-line-span">21 Revolution Street</span> Paris, France</p>
                    </div>
                    <div>
                        <i class="fa fa-phone footer-contacts-icon"></i>
                        <p class="footer-center-info email text-left"> +1 555 123456</p>
                    </div>
                    <div>
                        <i class="fa fa-envelope footer-contacts-icon"></i>
                        <p>
                            <a href="#" target="_blank">greenklean.ph@gmail.com</a>
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4 footer-about">
                    <h4>About the company</h4>
                    <p> Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus
                        vehicula sit amet. </p>
                    <div class="social-links social-icons">
                        <a href="#">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
       
        <script src="front/js/jquery.min.js"></script>
        <script src="front/js/bootstrap.min.js"></script>
        <script src="front/js/scrollspy.js"></script>

      


</body>

</html>