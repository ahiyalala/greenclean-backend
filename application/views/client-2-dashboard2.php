<?php include("includes/header.php"); 
      include("includes/nav.php");
      include("includes/colleft.php");
?>
<div class="card border-0">
  <div class="card-header">
    <p class="display-4 mt-1 ml-1">User Dashbord</p>
  </div>
  <div class="card-body">
    <h5 class="card-title display-4">Hi Juan dela Cruz!</h5>
    <p class="display-5 card-text"> You have 23 transactions</p>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>
              <div class="invisible">...</div>
            </th>
            <th>No.</th>
            <th>Date</th>
            <th>Time Start</th>
            <th>Time End</th>
            <th>Cleaning Type</th>
            <th>Place</th>
            <th>Payment</th>
            <th>Amount</th>
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
            <td>October 31, 2019</td>
            <td>13:00</td>
            <td>16:00</td>
            <td>A</td>
            <td>Home</td>
            <td>Cash</td>
            <td>400</td>
          </tr>
        </tbody>
      </table>
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
    <p class="text-center mt-5">
      <a href="#" class="btn btn-outline-success btn-lg mx-1">AVAIL SERVICE</a>
      <button class="btn btn-outline-danger btn-lg mx-1">Delete</button>
    </p>
  </div>
</div>


</div>


<?php include("includes/footer.php"); ?>