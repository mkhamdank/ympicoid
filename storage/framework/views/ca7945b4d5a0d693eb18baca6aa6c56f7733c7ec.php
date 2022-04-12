<?php $__env->startSection('header'); ?>
<section class="content-header">
  <h1>
    Detail <?php echo e($page); ?>

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
  <!-- SELECT2 EXAMPLE -->
  <div class="box box-primary">
    <div class="box-header with-border">
      
    </div>  
    <form role="form" method="post" action="<?php echo e(url('edit/user', $user->id)); ?>">
      <div class="box-body">
      	<input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_method" />
        <div class="form-group row" align="right">
          <label class="col-sm-5">Name</label>
          <div class="col-sm-5" align="left">
            <?php echo e($user->name); ?>

          </div>
        </div>
        <div class="form-group row" align="right">
          <label class="col-sm-5">Username</label>
          <div class="col-sm-5" align="left">
            <?php echo e($user->username); ?>

          </div>
        </div>
        <div class="form-group row" align="right">
          <label class="col-sm-5">E-mail</label>
          <div class="col-sm-5" align="left">
            <?php echo e($user->email); ?>

          </div>
        </div>
        <div class="form-group row" align="right">
          <label class="col-sm-5">User Role</label>
          <div class="col-sm-5" align="left">
            <?php echo e($user->role->role_name); ?>

          </div>
        </div>
        <div class="form-group row" align="right">
          <label class="col-sm-5">Created By</label>
          <div class="col-sm-5" align="left">
            <?php $__currentLoopData = $created_bys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $created_by): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($user->created_by == $created_by->id): ?>
            <?php echo e($created_by->name); ?>

            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
        <div class="form-group row" align="right">
          <label class="col-sm-5">Last Update</label>
          <div class="col-sm-5" align="left">
            <?php echo e($user->updated_at); ?>

          </div>
        </div>
        <div class="form-group row" align="right">
          <label class="col-sm-5">Created At</label>
          <div class="col-sm-5" align="left">
            <?php echo e($user->created_at); ?>

          </div>
        </div>

      </form>
    </div>
    
  </div>

  <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>