@extends('adminos.layouts.login')
@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">
                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Two Factor Authentication' contenteditable="true">{{ __('Two Factor Authentication') }}</editor_block> @else {{ __('Two Factor Authentication') }} @endif
                    </div>
                    <div class="card-body">
                        <p>
                            @if(canEditLang() && checkRequestOnEdit())
                                <editor_block data-name='Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.' contenteditable="true">
                                    {{ __('Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.') }}
                                </editor_block>
                            @else
                                {{ __('Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.') }}
                            @endif
                        </p>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Enter the pin from Google Authenticator app:' contenteditable="true">{{ __('Enter the pin from Google Authenticator app:') }}</editor_block> @else {{ __('Enter the pin from Google Authenticator app:') }} @endif
                        <br/><br/>
                        <form class="form-horizontal" action="{{ route('2faVerify') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('one_time_password-code') ? ' has-error' : '' }}">
                                <label for="one_time_password" class="control-label">
                                    @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='One Time Password' contenteditable="true">{{ __('One Time Password') }}</editor_block> @else {{ __('One Time Password') }} @endif
                                </label>
                                <input id="one_time_password" name="one_time_password" class="form-control col-md-4"  type="text" required/>
                            </div>
                            <button class="btn btn-primary" type="submit">
                                @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Authenticate' contenteditable="true">{{ __('Authenticate') }}</editor_block> @else {{ __('Authenticate') }} @endif
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
