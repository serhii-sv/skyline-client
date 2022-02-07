@extends('adminos.layouts.login')

@section('page-style')
    <style>
        .form-group label {
            color: white !important;
        }
    </style>
@endsection

@section('content')
    {{--@include('layouts.app-preloader')--}}
    <div class="wrap-login100">
        @include('adminos.partials.languages')
        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
            @csrf
            <span class="login100-form-title p-b-34 p-t-27">
                 @if(canEditLang() && checkRequestOnEdit())
                    <editor_block data-name='Сброс пароля' contenteditable="true">{{ __('Сброс пароля') }}</editor_block>
                @else
                    {{ __('Сброс пароля') }}
                @endif
            </span>

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="wrap-input100 validate-input @error('email') alert-validate @enderror" data-validate="@error('email') {{ $message }} @enderror">
                <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>

            <div class="wrap-input100 validate-input @error('password') alert-validate @enderror" data-validate="@error('password') {{ $message }} @enderror">
                <input class="input100" type="password" name="password" placeholder="Пароль" autocomplete="new-password">
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>

            <div class="wrap-input100 validate-input @error('password_confirmation') alert-validate @enderror" data-validate="@error('password_confirmation') {{ $message }} @enderror">
                <input class="input100" type="password" name="password_confirmation" placeholder="Подтвердите пароль" autocomplete="new-password">
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    @if(canEditLang() && checkRequestOnEdit())
                        <editor_block data-name='Reset Password' contenteditable="true">{{ __('Reset Password') }}</editor_block>
                    @else
                        {{ __('Reset Password') }}
                    @endif
                </button>
            </div>
        </form>
    </div>
@endsection
