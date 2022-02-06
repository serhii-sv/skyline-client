@extends('adminos.layouts.login')

@section('content')
    <div class="wrap-login100">
        @include('adminos.partials.languages')
        <form class="login100-form validate-form mt-5" method="POST" action="{{ route('login.verify.code') }}">
            @include('partials.inform')
            <div class="wrap-input100 validate-input @error('code') alert-validate @enderror" data-validate="@error('code') {{ $message }} @enderror">
                <input class="input100" type="text" name="code" placeholder="Введите код из смс сообщения" value="{{ old('code') }}">
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>

            @if($last_sms)
                <div class="d-flex justify-content-center mb-4" style="color: white; font-size: 14px">
                    <span>Отправить код повторно можно будет через {{ 300 - Carbon\Carbon::parse($last_sms->created_at)->diffInSeconds(Carbon\Carbon::now()) }} секунд</span>
                </div>
            @else
                <div class="d-flex justify-content-center mb-4">
                    <a href="{{ route('login.send.verify.code') }}" class="btn btn-info">Отправить код повторно</a>
                </div>
            @endif

            @if(!auth()->user()->phone_verified)
                <div class="wrap-input100 validate-input @error('phone') alert-validate @enderror" data-validate="@error('phone') {{ $message }} @enderror">
                    <input class="input100" type="text" name="phone" placeholder="Вы можете сменить номер телефона" value="{{ old('phone') ?? auth()->user()->phone }}">
                    <span class="focus-input100" data-placeholder="&#xf2b9;"></span>
                </div>
            @endif

            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    @if(canEditLang() && checkRequestOnEdit())
                        <editor_block data-name='Подтвердить' contenteditable="true">{{ __('Подтвердить') }}</editor_block>
                    @else
                        {{ __('Подтвердить') }}
                    @endif
                </button>
            </div>
            @if(!auth()->user()->phone_verified)
                <div class="container-login100-form-btn" style="margin-top: 20px">
                    <button class="login100-form-btn skip" name="skip_code">
                        @if(canEditLang() && checkRequestOnEdit())
                            <editor_block data-name='Подтвердить позже' contenteditable="true">{{ __('Подтвердить позже') }}</editor_block>
                        @else
                            {{ __('Подтвердить позже') }}
                        @endif
                    </button>
                </div>
            @endif
        </form>
    </div>
@endsection

@push('js')

@endpush
