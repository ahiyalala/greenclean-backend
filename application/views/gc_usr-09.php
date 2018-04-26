<?php include("includes/header.php"); 
      include("includes/nav.php");
      include("includes/colleft.php");
?>

<div class="card border-0">
      <div class="card-header">
            <p class="display-4 mt-1 ml-1">User Dashbord</p>
      </div>
      <div class="card-body">
            <h5 class="card-title display-4">Edit Profile</h5>
            <div class="card">
                  <div class="card-body">
                        <form>
                              <div class="form-group">
                                    <label for="exampleFormControlInput1 mx-2">Name:</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Francis Gella">
                              </div>
                              <div class="form-group">
                                    <label for="exampleFormControlInput1 mx-2">Email:</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="gella.faffy@gmail.com">
                              </div>
                              <div class="form-group">
                                    <label for="exampleFormControlInput1 mx-2">Contact Number:</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                          <div class="input-group-addon">63</div>
                                          <input type="number" class="form-control" id="inlineFormInputGroup" placeholder="123456789">
                                    </div>
                              </div>


                        </form>
                        <div class="text-center">
                              <a href="#" class="btn btn-success btn-lg my-3">Update</a>
                        </div>
                  </div>
            </div>
      </div>


      <br>
      <br>
</div>

<?php include("includes/footer.php"); ?>