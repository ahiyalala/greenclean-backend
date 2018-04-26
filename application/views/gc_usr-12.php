<?php include("includes/header.php"); 
      include("includes/nav.php");
      include("includes/colleft.php");
?>

<div class="card border-0 mb-2">
   <div class="card-header">
      <p class="display-4 mt-1 ml-1">User Dashbord</p>
   </div>
   <div class="card-body">
      <h5 class="card-title display-4">Edit Place</h5>
      <div class="card">
         <div class="card-body">
            <form>
               <div class="form-group mx-2">
                  <label for="exampleFormControlInput1">Name:</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="gella.faffy@gmail.com">
               </div>
               <div class="form-group mx-2">
                  <label for="exampleFormControlInput1">Address 1:</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="gella.faffy@gmail.com">
               </div>
               <div class="form-group mx-2">
                  <label for="exampleFormControlInput1">Address 2:</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="gella.faffy@gmail.com">
               </div>
               <div class="form-group mx-2">
                  <label for="exampleFormControlSelect1">City</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                     <option>1</option>
                     <option>2</option>
                     <option>3</option>
                     <option>4</option>
                     <option>5</option>
                  </select>
               </div>
            </form>
            <div class="text-center">
               <a href="#" class="btn btn-primary btn-lg my-2"> Update <i class="far fa-arrow-alt-circle-up"></i>
                  <i class="fas fa-plus"> </i>
               </a>
            </div>
            </div>
         </div>
      </div>
   </div>

  
</div>

<?php include("includes/footer.php"); ?>