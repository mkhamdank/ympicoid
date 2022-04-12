<?php $__env->startSection('stylesheets'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Account Setting</h3>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- SELECT2 EXAMPLE -->
  <div class="container-fluid">
    <div class="row" style="padding-top: 0px">
      <div class="col-xs-12">
        <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Error!</h4>
          <?php echo e(session('error')); ?>

        </div>   
        <?php endif; ?>
        <?php if(session('status')): ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="fa fa-thumbs-up"></i> Success!</h4>
          <?php echo e(session('status')); ?>

        </div>   
        <?php endif; ?>
        <div class="card">
            <div class="card-body">
              <form role="form" class="form-horizontal form-bordered" method="post" action="<?php echo e(url('setting/user')); ?>">
                <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token" />
                <div class="form-group row">
                  <label class="col-sm-3">Name<span class="text-red">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="name" placeholder="Enter Full Name" value="<?php echo e($user->name); ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3">E-mail<span class="text-red">*</span></label>
                  <div class="col-sm-4">
                    <input type="email" class="form-control" name="email" placeholder="Enter E-mail" value="<?php echo e($user->email); ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3">Personal Phone Number</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" value="<?php echo e($user->phone_number); ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3">Company</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="company" placeholder="Company Status" value="<?php echo e($user->remark); ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3">Old Password</label>
                  <div class="col-sm-4">
                    <input type="password" class="form-control" name="oldPassword" placeholder="Enter Old Password">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3">New Password</label>
                  <div class="col-sm-4">
                    <input type="password" class="form-control" name="newPassword" placeholder="Enter New Password">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3">Confirm New Password</label>
                  <div class="col-sm-4">
                    <input type="password" class="form-control" name="confirmPassword" placeholder="Enter Confirm New Password">
                  </div>
                </div>

                <div class="col-sm-4 col-sm-offset-6">
                  <div class="btn-group">
                    <a class="btn btn-danger" href="<?php echo e(url('setting/user')); ?>">Cancel</a>
                  </div>
                  <div class="btn-group">
                    <button type="submit" class="btn btn-primary col-sm-14">Submit</button>
                  </div>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>