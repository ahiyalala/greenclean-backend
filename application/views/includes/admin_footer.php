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
  <!--<script src="<?php echo base_url("assets/js/jquery.min.js");?>"></script>
  <script src="assets/js/jquery.min.js"></script>-->
  <script src="js/jquery.min.js"></script>
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
	window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
  </script>

  </body>

</html>