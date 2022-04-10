@extends('adminos.layouts.login')
@section('page-style')
    <style>
        .language-wrapper {
            margin-bottom: unset !important;
        }

        .card {
            background-color: #007aff;
        }

        .card, .card p {
            color: white;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>
                            @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Two Factor Authentication' contenteditable="true">{{ __('Two Factor Authentication') }}</editor_block> @else {{ __('Two Factor Authentication') }} @endif
                        </strong>
                        <div style="float: right">
                            @include('adminos.partials.languages', ['removeBackButton' => true])
                        </div>
                    </div>
                    <div class="card-body">
                        <p style="margin-bottom: 20px">
                            @if(canEditLang() && checkRequestOnEdit())
                                <editor_block data-name='Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.' contenteditable="true">
                                    {{ __('Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.') }}
                                </editor_block>
                            @else
                                {{ __('Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.') }}
                            @endif
                        </p>

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(empty($secret))
                            <form class="form-horizontal" method="POST" action="{{ route('generate2faSecret') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <button type="submit" class="login100-form-btn" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>
                                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Generate Secret Key to Enable 2FA' contenteditable="true">{{ __('Generate Secret Key to Enable 2FA') }}</editor_block> @else {{ __('Generate Secret Key to Enable 2FA') }} @endif
                                    </button>
                                </div>
                            </form>
                        @elseif(!empty($secret))
                            @if(canEditLang() && checkRequestOnEdit())
                                <editor_block data-name='1. Scan this QR code with your Google Authenticator App. Alternatively, you can use the code: ' contenteditable="true">
                                    {!! '1. Scan this QR code with your Google Authenticator App. Alternatively, you can use the code:' !!}
                                </editor_block>
                            @else
                                {!! '1. Scan this QR code with your Google Authenticator App. Alternatively, you can use the code: ' !!} <code>{{ $secret }}</code>
                            @endif
                            <br/>
                            <img style="margin-top: 20px" src="{{ $google2fa_url  }}" alt="">
                            <br/><br/>
                                @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='2. Enter the pin from Google Authenticator app:' contenteditable="true">{{ __('2. Enter the pin from Google Authenticator app:') }}</editor_block> @else {{ __('2. Enter the pin from Google Authenticator app:') }} @endif
                                <br/>
                                <br/>
                            <form class="form-horizontal" method="POST" action="{{ route('enable2fa') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('verify-code') ? ' has-error' : '' }}">
                                    <label for="secret" class="control-label">
                                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Authenticator Code' contenteditable="true">{{ __('Authenticator Code') }}</editor_block> @else {{ __('Authenticator Code') }} @endif
                                    </label>
                                    <input id="secret" type="password" class="form-control col-md-4" name="secret" required>
                                    @if ($errors->has('verify-code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('verify-code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn login100-form-btn" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>
                                    @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Enable 2FA' contenteditable="true">{{ __('Enable 2FA') }}</editor_block> @else {{ __('Enable 2FA') }} @endif
                                </button>
                            </form>
                        @elseif($secret_enabled)
                            <div class="alert alert-success">
                                @if(canEditLang() && checkRequestOnEdit())
                                    <editor_block data-name='2FA is currently <strong>enabled</strong> on your account.' contenteditable="true">
                                        {!! '2FA is currently <strong>enabled</strong> on your account.' !!}
                                    </editor_block>
                                @else
                                    {!! '2FA is currently <strong>enabled</strong> on your account.' !!}
                                @endif
                            </div>
                            <p>
                                @if(canEditLang() && checkRequestOnEdit())
                                    <editor_block data-name='If you are looking to disable Two Factor Authentication. Please confirm your password and Click Disable 2FA Button.' contenteditable="true">
                                        {{ __('If you are looking to disable Two Factor Authentication. Please confirm your password and Click Disable 2FA Button.') }}
                                    </editor_block>
                                @else
                                    {{ __('If you are looking to disable Two Factor Authentication. Please confirm your password and Click Disable 2FA Button.') }}
                                @endif
                            </p>
                            <form class="form-horizontal" method="POST" action="{{ route('disable2fa') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <label for="change-password" class="control-label">
                                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Current Password' contenteditable="true">{{ __('Current Password') }}</editor_block> @else {{ __('Current Password') }} @endif
                                    </label>
                                    <input id="current-password" type="password" class="form-control col-md-4" name="current-password" required>
                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="login100-form-btn " @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>
                                    @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Disable 2FA' contenteditable="true">{{ __('Disable 2FA') }}</editor_block> @else {{ __('Disable 2FA') }} @endif
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
