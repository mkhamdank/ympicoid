<?php $__env->startSection('stylesheets'); ?>
<link href="<?php echo e(url("css/dataTables.bootstrap4.min.css")); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(url("css/buttons.dataTables.min.css")); ?>">
<style type="text/css">
thead input {
  width: 100%;
  padding: 3px;
  box-sizing: border-box;
}
thead>tr>th{
  text-align:center;
}
tbody>tr>td{
  text-align:center;
}
tfoot>tr>th{
  text-align:center;
}
td:hover {
  overflow: visible;
}
table.table-bordered{
  border:1px solid black;
}
table.table-bordered > thead > tr > th{
  border:1px solid black;
}
table.table-bordered > tbody > tr > td{
  border:1px solid rgb(211,211,211);
  padding-top: 0;
  padding-bottom: 0;
}
table.table-bordered > tfoot > tr > th{
  border:1px solid rgb(211,211,211);
}
#loading, #error { display: none; }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
<section class="content-header">
  <ol class="breadcrumb" style="margin-left:10px;margin-bottom: 0px !important;">
    <li><a href="<?php echo e(url("create/user")); ?>" class="btn btn-primary btn-md" style="color:white">Create <?php echo e($page); ?></a></li>
  </ol>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content">
  <?php if(session('status')): ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-thumbs-o-up"></i> Success!</h4>
    <?php echo e(session('status')); ?>

  </div>   
  <?php endif; ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body" style="overflow-x:scroll;">
          <table id="example1" class="table user-table no-wrap">
            <thead style="background-color: #3f50b5">
              <tr>
                <th style="color: white">Full Name</th>
                <th style="color: white">Username</th>
                <th style="color: white">E-mail</th>
                <th style="color: white">Role</th>
                <th style="color: white">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->username); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td style="width: 10%"><?php echo e($user->role_code); ?></td>
                <td>
                  <center>
                    <a class="btn btn-info btn-xs" href="<?php echo e(url('show/user', $user['id'])); ?>">View</a>
                    <a href="<?php echo e(url('edit/user', $user['id'])); ?>" class="btn btn-warning btn-xs">Edit</a>
                    <a href="javascript:void(0)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal" onclick="deleteConfirmation('<?php echo e(url("destroy/user")); ?>', '<?php echo e($user['name']); ?>', '<?php echo e($user['id']); ?>');">
                      Delete
                    </a>
                  </center>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
<!--             <tfoot>
              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </tfoot> -->
          </table>
        </div>
      </div>
    </div>
  </section>

  <div class="modal modal-danger fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
        </div>
        <div class="modal-body">
          Are you sure delete?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <a id="modalDeleteButton" href="#" type="button" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>

  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(url("js/jquery-3.5.1.js")); ?>"></script>
<script src="<?php echo e(url("js/jquery.numpad.js")); ?>"></script>
<script src="<?php echo e(url("js/jquery.gritter.min.js")); ?>"></script>
<script src="<?php echo e(url("js/jquery.dataTables.min.js")); ?>"></script>
<script src="<?php echo e(url("js/dataTables.bootstrap4.min.js")); ?>"></script>
<script src="<?php echo e(url("js/jquery.flot.min.js")); ?>"></script>
<script src="<?php echo e(url("js/dataTables.buttons.min.js")); ?>"></script>
<script src="<?php echo e(url("js/buttons.flash.min.js")); ?>"></script>
<script src="<?php echo e(url("js/jszip.min.js")); ?>"></script>
<script src="<?php echo e(url("js/vfs_fonts.js")); ?>"></script>
<script src="<?php echo e(url("js/buttons.html5.min.js")); ?>"></script>
<script src="<?php echo e(url("js/buttons.print.min.js")); ?>"></script>
  <script>
    // function hideSidebar() {
    //   document.getElementById("main-wrapper").setAttribute('data-sidebartype','mini-sidebar');
    //   document.getElementById("logo-yamaha").setAttribute('height','20px');
    //   document.getElementById("logo-yamaha").style.setProperty('height', '20px', 'important');
    //   document.getElementsByClassName('logo-icon')[0].style.setProperty('padding-left', '0px', 'important');
    //   document.getElementsByClassName('hide-menu')[0].style.setProperty('display', 'none', 'important');
    //   document.getElementsByClassName('sidebar-item active selected')[0].style.setProperty('width', '65px', 'important');
    // }
    jQuery(document).ready(function() {
      var table = $('#example1').DataTable({
        "order": [],
        'dom': 'Bfrtip',
        'responsive': true,
        'lengthMenu': [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        'buttons': {
          buttons:[
          {
            extend: 'pageLength',
            className: 'btn btn-default',
          },
          {
            extend: 'copy',
            className: 'btn btn-success',
            text: '<i class="fa fa-copy"></i> Copy',
            exportOptions: {
              columns: ':not(.notexport)'
            }
          },
          {
            extend: 'excel',
            className: 'btn btn-info',
            text: '<i class="fa fa-file-excel-o"></i> Excel',
            exportOptions: {
              columns: ':not(.notexport)'
            }
          },
          {
            extend: 'print',
            className: 'btn btn-warning',
            text: '<i class="fa fa-print"></i> Print',
            exportOptions: {
              columns: ':not(.notexport)'
            }
          },
          ]
        }
      });


    });
    
    function deleteConfirmation(url, name, id) {
      jQuery('.modal-body').text("Are you sure want to delete '" + name + "'");
      jQuery('#modalDeleteButton').attr("href", url+'/'+id);
    }
  </script>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>