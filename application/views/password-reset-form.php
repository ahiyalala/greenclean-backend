<html>
  <head>
    <title>Greenklean - Reset your password</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css'); ?>">
    <link rel="shortcut icon" type="image/png" href="https://greenklean.ph/front/img/GKlean.png"/>
    <link rel='shortcut icon' type='image/x-icon' href='https://greenklean.ph/front/img/GKlean.png' />
    <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="detach">
      <div class="grid-x">
        <div class="cell small-12 medium-1 cbBlock">
          <a href="/">
            <img class="nav-icon" src="https://greenklean.ph/front/img/GKlean.png" />
          </a>
        </div>
        <div class="cell small-12 medium-11 hide-for-small-only">
          <ul class="menu menu1">
            <li><a href="<?php echo base_url('#about-us') ?>">About Us</a></li>
            <li><a href="<?php echo base_url('#faq') ?>">FAQ</a></li>
            <li><a href="<?php echo base_url('#contact') ?>">Contact Us</a></li>
            <li><a href="<?php echo base_url('/booking') ?>">Booking</a></li>
          </ul>
        </div>
      </div>
    </div>
    <section class="container">
      <div class="password-reset__form">
        <h3>Reset password</h3>
        <?php echo form_open('passwordreset/reset?email='.$email.'&token='.$token) ?>
            <label for="password">Enter your new password</label>
            <input class="field" name="password" type="password" id="password" onchange='check_pass();'/>
            <label for="confirm_password">Retype your new password</label>
            <input class="field" name="confirm_password" type="password" id="confirm_password" onchange='check_pass();'/>
            <input type="submit" id="submit" class="button field" disabled />
        </form>
      </div>
  </section>
  <script>
    function check_pass() {

        if (document.getElementById('password').value ==
                document.getElementById('confirm_password').value) {
                  document.getElementById('submit').disabled = false;
        }
        else {
            document.getElementById('submit').disabled = true;
        }
    }
  </script>
  </body>
</htm>
