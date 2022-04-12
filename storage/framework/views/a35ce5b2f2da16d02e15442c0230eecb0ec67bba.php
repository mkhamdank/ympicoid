<?php $__env->startSection('header'); ?>
<section class="content-header">
  <h1>
    Edit <?php echo e($page); ?>

    <small>it all starts here</small>
  </h1>
  <ol class="breadcrumb">
   
  </ol>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content">
  <?php if($errors->has('password')): ?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
    <?php echo e($errors->first()); ?>

  </div>   
  <?php endif; ?>
  <?php if(session('error')): ?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Error!</h4>
    <?php echo e(session('error')); ?>

  </div>   
  <?php endif; ?>
  <!-- SELECT2 EXAMPLE -->
  <div class="box box-primary">

    <div class="box-header with-border">
      
    </div>  
    <form role="form" class="form-horizontal form-bordered" method="post" action="<?php echo e(url('edit/user', $user->id)); ?>">

      <div class="box-body">
        <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token" />
        <div class="form-group row" align="right">
          <label class="col-sm-4">Name<span class="text-red">*</span></label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="name" placeholder="Enter Full Name" value="<?php echo e($user->name); ?>">
          </div>
        </div>
        <div class="form-group row" align="right">
          <label class="col-sm-4">Username<span class="text-red">*</span></label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="username" placeholder="Enter Username" value="<?php echo e($user->username); ?>">
          </div>
        </div>
        <div class="form-group row" align="right">
          <label class="col-sm-4">E-mail<span class="text-red">*</span></label>
          <div class="col-sm-4">
            <input type="email" class="form-control" name="email" placeholder="Enter E-mail" value="<?php echo e($user->email); ?>">
          </div>
        </div>
        <div class="form-group row" align="right">
          <label class="col-sm-4">Password</label>
          <div class="col-sm-4">
            <input type="password" class="form-control" name="password" placeholder="Enter Password">
          </div>
        </div>
        <div class="form-group row" align="right">
          <label class="col-sm-4">Confirm Password</label>
          <div class="col-sm-4">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Confirm Password">
          </div>
        </div>
        <div class="form-group row" align="right">
          <label class="col-sm-4">User Role<span class="text-red">*</span></label>
          <div class="col-sm-4" align="left">
            <select class="form-control select2" name="role_code" style="width: 100%;" >
              <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($role->role_code == $user->role_code): ?>
              <option value="<?php echo e($role->role_code); ?>" selected><?php echo e($role->role_name); ?></option>
              <?php else: ?>
              <option value="<?php echo e($role->role_code); ?>"><?php echo e($role->role_name); ?></option>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
        </div>
        <div class="col-sm-4 col-sm-offset-6">
          <div class="btn-group">
            <a class="btn btn-danger" href="<?php echo e(url('index/user')); ?>">Cancel</a>
          </div>
          <div class="btn-group">
            <button type="submit" class="btn btn-primary col-sm-14">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>