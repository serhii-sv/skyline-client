<!DOCTYPE html>
<html lang="en" data-textdirection="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('images/favicon/apple-touch-icon-152x152.png')}}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link href="{{ asset('adminos/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="{{ asset('adminos/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('adminos/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('adminos/css/authentication/login.css') }}">
    <!--Google Font APIS CSS-->
    <link rel="stylesheet" href="{{ asset('adminos/font-googleapis/Nunito.css') }}">
    <link rel="stylesheet" href="{{ asset('adminos/font-googleapis/PoiretOne.css') }}">
    <script src="{{ asset('accountPanel/js/jquery.mask.min.js') }}"></script>

    @yield('page-style')
</head>
<body class="default-theme">
@yield('content')
<script src="{{ asset('adminos/plugins/jquery/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('adminos/plugins/popper/popper.min.js') }}"></script>
<script src="{{ asset('adminos/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

@if(auth()->check() && (!(auth()->user()->country) || !(auth()->user()->city) || !(auth()->user()->ip)))
    <script src="//geoip-js.com/js/apis/geoip2/v2.1/geoip2.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            var cityName, country, ip;
            var fillInPage = (function () {
                var updateCityText = function (geoipResponse) {
                    cityName = geoipResponse.city.names.ru || 'your city';
                    country = geoipResponse.country.names.ru || 'your country';
                    ip = geoipResponse.traits.ip_address || 'ip';
                    $.ajax({
                        type: 'post',
                        async: true,
                        url: '{{ route('ajax.set.user.location') }}',
                        data: 'country=' + country + '&city=' + cityName + '&ip=' + ip,
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {
                            data = $.parseJSON(data);
                            console.log(data);
                        }
                    });
                };

                var onSuccess = function (geoipResponse) {
                    updateCityText(geoipResponse);
                };

                var onError = function (error) {
                    console.log(error);
                };

                return function () {
                    if (typeof geoip2 !== 'undefined') {
                        geoip2.city(onSuccess, onError);
                    } else {
                        console.log('a browser that blocks GeoIP2 requests');
                    }
                };
            }());
            fillInPage();
        });
    </script>
@endif
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
@stack('js')
</body>
</html>
