<!DOCTYPE html>
<html>
    <header>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        {{--<meta http-equiv="refresh" content="3" >--}}
        <link rel="icon" href="{{url('/')}}/image/favicon.jfif">
        <title>Store | @yield('title')</title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('assets/webs/app.css')}}">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{module_path()}}/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{module_path()}}/font-awesome/css/font-awesome.min.css">
        <!-- End CSS -->

        <!-- JS -->
        <script src="{{ asset('assets/webs/app.js') }}"></script>
        <!-- jQuery 3 -->
        <script src="{{module_path()}}/jquery/dist/jquery.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{module_path()}}/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- End JS -->

        <!-- Toastr Notify-->
        <link href="{{module_path()}}/toastr/build/toastr.css" rel="stylesheet"/>
        <script src="{{module_path()}}/toastr/toastr.js"></script>
        <!-- End Toastr -->
    </header>
    <body>
        <!-- Header -->
        <div class="header" style="position: relative; z-index: 10">
            @include('webs.layouts.header')
        </div>
        <!-- End Header -->
        <div class="wrapper" style="z-index: 1;position: relative;background-color: #eff0f5;">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </body>

    <!-- Footer -->
    <footer>
        @include('webs.layouts.footer')
    </footer>
    <!-- End Footer -->
</html>