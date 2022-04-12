<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(url("logo_mirai.png")); ?>" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MIRAI PT. YMPI</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- <link rel="stylesheet" href="<?php echo e(asset("css/login-style.css")); ?>">
  <link rel="stylesheet" href="<?php echo e(asset("css/bootstrap4.min.css")); ?>" id="bootstrap-css">
  <link rel="stylesheet" href="<?php echo e(asset("bower_components/font-awesome/css/font-awesome.min.css")); ?>">
  <link rel="stylesheet" href="<?php echo e(asset("bower_components/Ionicons/css/ionicons.min.css")); ?>"> -->

  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('design/bootstrap.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('design/font-awesome.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('design/material-design-iconic-font.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('design/animate.css')); ?>"> 
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('design/hamburgers.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('design/animsition.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('design/select2.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('design/daterangepicker.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('design/util.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('design/main.css')); ?>">

</head>
<body class="hold-transition login-page">
 <div class="limiter">
    <div class="container-login100" style="background-color:#eee">
      <div class="wrap-login100 p-t-35 p-b-20" style="padding:20px">
        <!-- <form class="login100-form validate-form"> -->
           <!-- p-b-70 -->
          <!-- <span class="login100-form-avatar">
            <center><img src="<?php echo e(url('logo_yamaha.png')); ?>" style="width:300px;padding-bottom: 0px;"> </center>
            <i class="fa fa-user"></i>
          </span> -->

          <form method="post" action="<?php echo e(route('login')); ?>" class="login100-form validate-form">

            <span class="login100-form-title">
              <center><img src="<?php echo e(url('logo_online.png')); ?>" style="width:200px;padding-bottom: 0px;"> </center>
            </span>
            <?php echo e(csrf_field()); ?>


            <?php if($errors->has('username')): ?>
              <div class="label label-danger label-dismissible">
                  <h4 style="font-size: 15px;font-weight: bold;"> Error!</h4>
                  <span style="font-size: 12px">These credentials do not match our records.</span>
              </div>   
            <?php endif; ?>
            <?php if(session('success')): ?>
                <div class="label label-success label-dismissible">
                    <h4 style="font-size: 15px;font-weight: bold;"> Success!</h4>
                    <span style="font-size: 12px"><?php echo e(session('success')); ?></span>
                </div>   
            <?php endif; ?>

            <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
              <input autocomplete="off" type="text" class="input100" id="username" name="username" value="<?php echo e(old('username')); ?>" required autofocus>
              <span class="focus-input100" data-placeholder="Username"></span>
            </div>

            <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
              <input class="input100" type="password" id="password" name="password" required>
              <span class="focus-input100" data-placeholder="Password"></span>
            </div>

            <div class="container-login100-form-btn">
              <button class="login100-form-btn" type="submit">
                Login
              </button>
            </div>
          </form>


          <ul class="login-more p-t-190">
            <!-- <li class="m-b-8">
              <span class="txt1">
                Forgot
              </span>

              <a href="#" class="txt2">
                Username / Password?
              </a>
            </li>

            <li>
              <span class="txt1">
                Don’t have an account?
              </span>

              <a href="#" class="txt2">
                Sign up
              </a>
            </li> -->
          </ul>
        <!-- </form> -->
      </div>
    </div>
  </div>

  <div id="dropDownSelect1"></div>
  <script src="<?php echo e(asset('design/jquery-3.2.1.min.js')); ?>"></script>
  <script src="<?php echo e(asset('design/animsition.min.js')); ?>"></script>
  <script src="<?php echo e(asset('design/popper.js')); ?>"></script>
  <script src="<?php echo e(asset('design/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('design/select2.min.js')); ?>"></script>
  <script src="<?php echo e(asset('design/moment.min.js')); ?>"></script>
  <script src="<?php echo e(asset('design/daterangepicker.js')); ?>"></script>
  <script src="<?php echo e(asset('design/countdowntime.js')); ?>"></script>
  <script src="<?php echo e(asset('design/main.js')); ?>"></script>
  <script type="text/javascript">
    jQuery(document).ready(function() {
      $('#username').val('');
      $('#password').val('');
    });
    
    $('img').on('contextmenu', function(e){ 
        return false; 
      });
  </script>
</body>
</html>