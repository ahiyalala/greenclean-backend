<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/front/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/front/css_admin/styles.css" />
    <title>Admin Dashboard</title>

    <style>
      @media (max-width: 576px) {
        nav .container {
          width: 100%;
        }
      }
    </style>
  </head>

  <body>

    <!-- NAV START -->
    <div class="nav">
      <nav class="navbar navbar-light navbar-toggleable-md bg-success fixed-top">

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
          <img src="http://via.placeholder.com/60x50" class="img-responsive" alt="Cinque Terre">
        </a>
        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item m-2 dropdown">
              <a class="nav-link dropdown-toggle  dropleft" href="#" data-toggle="dropdown">
              <?php echo $admin['first_name']." ".$admin['last_name']; ?>
              </a>
              <div class="dropdown-menu  dropdown-menu-right">
                <a href="#" class="dropdown-item font-weight-bold"><?php echo $admin['first_name']." ".$admin['last_name']; ?></a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">View Profile</a>
                <a href="<?php echo base_url('/'); ?>" class="dropdown-item">Logout</a>
              </div>
            </li>
          </ul>

      </nav>
      <!-- NAV END -->
      </div>

      <br>
      <br>
      <br>

      <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="bg-dark">
          <ul class="sidebar-nav">
            <li class="sidebar-brand">
              <a href="<?php echo base_url("/admin") ?>" class="text-warning active">Home</a>
            </li>
            <?php if(true): ?>
            <li>
              <a href="<?php echo base_url("/admin/management") ?>" class="text-warning">Admin Management</a>
            </li>
            <?php endif; ?>
            <li>
              <a href="<?php echo base_url("/admin/employee") ?>" class="text-warning ">Employee Management</a>
            </li>
            <li>
              <a href="gc_adm-5-user mgmt.html" class="text-warning">User Management</a>
            </li>
          </ul>
        </div>