    <!-- NAV START -->
    <div class="nav">
      <nav class="navbar navbar-light navbar-toggleable-md bg-success fixed-top">

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
          GreenKlean
        </a>
        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item m-2 dropdown">
              <a class="nav-link dropdown-toggle  dropleft" href="#" data-toggle="dropdown">
                <img src="<?php echo base_url('front/img/baby.jpeg') ?>"  class="img-responsive rounded-circle border-dark" alt="APPLE" width="35" height="30">
              </a>
              <div class="dropdown-menu  dropdown-menu-right">
                <a href="#" class="dropdown-item font-weight-bold"><?php echo $admin['first_name'].' '.$admin['last_name'] ?></a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">View Profile</a>
                <a href="<?php echo base_url('/admin/logout') ?>" class="dropdown-item">Logout</a>
              </div>
            </li>
          </ul>

      </nav>
      <!-- NAV END -->
      </div>

      <br>
      <br>
      <br>
