<?php include("includes/header.php"); 
      include("includes/nav.php");
      include("includes/colleft.php");
?>

<div class="card border-0">
   <div class="card-header">
      <p class="display-4 mt-1 ml-1">User Dashbord</p>
   </div>
   <div class="card-body">

      <h5 class="card-title display-4 mb-2">Edit Card Info</h5>
      <form>
         <div class="form-group row border-0 mx-2">
            <label for="inputCardNumber" class="col-sm-2 col-form-label">Card Number:</label>
            <div class="col-sm-8">
               <input type="number" class="form-control" name="card_number" id="inputCardNumber" placeholder="XXXX XXXX XXXX 1234">
            </div>
            <div class="col-sm-2">
            <img src="img/paypal.png" class="rounded float-right img-fluid " />
            </div>
         </div>
         <div class="form-group row border-0 mx-2">
         <label for="example-date-input" class="col-2 col-form-label">Date:</label>
         <div class="col-10">
            <input class="form-control" type="date" name="date" placeholder="2011-08-19" id="example-date-input">
         </div>
         </div>
         <div class="form-group row border-0 mx-2">
            <label for="inputCVV" class="col-sm-2 col-form-label">CVV:</label>
            <div class="col-sm-10">
               <input type="number" class="form-control" name="cw" id="inputCVV" placeholder="XXX">
            </div>
         </div>
      </form>
      <div class="text-center">
      <a href="#" class="btn btn-success btn-lg my-3">Update
                
      </a>
      </div>




   </div>
</div>


<br>
<br>
<br>
<br>
<br>
<br>



<?php include("includes/footer.php"); ?>