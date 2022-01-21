<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('adminos/img/favicon.ico') }}" rel="icon" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('adminos/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Fontawesome CSS -->
    <link href="{{ asset('adminos/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <!--  Feather Icon CSS -->
    <link href="{{ asset('adminos/icon/feather/css/feather.css') }}" rel="stylesheet">
    <!-- Toastr style -->
    <link href="{{ asset('adminos/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <!-- Gritter -->
    <link href="{{ asset('adminos/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">
    <!--mCustomScrollbar CSS-->
    <link href="{{ asset('adminos/plugins/jquery.mCustomScrollbar/css/jquery.mCustomScrollbar.css') }}"
          rel="stylesheet"/>
    <!-- Animate CSS-->
    <link href="{{ asset('adminos/plugins/animate.css/css/animate.css') }}" rel="stylesheet">
    <!-- Radial Charts-->
    <link href="{{ asset('adminos/plugins/radial/css/radial.css') }}" rel="stylesheet">
    <!-- Our Custom CSS -->
    <link href="{{ asset('adminos/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <!-- Mervick EmojioneArea-->
    <link rel="stylesheet" href="{{ asset('adminos/plugins/mervick/emojionearea.css') }}">
    <!--Vector Map CSS-->
    <link rel="stylesheet" href="{{ asset('adminos/plugins/jqvmap/css/jqvmap.css') }}">
    <!-- Jquery-ui-->
    <link rel="stylesheet" href="{{ asset('adminos/plugins/jquery-ui/jquery-ui.css') }}">
    <!-- Jquery-ui-->
    <link rel="stylesheet" href="{{ asset('adminos/img/flag-icon-css/css/flag-icon.css') }}">
    <!-- Custom CSS Style-->
    <link href="{{ asset('adminos/css/style.css') }}" rel="stylesheet">
    <style>
        .sidebar-collapse .nav-item.active {
            box-shadow: inset 0px 0px 2px rgb(116 90 155 / 90%);
            border-radius: 10px;
            margin: 2px 2px 2px 0;
        }
    </style>

    @stack('styles')
</head>
<body class="default-theme canvas-menu mini-navbar">
<div id="wrapper">
    <nav class="navbar-default navbar-static-side">
        <div class="sidebar-brand fixed-brand">
            <img class="logo-element-img img-logo" id="logo" src="/adminos/img/LOGO_2.png" alt="">
            <a class="close-canvas-menu text-white float-right"><i class="fa fa-times"></i></a>
        </div>
        @include('adminos.partials.sidebar')
    </nav>
    <div id="page-wrapper" class="gray-bg topMargin">
        @include('adminos.partials.top-nav')
        @yield('content')
    </div>
    @include('adminos.partials.notifications')
    <div class="selector-toggle">
        <a href="javascript:void(0)" class="right-sidebar-toggle"><i class="feather icon-settings rotate-icon"></i></a>
    </div>
    @include('adminos.partials.right-sidebar')
</div>
<!-- Mainly scripts -->
<script src="{{ asset('adminos/plugins/jquery/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('adminos/plugins/popper/popper.min.js') }}"></script>
<script src="{{ asset('adminos/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('adminos/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('adminos/plugins/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
<!--mCustomScrollbar JS-->
<script src="{{ asset('adminos/plugins/jquery.mCustomScrollbar/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- Toastr JS -->
<script src="{{ asset('adminos/plugins/toastr/toastr.min.js') }}"></script>
<!-- GITTER -->
<script src="{{ asset('adminos/plugins/gritter/jquery.gritter.min.js') }}"></script>
<!-- jquery UI -->
<script src="{{ asset('adminos/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Touch Punch - Touch Event Support for jQuery UI -->
<script src="{{ asset('adminos/plugins/touchpunch/jquery.ui.touch-punch.min.js') }}"></script>
<!-- Pace JS -->
<script src="{{ asset('adminos/plugins/pace/pace.min.js') }}"></script>
<!--Custom JS-->
<script src="{{ asset('adminos/js/AdminosJS.js') }}"></script>

@stack('scripts')
</body>
</html>
