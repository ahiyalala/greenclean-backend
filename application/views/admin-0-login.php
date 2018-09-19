
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Welcome Admin!</title>

    <!-- Bootstrap core CSSS -->
    <link href="front/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="front/css_admin/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">

    <?php echo form_open('admin/login', array('class'=>'form-signin')) ?>

      <img class="mb-4 rounded-circle" src="http://via.placeholder.com/72x72" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <!-- Please sign in will change ng alerts -->
      <!-- <div class="alert alert-danger alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</button>
					Wrong Username or Password!
			  </div>
			  <div class="alert alert-success alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</button>
					Congratulations, <strong>NAME</strong>. please check your email for confirmation.
			  </div>
			  <div class="alert alert-success alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</button>
					Please check your email to reset your password.
              </div> -->

      <!-- END -->
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email_address" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>


      <div class="checkbox mb-3">

        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <a href="#" class=" ml-5" data-toggle="modal" data-target="#myModal">Forget account?</a>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 ">&copy; 2018-Present</p>
    <?php echo form_close(); ?>
  </body>

  <div class="modal fade" id="myModal">
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

    <!-- Bootstrap core JavaScript -->

  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
    crossorigin="anonymous"></script>

</html>
