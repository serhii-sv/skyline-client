{{-- layout --}}
@extends('adminos.layouts.login')

{{-- page title --}}
@section('title', 'User Login')

{{-- page content --}}
@section('content')
<div class="wrap-login100">
    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
        <input type="hidden" name="g-recaptcha-response" id="recaptcha">
        @csrf
        <span class="login100-form-logo">
            <img width="70" src="/images/user/user-icon.png" class="img-responsive lock-screen-img center-block" alt="image"/>
        </span>
        <span class="login100-form-title p-b-34 p-t-27">
            Авторизация
        </span>

        @error('g-recaptcha-response')
            <div class="col-form-label text-danger">{{ $message }}</div>
        @enderror

        <div class="wrap-input100 validate-input @error('email') alert-validate @enderror" data-validate="@error('email') {{ $message }} @enderror">
            <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
        </div>

        <div class="wrap-input100 validate-input @error('password') alert-validate @enderror" data-validate="@error('password') {{ $message }} @enderror">
            <input class="input100" type="password" name="password" placeholder="Пароль" value="{{ old('password') }}">
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
        </div>

        <div class="contact100-form-checkbox">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
            <label class="label-checkbox100" for="ckb1">
                Запомнит меня
            </label>
        </div>

        <div class="container-login100-form-btn">
            <button class="login100-form-btn">
                Войти
            </button>
        </div>

        <div class="text-center p-t-90">
            <a class="txt1" href="{{ route('register') }}">
                Зарегистрироваться
            </a>
        </div>

        <div class="text-center">
            <a class="txt1" href="{{ route('password.request') }}">
                Забыли пароль?
            </a>
        </div>
    </form>
</div>
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
