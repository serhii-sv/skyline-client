@extends('adminos.layouts.login')

@section('content')
  {{-- @include('layouts.app-preloader')--}}
  <style>
      .form-group label, form span{
          color: white !important;
      }

      form span {
          font-size: 16px;
          margin-bottom: 5px;
      }
  </style>
  <div class="container">
      <div id="login-box2">
          <div class="row d-flex justify-content-center">
              <div class="col-lg-7">
                  <form method="POST" action="{{ route('login.verify.code') }}" class="account-form">
                      @csrf
                      <input type="hidden" name="g-recaptcha-response" id="recaptcha">
                      <div class="form-group">
                          <label for="sign-up">Введите код из смс сообщения</label>
                          <input id="email" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" autofocus>

                          @error('code')
                          <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>

                      <div class="form-group">
                      @if($last_sms)
                          <span>Отправить код повторно можно будет через {{ 300 - Carbon\Carbon::parse($last_sms->created_at)->diffInSeconds(Carbon\Carbon::now()) }} секунд</span>
                      @else
                          <a href="{{ route('login.send.verify.code') }}" class="btn btn-info">Отправить код повторно</a>
                      @endif
                      </div>

                      @if(!auth()->user()->phone_verified)
                          <div class="form-group">
                              <label for="sign-up">Вы можете сменить номер телефона</label>
                              <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? auth()->user()->phone }}">
                          </div>
                      @endif

                      <div class="form-group text-center">
                          <button type="submit" class="mt-2 mb-2 btn btn-default btn-block btn-custom">Подтвердить</button>

                          @if(!auth()->user()->phone_verified)
                              <button type="submit" name="skip_code" class="mt-2 mb-2 btn btn-default">Подтвердить позже</button>
                          @endif
                      </div>
                  </form>
              </div>
          </div>
      </div><!-- /#login-box -->
  </div><!-- /.container -->
@endsection

@push('js')

@endpush
