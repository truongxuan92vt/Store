
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('controller', 'Dashboard'); ?>
<?php $__env->startSection('action', 'Controller pannel'); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-content">this is my home page</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admins.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>