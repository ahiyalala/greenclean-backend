
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Welcome Admin!</title>

    <!-- Bootstrap core CSS -->
    <link href="front/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="front/css_admin/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
  <div class="container col-lg-3">
      <!-- Please sign in will change ng alerts -->
     <?php if($this->session->flashdata('message') != NULL): ?>
      <div class="alert alert-failure alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </button>
        Administrator <strong>updated</strong>!
      </div>
      <?php endif; ?>
      <?php echo form_open('admin/register_admin') ?>

      <!-- END -->
       <img class="mb-4 rounded-circle" src="http://via.placeholder.com/72x72" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Registration</h1>
      
     <input type="text" name="first_name" id="firstName" class="form-control" placeholder="First Name *" required autofocus>
     
      <input type="text" name="middle_name" id="middleName" class="form-control" placeholder="Middle Name *" required autofocus>
     
      <input type="text" name="last_name" id="lastName" class="form-control" placeholder="Last Name *" required autofocus>
  
      <input type="email" name="email_address" id="inputEmail" class="form-control" placeholder="Email address *" required autofocus>
      
      <input type="password" name="password" id="inputPassword" class="form-control mb-3" placeholder="Password *" required>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 ">&copy; 2018-Present</p>
      </div>
    <?php echo form_close(); ?>
  </body>


    <!-- Bootstrap core JavaScript -->

  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
    crossorigin="anonymous"></script>

</html>
