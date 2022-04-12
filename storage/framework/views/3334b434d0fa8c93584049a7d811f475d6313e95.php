<?php $__env->startSection('stylesheets'); ?>
<link href="<?php echo e(url("css/dataTables.bootstrap4.min.css")); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(url("css/buttons.dataTables.min.css")); ?>">
<style type="text/css">
  thead>tr>th{
        text-align:center;
        overflow:hidden;
    }
    tbody>tr>td{
        text-align:center;
    }
    tfoot>tr>th{
        text-align:center;
    }
    th:hover {
        overflow: visible;
    }
    td:hover {
        overflow: visible;
    }
    table.table-bordered{
        border:1px solid grey;
    }
    table.table-bordered > thead > tr > th{
        border:1px solid grey;
        padding-top: 0;
        padding-bottom: 0;
        vertical-align: middle;
    }
    table.table-bordered > tbody > tr > td{
        padding: 0px;
        vertical-align: middle;
    }
    table.table-bordered > tfoot > tr > th{
        padding:0;
        vertical-align: middle;
        color: #fff !important;
    }
    thead {
        background-color: #fff;
        color: #fff;
    }
    td{
        overflow:hidden;
        text-overflow: ellipsis;
    }
    th{
        color: white;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
<section class="content-header">
  <ol class="breadcrumb" style="margin-left:10px;margin-bottom: 0px !important;">
    <li><a href="<?php echo e(url("create/navigation")); ?>" class="btn btn-primary btn-md" style="color:white;">Create <?php echo e($page); ?></a></li>
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
            <thead style="background-color: #3f50b5;color: white">
              <tr>
                <th style="color: white">Navigation Code</th>
                <th style="color: white">Navigation Name</th>
                <th style="color: white">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $navigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navigation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td style="width: 15%"><?php echo e($navigation->navigation_code); ?></td>
                <td><?php echo e($navigation->navigation_name); ?></td>
                <td>
                  <center>
                    <a class="btn btn-info btn-xs" href="<?php echo e(url('show/navigation', $navigation['id'])); ?>">View</a>
                    <a href="<?php echo e(url('edit/navigation', $navigation['id'])); ?>" class="btn btn-warning btn-xs">Edit</a>
                    <a href="javascript:void(0)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal" onclick="deleteConfirmation('<?php echo e(url("destroy/navigation")); ?>', '<?php echo e($navigation['navigation_name']); ?>', '<?php echo e($navigation['id']); ?>');">
                      Delete
                    </a>
                  </center>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
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
<script src="<?php echo e(url("js/dataTables.buttons.min.js")); ?>"></script>
<script src="<?php echo e(url("js/jquery.dataTables.min.js")); ?>"></script>
<script src="<?php echo e(url("js/dataTables.bootstrap4.min.js")); ?>"></script>
<script src="<?php echo e(url("js/buttons.flash.min.js")); ?>"></script>
<script src="<?php echo e(url("js/jszip.min.js")); ?>"></script>
<script src="<?php echo e(url("js/vfs_fonts.js")); ?>"></script>
<script src="<?php echo e(url("js/buttons.html5.min.js")); ?>"></script>
<script src="<?php echo e(url("js/buttons.print.min.js")); ?>"></script>
<script>
  jQuery(document).ready(function() {
    var table = $('#example1').DataTable({
      "order": [],
      'dom': 'Bfrtip',
      'responsive': true,
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
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