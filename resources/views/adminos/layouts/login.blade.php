<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" data-textdirection="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('images/favicon/apple-touch-icon-152x152.png')}}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <script src="{{ asset('accountPanel/js/jquery.mask.min.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('adminos/auth/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminos/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminos/auth/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminos/auth/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminos/auth/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminos/auth/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminos/auth/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminos/auth/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminos/auth/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminos/auth/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminos/css/language.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('accountPanel/css/spinner.css') }}">

    <style>
        #particle-canvas {
            width: 100%;
            height: 100%;
            position: fixed !important;
            top: 0;
            bottom: 0;
        }

        #particle-canvas div {
            background: rgba(26, 37, 47, 0.8) !important;
        }

        .container-login100 {
            position: unset !important;
        }

        .wrap-login100 {
            z-index: 2;
        }

        .skip:before {
            background-color: #096ac9;
        }

        .skip {
            color: white;
        }

        .back {
            color: white;
            padding: 3px 15px;
            border: solid 2px #fbc800;
            border-radius: 15px;
        }

        .container, .admin-edit-lang {
            z-index: 999 !important;
        }

        .admin-edit-lang {
            position: relative;
        }

    </style>

    @yield('page-style')
</head>
<body>

<div class="limiter">
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
    @include('layouts.admin_edit_lang')
    <div class="container-login100" style="/*background-image: url('/images/bg.jpeg'); */background-color: black">
        @yield('content')
    </div>
</div>

<div id="particle-canvas"></div>

<script src="{{ asset('adminos/auth/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('adminos/plugins/popper/popper.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('adminos/auth/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('adminos/auth/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('adminos/auth/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('adminos/auth/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('adminos/auth/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('adminos/auth/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('adminos/auth/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('adminos/auth/js/main.js') }}"></script>

<script src="//code-eu1.jivosite.com/widget/eVBf13NSHN" async></script>

<script src="{{ asset('adminos/plugins/canvas-particle-network/particle-network.min.js') }}"></script>

<script>
    var canvasDiv = document.getElementById('particle-canvas');
    var options = {
        particleColor: '#fff',

        interactive: true,
        speed: 'medium',
        density: 'high'
    };
    var particleCanvas = new ParticleNetwork(canvasDiv, options);
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
<script>
    window.addEventListener("load", function(event) {
        $('.spinner-wrapper').remove()
    });
    $(function () {
        setTimeout(function () {
            $('.spinner-wrapper').remove()
        }, 4000)
    })
</script>
<script src="{{ asset('accountPanel/js/jquery.mask.min.js') }}"></script>
@stack('js')
</body>
</html>
