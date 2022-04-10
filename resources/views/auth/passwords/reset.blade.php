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
        <form class="login100-form validate-form" method="POST" action="{{ route('password.update') }}">
            @csrf
            <span class="login100-form-title p-b-34 p-t-27">
                 @if(canEditLang() && checkRequestOnEdit())
                    <editor_block data-name='Подтвердите новый пароль' contenteditable="true">{{ __('Подтвердите новый пароль') }}</editor_block>
                @else
                    {{ __('Подтвердите новый пароль') }}
                @endif
            </span>

            <input type="hidden" name="token" value="{{ $token }}">

            @if(canEditLang() && checkRequestOnEdit())
                <span style="color: white">Перевод для:</span> <editor_block class="white" data-name='Email' contenteditable="true">{{ __('Email') }}</editor_block>
            @endif

            <div class="wrap-input100 validate-input @error('email') alert-validate @enderror" data-validate="@error('email') {{ $message }} @enderror" @if(canEditLang() && checkRequestOnEdit()) style="margin-top: 20px" @endif>
                <input class="input100" type="text" name="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}">
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>

            @if(canEditLang() && checkRequestOnEdit())
                <span style="color: white">Перевод для:</span> <editor_block class="white" data-name='Пароль' contenteditable="true">{{ __('Пароль') }}</editor_block>
            @endif

            <div class="wrap-input100 validate-input @error('password') alert-validate @enderror" data-validate="@error('password') {{ $message }} @enderror" @if(canEditLang() && checkRequestOnEdit()) style="margin-top: 20px" @endif>
                <input class="input100" type="password" name="password" placeholder="{{ __('Пароль') }}" autocomplete="new-password">
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>

            @if(canEditLang() && checkRequestOnEdit())
                <span style="color: white">Перевод для:</span> <editor_block class="white" data-name='Подтвердите пароль' contenteditable="true">{{ __('Подтвердите пароль') }}</editor_block>
            @endif

            <div class="wrap-input100 validate-input @error('password_confirmation') alert-validate @enderror" data-validate="@error('password_confirmation') {{ $message }} @enderror" @if(canEditLang() && checkRequestOnEdit()) style="margin-top: 20px" @endif>
                <input class="input100" type="password" name="password_confirmation" placeholder="{{ __('Подтвердите пароль') }}" autocomplete="new-password">
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>
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
