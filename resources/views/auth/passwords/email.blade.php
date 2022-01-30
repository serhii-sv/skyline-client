@extends('adminos.layouts.login')

@section('content')
    <div class="wrap-login100">
        <form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <span class="login100-form-title p-b-34 p-t-27">
                 @if(canEditLang() && checkRequestOnEdit())
                    <editor_block data-name='Сброс пароля'
                                  contenteditable="true">{{ __('Сброс пароля') }}</editor_block>
                @else
                    {{ __('Сброс пароля') }}
                @endif
            </span>

            @if (session('status'))
                <div class="alert alert-success background-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="icofont icofont-close-line-circled text-white"></i>
                    </button>
                    <strong>{{ session('status') }}</strong>
                </div>
            @endif

            <div class="wrap-input100 validate-input @error('email') alert-validate @enderror" data-validate="@error('email') {{ $message }} @enderror">
                <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    @if(canEditLang() && checkRequestOnEdit())
                        <editor_block data-name='Send Password Reset Link'
                                      contenteditable="true">{{ __('Send Password Reset Link') }}</editor_block>
                    @else
                        {{ __('Send Password Reset Link') }}
                    @endif
                </button>
            </div>
        </form>
    </div>
@endsection
