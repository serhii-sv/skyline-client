@extends('adminos.layouts.login')

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

        .form-group label {
            color: white !important;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div id="register-box" class="register-2">
            <div class="logo">
                <h1 class="logo-caption"><span class="tweak">Давайте начнем</span></h1>
            </div><!-- /.logo -->
            <div class="row d-flex justify-content-center mb-5">
                <div class="col-lg-8">
                    <div class="controls">
                    <form method="POST" action="{{ route('register') }}" class="account-form">
                        @csrf
                        <div class="form-group">
                            <label for="sign-up">Ваш Email</label>
                            <input type="text" placeholder="Ваш email" id="sign-up" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                            @error('email')
                            <div class="col-form-label text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sign-up">Ваше имя</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Ваше имя"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <div class="col-form-label text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="login">Ваш логин</label>
                            <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" placeholder="Логин"
                                   name="login" value="{{ old('login') }}" required autocomplete="name" autofocus>

                            @error('login')
                            <div class="col-form-label text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="login">Ваш телефон<br>обязательно вводите номер с кодом страны например +7 или +3</label>
                            <input id="phone" type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Телефон" value="{{ old('phone') }}"/>

                            @error('phone')
                            <div class="col-form-label text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Пароль </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="********"
                                   name="password" required autocomplete="new-password">

                            @error('password')
                            <div class="col-form-label text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Подтвердите пароль</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="********"
                                   required autocomplete="new-password">

                        </div>

                        <div class="form-group">
                            <label for="partner_id">ID партнёра (не обязательно)</label>
                            <input id="partner_id" type="text" class="form-control @error('partner_id') is-invalid @enderror" name="partner_id"
                                   value="{{ $_COOKIE["partner_id"] ??  old('partner_id')  }}" autofocus>

                            @error('partner_id')
                            <div class="col-form-label text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-default btn-block btn-custom">Зарегистрироваться</button>
                        <a href="{{ route('login') }}" title="Уже есть аккаунт?" class="btn btn-default btn-block">Авторизоваться</a>
                    </form>
                </div>
                </div>
{{--                <div class="col-lg-12 d-flex justify-content-center">--}}
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
  <!--============= Sign In Section Starts Here =============-->
@endsection

@push('js')
    <script>
        $(function () {
            $('#phone').mask('+000000000000');
        })
    </script>
@endpush
