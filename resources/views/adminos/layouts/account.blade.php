<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
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
    <link href="{{ asset('adminos/icon/themify-icons/themify-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('accountPanel/css/vendors/sweetalert2.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('accountPanel/css/spinner.css') }}">

    <link rel="stylesheet" href="{{ asset('adminos/plugins/pnotify/css/pnotify.css') }}">
    <link rel="stylesheet" href="{{ asset('adminos/plugins/pnotify/css/pnotify.brighttheme.css') }}">
    <link rel="stylesheet" href="{{ asset('adminos/plugins/pnotify/css/pnotify.buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('adminos/plugins/pnotify/css/pnotify.history.css') }}">
    <link rel="stylesheet" href="{{ asset('adminos/plugins/pnotify/css/pnotify.mobile.css') }}">
    <link rel="stylesheet" href="{{ asset('adminos/plugins/pnotify/custom/notify.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('adminos/css/language.css') }}">

    <style>
        .sidebar-collapse .nav-item.active {
            box-shadow: inset 0px 0px 2px rgb(116 90 155 / 90%);
            border-radius: 10px;
            margin: 2px 2px 2px 0;
        }

        .alert ul {
            list-style-type: none;
        }

        .language__name {
            color: #007aff;
            border: solid 2px #007aff;
        }

        .language__list {
            border: solid 2px #007aff;
            padding: 0;
        }

        .language__button:hover {
            color: #007aff;
        }

        .language__item, .language__item a {
            margin-left: -5px;
        }

        .language__name:after {
            border-left: solid 1px #007aff;
            border-bottom: solid 1px #007aff;
        }

        .coin-marquee-header {
            display: none;
        }

        .navbar-top-links .nav-item, .navbar-top-links .nav-link {
            background-color: #fff;
        }

        .navbar-top-links .nav-item:first-child {
            padding-left: 10px;
        }

        .navbar-top-links .nav-link {
            position: sticky;
        }

        .navbar-right {
            position: absolute;
            right: 0;
        }

        .menu-log {
            position: absolute;
            top: 30px
        }
    </style>

    @stack('styles')
</head>
<body class="blue-theme canvas-menu mini-navbar">

<div class="spinner-wrapper">
    <div class="gooey">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<div id="wrapper">
    <nav class="navbar-default navbar-static-side">
        <div class="sidebar-brand fixed-brand d-flex align-items-center justify-content-center">
            <a href="https://skyline.limited/" target="_blank">
                <span class="site-logo" style="color: white;font-size: 30px;font-weight: bold">Skyline</span>
            </a>
{{--            <img class="logo-element-img img-logo" id="logo" src="/adminos/img/LOGO_2.png" alt="">--}}
            <a class="close-canvas-menu text-white float-right"><i class="fa fa-times"></i></a>
        </div>
        @include('adminos.partials.sidebar')
    </nav>
    <div id="page-wrapper" class="gray-bg topMargin">
        @include('adminos.partials.top-nav')
        @yield('content')
    </div>
    @include('adminos.partials.notifications')
{{--    <div class="selector-toggle">--}}
{{--        <a href="javascript:void(0)" class="right-sidebar-toggle"><i class="feather icon-settings rotate-icon"></i></a>--}}
{{--    </div>--}}
{{--    @include('adminos.partials.right-sidebar')--}}
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

<script src="{{ asset('accountPanel/js/jquery.mask.min.js') }}"></script>

<script src="{{ asset('accountPanel/js/sweet-alert/sweetalert.min.js') }}"></script>

<script src="{{ asset('adminos/plugins/pnotify/js/pnotify.js') }}"></script>
<script src="{{ asset('adminos/plugins/pnotify/js/pnotify.desktop.js') }}"></script>
<script src="{{ asset('adminos/plugins/pnotify/js/pnotify.buttons.js') }}"></script>
<script src="{{ asset('adminos/plugins/pnotify/js/pnotify.confirm.js') }}"></script>
<script src="{{ asset('adminos/plugins/pnotify/js/pnotify.callbacks.js') }}"></script>
<script src="{{ asset('adminos/plugins/pnotify/js/pnotify.animate.js') }}"></script>
<script src="{{ asset('adminos/plugins/pnotify/js/pnotify.history.js') }}"></script>
<script src="{{ asset('adminos/plugins/pnotify/js/pnotify.mobile.js') }}"></script>
<script src="{{ asset('adminos/plugins/pnotify/js/pnotify.nonblock.js') }}"></script>
<script src="{{ asset('adminos/plugins/pnotify/custom/notify.js') }}"></script>

<script src="//code-eu1.jivosite.com/widget/eVBf13NSHN" async></script>

<script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinMarquee.js"></script>

@stack('scripts')

<script>
    window.addEventListener("load", function(event) {
        $('.spinner-wrapper').remove()
    });
    $(function () {
        setTimeout(function () {
            $('.spinner-wrapper').remove()
        }, 4000)
    })
    $(document).ready(function () {
        $('.notifications').on('click', function () {
            return false;
        })
        $(".notifications li.notification").on('click', function (e) {
            e.preventDefault();
            var $notification_count;
            var $count = parseInt($(".show-notification").find('.label.label-success').text());

            console.log($count)

            if ($count > 0) {
                var $id = parseInt($(this).attr('data-id'));
                $.ajax({
                    url: "/ajax/notification/status/read",
                    method: 'post',
                    data: 'id=' + $id,
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function success(data) {
                        var $data = $.parseJSON(data);

                        if ($data['status'] == 'good') {
                            $(".notifications li.notification[data-id='" + $id + "']").remove();
                            $notification_count = $data['notification_count'];
                            $(".show-notification").find('.label.label-success').text($notification_count);

                            if ($notification_count == 0) {
                                $(".notifications").append(' <li class="nav-item"><div class="dropdown-messages-box"><div class="media-body" style="padding: 0 15px"> <strong>{{ __('No notifications!') }}</strong> </div> </div> </li>');
                            }
                        }
                    }
                });
            }
            return false;
        });
    })
</script>

@if(canEditLang() && checkRequestOnEdit())
    <script>
        $(document).ready(function () {
            class Request {
                constructor() {
                    this.protocol = '';
                    this.domain = '';
                    this.params = {};

                }

                postJsonRequestAjax(url, method, data, callbackSuccess, callbackFail, callbackBefore, callbackAfter) {
                    callbackSuccess = callbackSuccess || function () {
                    };
                    callbackFail = callbackFail || function () {
                    };
                    callbackBefore = callbackBefore || function () {
                    };
                    callbackAfter = callbackAfter || function () {
                    };
                    method = method || 'POST';
                    data = data || {};
                    url = url || '';

                    callbackBefore({}, data);

                    $.ajax({
                        type: method,
                        url: url,
                        data: data,
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {
                            if (data.error) {
                                callbackFail({}, data);
                                callbackAfter({}, data);
                                return;
                            }
                            callbackSuccess(data.data, data);
                            callbackAfter({}, data);
                        },
                        error: function (data) {
                            callbackFail({}, data);
                            callbackAfter({}, data);
                        }
                    });
                }

                queryAjax(url, data, success, fail, before, after) {
                    data = data || {};
                    this.postJsonRequestAjax(
                        url,
                        'POST',
                        this.objectMerge(data, this.params),
                        success,
                        fail,
                        before,
                        after
                    );
                }

                objectMerge(a, b) {
                    return Object.assign(a, b);
                }

                messageSuccess(mes, data) {
                    return {
                        error: false,
                        message: mes,
                        data: data || {}
                    };
                }

                messageError(mes, data) {
                    return {
                        error: true,
                        message: mes,
                        data: data || {}
                    };
                }
            }

            $('editor_block')
                .prop('contentEditable', true)
                .focusin(function () {
                    let $this = $(this);
                })
                .focusout(function (e) {
                    let $this = $(this);

                    (new Request()).queryAjax('{{ route('ajax.change.lang') }}', {
                            name: $this.attr('data-name'),
                            text: $this.text()
                        }, function (data, dataRaw) {
                            console.log('Сохранено!');
                            console.log($this.text());
                        }, function () {

                        },
                        function () {
                            console.log('Сохранение');
                        }
                    );
                });

        });
    </script>
@endif
</body>
</html>
