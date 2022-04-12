<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(url("logo_mirai.png")); ?>" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <title>MIRAI PT. YMPI</title>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('design/dashboard/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('design/dashboard/css/font-awesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('design/dashboard/css/templatemo-softy-pinko.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url("bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")); ?>">
    <?php echo $__env->yieldContent('stylesheets'); ?>
    </head>

    <body>
    <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <script src="<?php echo e(asset('design/dashboard/js/jquery-2.1.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('design/dashboard/js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('design/dashboard/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('design/dashboard/js/scrollreveal.min.js')); ?>"></script>
    <script src="<?php echo e(asset('design/dashboard/js/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('design/dashboard/js/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('design/dashboard/js/imgfix.min.js')); ?>"></script> 
    <script src="<?php echo e(asset('design/dashboard/js/custom.js')); ?>"></script>
    <script src="<?php echo e(url("bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")); ?>"></script>
    <script type="text/javascript">
      // $('img').on('contextmenu', function(e){ 
      //     return false; 
      //   });
    </script>
  
    <?php echo $__env->yieldContent('scripts'); ?>

  </body>
</html>