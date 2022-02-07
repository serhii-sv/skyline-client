{{-- layout --}}
@extends('adminos.layouts.login')

{{-- page title --}}
@section('title', 'User Login')

{{-- page content --}}
@section('content')
<div class="wrap-login100">
    @include('adminos.partials.languages')
    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
        <input type="hidden" name="g-recaptcha-response" id="recaptcha">
        @csrf
        <span class="login100-form-logo">
            <img width="70" src="/images/user/user-icon.png" class="img-responsive lock-screen-img center-block" alt="image"/>
        </span>
        <span class="login100-form-title p-b-34 p-t-27">
             @if(canEditLang() && checkRequestOnEdit())
                <editor_block data-name='Авторизация' contenteditable="true">{{ __('Авторизация') }}</editor_block>
            @else
                {{ __('Авторизация') }}
            @endif
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
                @if(canEditLang() && checkRequestOnEdit())
                    <editor_block data-name='Запомнит меня' contenteditable="true">{{ __('Запомнит меня') }}</editor_block>
                @else
                    {{ __('Запомнит меня') }}
                @endif
            </label>
        </div>

        <div class="container-login100-form-btn">
            <button class="login100-form-btn">
                @if(canEditLang() && checkRequestOnEdit())
                    <editor_block data-name='Войти' contenteditable="true">{{ __('Войти') }}</editor_block>
                @else
                    {{ __('Войти') }}
                @endif
            </button>
        </div>

        <div class="text-center p-t-90">
            <a class="txt1" href="{{ route('register') }}">
                @if(canEditLang() && checkRequestOnEdit())
                    <editor_block data-name='Зарегистрироваться' contenteditable="true">{{ __('Зарегистрироваться') }}</editor_block>
                @else
                    {{ __('Зарегистрироваться') }}
                @endif
            </a>
        </div>

        <div class="text-center">
            <a class="txt1" href="{{ route('password.request') }}">
                @if(canEditLang() && checkRequestOnEdit())
                    <editor_block data-name='Забыли пароль?' contenteditable="true">{{ __('Забыли пароль?') }}</editor_block>
                @else
                    {{ __('Забыли пароль?') }}
                @endif
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
