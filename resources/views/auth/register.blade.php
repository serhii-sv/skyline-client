@extends('adminos.layouts.login')

@section('content')
    <div class="wrap-login100">
        <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
            @csrf
            <span class="login100-form-title p-b-34 p-t-27">
                Регистрация
            </span>

            <div class="wrap-input100 validate-input @error('email') alert-validate @enderror" data-validate="@error('email') {{ $message }} @enderror">
                <input class="input100" type="text" name="email" placeholder="Ваш Email" value="{{ old('email') }}">
                <span class="focus-input100" data-placeholder="&#xf132;"></span>
            </div>

            <div class="wrap-input100 validate-input @error('name') alert-validate @enderror" data-validate="@error('name') {{ $message }} @enderror">
                <input class="input100" type="text" name="name" placeholder="Ваше имя" value="{{ old('name') }}">
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>

            <div class="wrap-input100 validate-input @error('login') alert-validate @enderror" data-validate="@error('login') {{ $message }} @enderror">
                <input class="input100" type="text" name="login" placeholder="Ваш логин" value="{{ old('login') }}">
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>

            <div class="wrap-input100 validate-input @error('phone') alert-validate @enderror" data-validate="@error('phone') {{ $message }} @enderror">
                <input id="phone" class="input100" type="text" name="phone" placeholder="Ваш телефон" value="{{ old('phone') }}">
                <span class="focus-input100" data-placeholder="&#xf2b9;"></span>
            </div>

            <div style="margin-top: -20px; margin-bottom: 20px;">
                <span style="color: red">*</span><span style="font-size: 12px; color: #fff">Обязательно вводите номер с кодом страны например +7 или +3</span>
            </div>

            <div class="wrap-input100 validate-input @error('password') alert-validate @enderror" data-validate="@error('password') {{ $message }} @enderror">
                <input class="input100" type="password" name="password" placeholder="Пароль" autocomplete="new-password">
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>

            <div class="wrap-input100 validate-input @error('password_confirmation') alert-validate @enderror" data-validate="@error('password_confirmation') {{ $message }} @enderror">
                <input class="input100" type="password" name="password_confirmation" placeholder="Подтвердите пароль" autocomplete="new-password">
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>

            <div class="wrap-input100 validate-input @error('partner_id') alert-validate @enderror" data-validate="@error('partner_id') {{ $message }} @enderror">
                <input class="input100" type="text" name="partner_id" placeholder="ID партнёра (не обязательно)" value="{{ $_COOKIE["partner_id"] ??  old('partner_id')  }}">
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    Войти
                </button>
            </div>

            <div class="text-center p-t-90">
                <a class="txt1" href="{{ route('login') }}">
                    Авторизоваться
                </a>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script>
        $(function () {
            $('#phone').mask('+000000000000');
        })
    </script>
@endpush
