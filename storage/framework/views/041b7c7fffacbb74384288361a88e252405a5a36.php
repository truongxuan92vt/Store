<!DOCTYPE html>
<html>
    <header>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
        
        <link rel="icon" href="<?php echo e(url('/')); ?>/image/favicon.jfif">
        <title>Store | <?php echo $__env->yieldContent('title'); ?></title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/webs/app.css')); ?>">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo e(module_path()); ?>/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo e(module_path()); ?>/font-awesome/css/font-awesome.min.css">
        <!-- End CSS -->

        <!-- JS -->
        <script src="<?php echo e(asset('assets/webs/app.js')); ?>"></script>
        <!-- jQuery 3 -->
        <script src="<?php echo e(module_path()); ?>/jquery/dist/jquery.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo e(module_path()); ?>/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- End JS -->

        <!-- Toastr Notify-->
        <link href="<?php echo e(module_path()); ?>/toastr/build/toastr.css" rel="stylesheet"/>
        <script src="<?php echo e(module_path()); ?>/toastr/toastr.js"></script>
        <!-- End Toastr -->
    </header>
    <body>
        <!-- Header -->
        <div class="header" style="position: relative; z-index: 10">
            <?php echo $__env->make('webs.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <!-- End Header -->
        <div class="wrapper" style="z-index: 1;position: relative;background-color: #eff0f5;">
            <div class="container">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </body>

    <!-- Footer -->
    <footer>
        <?php echo $__env->make('webs.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </footer>
    <!-- End Footer -->
</html>