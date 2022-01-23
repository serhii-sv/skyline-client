@extends('adminos.layouts.login')

@section('page-style')
    <style>
        .form-group label {
            color: white !important;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div id="login-box">
            <div class="logo">
                <h1 class="logo-caption">
                    <span class="tweak">
                         @if(canEditLang() && checkRequestOnEdit())
                            <editor_block data-name='Сброс пароля' contenteditable="true">{{ __('Сброс пароля') }}</editor_block>
                        @else
                            {{ __('Сброс пароля') }}
                        @endif
                    </span>
                </h1>
                <p>
                    @if(canEditLang() && checkRequestOnEdit())
                        <editor_block data-name='Добро пожаловать в Skyline' contenteditable="true">{{ __('Добро пожаловать в Skyline') }}</editor_block>
                    @else
                        {{ __('Добро пожаловать в Skyline') }}
                    @endif
                </p>
            </div><!-- /.logo -->
            @if (session('status'))
                <div class="alert alert-success background-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="icofont icofont-close-line-circled text-white"></i>
                    </button>
                    <strong>{{ session('status') }}</strong>
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}" class="account-form">
                @csrf
                <div class="controls">
                    <form method="POST" action="{{ route('password.email') }}" class="account-form">
                        @csrf
                        <div class="form-group">
                            <label for="sign-up">
                                @if(canEditLang() && checkRequestOnEdit())
                                    <editor_block data-name='Your Email' contenteditable="true">{{ __('Your Email) }}</editor_block>
                                @else
                                    {{ __('Your Email') }}
                                    @endif
                            </label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <div class="col-form-label text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-default btn-block btn-custom">
                            @if(canEditLang() && checkRequestOnEdit())
                                <editor_block data-name='Send Password Reset Link' contenteditable="true">{{ __('Send Password Reset Link') }}</editor_block>
                            @else
                                {{ __('Send Password Reset Link') }}
                            @endif
                        </button>
                    </form>
                </div><!-- /.controls -->
            </form>
        </div><!-- /#login-box -->
    </div><!-- /.container -->
@endsection
