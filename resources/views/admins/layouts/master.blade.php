<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="icon" href="{{url('/')}}/image/favicon.jfif">
        <title>Store | @yield('title')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{URL::to('/')}}/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{URL::to('/')}}/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{URL::to('/')}}/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{URL::to('/')}}/AdminLTE/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{URL::to('/')}}/AdminLTE/dist/css/skins/_all-skins.min.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{URL::to('/')}}/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{URL::to('/')}}/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{URL::to('/')}}/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <link rel="stylesheet" href="{{URL::to('/')}}/css/common.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <!-- ./wrapper -->
        <!-- jQuery 3 -->
        <script src="{{URL::to('/')}}/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{URL::to('/')}}/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{URL::to('/')}}/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Sparkline -->
        <script src="{{URL::to('/')}}/AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- daterangepicker -->
        <script src="{{URL::to('/')}}/AdminLTE/bower_components/moment/min/moment.min.js"></script>
        <script src="{{URL::to('/')}}/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="{{URL::to('/')}}/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- FastClick -->
        <script src="{{URL::to('/')}}/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="{{URL::to('/')}}/AdminLTE/dist/js/adminlte.min.js"></script>

        <script type="text/javascript" src="{{ URL::asset('js/util.js') }}"></script>
        <link rel="stylesheet" href="{{URL::to('/')}}/plugin/loader/main.css">
        <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/plugin/dataTables/datatables.css"/>
        <script type="text/javascript" src="{{URL::to('/')}}/plugin/dataTables/datatables.js"></script>
        <script type="text/javascript" src="{{URL::to('/')}}/plugin/notify/notify.js"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini fixed">
        <div id="loader-wrapper">
            <div id="loader"></div>
            {{--<div class="loader-section section-left"></div>--}}
            {{--<div class="loader-section section-right"></div>--}}
        </div>
        <div class="wrapper">
            <!-- Main Header-->
            @include('admins.layouts.header')

            <!-- Left side column. contains the logo and sidebar -->
            @include('admins.layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        @yield('controller')
                        <small>@yield('action')</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/"><i class="fa fa-dashboard"></i> @yield('parent')</a></li>
                        <li class="active">@yield('parent2')</li>
                        <li class="active">@yield('parent3')</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            @include('admins.layouts.footer')
            <!-- Control Sidebar -->
            @include('admins.layouts.control_sidebar')
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
                            {{--<iframe id="modal-body-iframe" width="600px" height="600px">--}}
                            {{--</iframe>--}}
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
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
    </script>
</html>
