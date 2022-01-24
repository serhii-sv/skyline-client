{{-- layout --}}
@extends('adminos.layouts.login')

{{-- page title --}}
@section('title', 'User Login')

@section('page-style')
    <style>
        .col-form-label {
            padding-top: calc(-0.325rem + 1px);
            text-align: left;
            padding-bottom: calc(0.875rem + 1px);
        }
        .form-control-danger {
            border-color: #FF0000 !important;
            color: #FF0000 !important;
        }
        .controls input {
            margin-bottom: 10px;
        }

        .logo img {
            background: rgba(48, 46, 45, 1);
        }
    </style>
    <style>
        body {
            height: 100%;
        }
    </style>

@endsection
{{-- page content --}}
@section('content')
    <div class="container">
        <div id="login-box2">
            <div class="logo">
                <img src="/images/user/user-icon.png" class="img-responsive lock-screen-img center-block" alt="image"/>
                <h1 class="logo-caption"><span class="tweak">Авторизация</span></h1>
                <p>Добро пожаловать в Skyline</p>
            </div><!-- /.logo -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-7">
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        <input type="hidden" name="g-recaptcha-response" id="recaptcha">
                        @error('g-recaptcha-response')
                        <div class="col-form-label text-danger">{{ $message }}</div>
                        @enderror
                        @csrf
                        <div class="controls">
                            <input id="email" type="text" class=" @error('email') form-control-danger @enderror form-control" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus placeholder="Email">
                            @error('email')
                            <div class="col-form-label text-danger">{{ $message }}</div>
                            @enderror
                            <input id="password" type="password" class="@error('password') form-control-danger @enderror form-control" name="password" autocomplete="current-password" placeholder="Пароль">
                            @error('password')
                            <div class="col-form-label text-danger">{{ $message }}</div>
                            @enderror
{{--                            <div class="checkbox checkbox-pad text-white pull-left">--}}
{{--                                <input type="checkbox" name="remember" id="remember" checked> <span class=" remember-color">Remember login</span>--}}
{{--                            </div>--}}
                            <button type="submit" class="btn btn-default btn-block btn-custom">Войти</button>
                            <div class="login-footer">
                                <a href="{{ route('register') }}" title="Нет аккаунта?" class="pull-left">Зарегистрируйтесь</a>
                                <a href="{{ route('password.request') }}" title="Забыли пароль?" class="pull-right">Забыли пароль?</a>
                            </div>
                        </div><!-- /.controls -->
                    </form>
                </div>
{{--                <div class="col-lg-5">--}}
{{--                    <div class="social-controls">--}}
{{--                        <a href="{{ $google_auth_url }}" class="social-btns btn btn-google">--}}
{{--                            <i class="fa fa-google-plus pull-left mt-1" aria-hidden="true"></i>--}}
{{--                            Авторизоваться через Google--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div><!-- /#login-box -->
    </div><!-- /.container -->
@endsection
@push('js')
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('recaptchav3.sitekey') }}"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('{{ config('recaptchav3.sitekey') }}', {action: 'login'}).then(function (token) {
                if (token) {
                    document.getElementById('recaptcha').value = token;
                }
            });
        });
    </script>
@endpush
