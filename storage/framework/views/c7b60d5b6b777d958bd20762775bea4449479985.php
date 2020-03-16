<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
        <link rel="icon" href="<?php echo e(url('/')); ?>/image/favicon.jfif">
        <title>Store | <?php echo $__env->yieldContent('title'); ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo e(module_path()); ?>/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo e(module_path()); ?>/font-awesome/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/AdminLTE/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/AdminLTE/dist/css/skins/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        
        <!-- ./wrapper -->
        <!-- jQuery 3 -->
        <script src="<?php echo e(module_path()); ?>/jquery/dist/jquery.js"></script>
        <!-- jQuery UI 1.11.4 -->
        
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        
            
        
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo e(module_path()); ?>/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo e(URL::to('/')); ?>/AdminLTE/dist/js/adminlte.min.js"></script>

        <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/plugin/loader/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(module_path()); ?>/datatables.net-bs/css/dataTables.bootstrap.min.css"/>

        <script type="text/javascript" src="<?php echo e(module_path()); ?>/datatables.net/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo e(module_path()); ?>/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo e(URL::to('/')); ?>/plugin/notify/notify.js"></script>

        <link rel="stylesheet" href="<?php echo e(asset('assets/admins/app.css')); ?>">
        <script type="text/javascript" src="<?php echo e(asset('assets/admins/app.js')); ?>"></script>

        <!-- Toastr Notify-->
        <link href="<?php echo e(module_path()); ?>/toastr/build/toastr.css" rel="stylesheet"/>
        <script src="<?php echo e(module_path()); ?>/toastr/toastr.js"></script>
        <!-- End Toastr -->
    </head>
    <style>
        .row{
            margin-bottom: 5px;
        }
    </style>
    <body class="hold-transition skin-blue sidebar-mini fixed">
        <div id="loader-wrapper">
            <div id="loader"></div>
            
            
        </div>
        <div class="wrapper">
            <!-- Main Header-->
            <?php echo $__env->make('admins.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- Left side column. contains the logo and sidebar -->
            <?php echo $__env->make('admins.layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="header-breadcrumb">
                        <ol class="breadcrumb-master">
                            <li><a href="/"><i class="fa fa-dashboard"></i> <?php echo $__env->yieldContent('parent'); ?></a></li>
                            <li class="active"><?php echo $__env->yieldContent('parent2'); ?></li>
                            <li class="active"><?php echo $__env->yieldContent('parent3'); ?></li>
                            <li class="active"><?php echo $__env->yieldContent('action'); ?></li>
                        </ol>
                    </div>
                    <div class="header-btn">
                        <?php echo $__env->yieldContent('header-button'); ?>
                    </div>
                </section>
                <!-- Main content -->
                <section class="content">
                    <?php echo $__env->yieldContent('content'); ?>
                </section>
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <?php echo $__env->make('admins.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- Control Sidebar -->
            <?php echo $__env->make('admins.layouts.control_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

            <!-- Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->

            <!-- Modal -->
            <div class="modal fade" id="windowpopup" tabindex="-1" role="dialog" aria-labelledby="windowpopup_title"
                 aria-hidden="true">
                <div id="windowpopup_size" class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="ClosePopup();">
                                &times;
                            </button>
                            <a onclick="Maximinepopup();" style="float: right; margin-right: 10px;">
                                <input id="windowpopup_size_hidden_maximine" type="hidden" value="min" />
                                <i class="popup_maximine glyphicon glyphicon-resize-full"></i>
                            </a>
                            <h4 class="modal-title" id="windowpopup_title" style="text-align: center"></h4>
                        </div>
                        <div class="modal-body" id="windowpopup_content">
                            
                            
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <!-- Bootstrap-notify -->
            
        </div>
    </body>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(xhr) {
                $('body').removeClass('loaded');
            },
            complete   : function () {
                $('body').addClass('loaded');
            },
            error: function (x, status, error) {
                if (x.status == 403) {
                    alert("Sorry, your session has expired. Please login again to continue");
                    window.location.href ="/Account/Login";
                }
                else {
                    alert("An error occurred: " + status + "nError: " + error);
                }
            }
        });
        $( document ).ajaxComplete(function( event, request, settings ) {
            $('body').addClass('loaded');
        });
        $(document).ready(function(){
            setTimeout(function(){
                $('body').addClass('loaded');
                // $('h1').css('color','#222222');
            }, 300);
        });

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
</html>
