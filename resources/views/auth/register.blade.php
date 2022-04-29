@extends('adminos.layouts.login')

@section('page-style')
    <style>
        #country-code-select {
            /*position: absolute;*/
            /*top: 10px;*/
            display: none;
        }

        .code-wrap {
            position: absolute;
            top: 5px;
            display: none;
        }

        #a{
            padding-left: 0px;
            background-color: #007aff;
        }

        #a img, .btn-select img{
            width: 12px;
        }

        #a li{
            list-style: none;
            padding-top: 5px;
            padding-bottom: 5px;

            margin-left: 5px;
            border-bottom: 1px solid white;
            color: white;
        }

        #a li:hover{
            background-color: #007aff;
        }

        #a li img{
            margin: 5px;
        }

        #a li span, .btn-select li span{
            margin-left: 10px;
        }

        .b{
            display: none;
            width: 100%;
            max-width: 350px;
            box-shadow: 0 6px 12px rgba(0,0,0,.175);
            border: 1px solid rgba(0,0,0,.15);
            border-radius: 5px;
            height: 250px;
            min-width: 250px;
            max-height: 250px;

            z-index: 1;
            position: absolute;
            overflow: auto;
        }

        .open {
            display: block !important;
        }

        .btn-select{
            max-width: 350px;
            height: 34px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #007aff;
            color: white;
        }
        .btn-select li{
            list-style: none;
            float: left;
            padding: 0px 10px 0px 10px;
        }

        .btn-select li img {
            margin-left: 3px;
        }

        .btn-select:hover li{
            margin-left: 0px;
        }

        .btn-select:hover{
            border: 1px solid transparent;
            box-shadow: inset 0 0px 0px 1px #ccc;
        }

        .btn-select:focus{
            outline:none;
        }

        [type="radio"]:checked,
        [type="radio"]:not(:checked) {
            position: absolute;
            left: -9999px;
        }
        [type="radio"]:checked + label,
        [type="radio"]:not(:checked) + label
        {
            font-family: Poppins-Regular;
            font-size: 16px;
            color: #fff;
            position: relative;
            padding-left: 28px;
            cursor: pointer;
            line-height: 20px;
            display: inline-block;
            /*color: #666;*/
        }
        [type="radio"]:checked + label:before,
        [type="radio"]:not(:checked) + label:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 18px;
            height: 18px;
            border: 1px solid #ddd;
            border-radius: 100%;
            background: #fff;
        }
        [type="radio"]:checked + label:after,
        [type="radio"]:not(:checked) + label:after {
            content: '';
            width: 12px;
            height: 12px;
            background: #007aff;
            position: absolute;
            top: 3px;
            left: 3px;
            border-radius: 100%;
            -webkit-transition: all 0.2s ease;
            transition: all 0.2s ease;
        }
        [type="radio"]:not(:checked) + label:after {
            opacity: 0;
            -webkit-transform: scale(0);
            transform: scale(0);
        }
        [type="radio"]:checked + label:after {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1);
        }

        label a {
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: white;
            text-decoration: underline;
            font-family: Poppins-Regular, sans-serif;
        }

        input[type="checkbox"]:checked {
            border: 1px solid white;
        }

        #popover-password {
            display: none;
        }

        .password .focus-input100::before {
             background: transparent !important;
        }

        .progress {
            height: 3px !important;
        }

        #result {
            color: white;
            display: flex;
            justify-content: center;
            padding: 10px;
            border-radius: 7px;
            background-color: rgba(255, 255, 255, 0.24);
        }

        b.danger, .progress-bar-danger {
            background-color: #e90f10;
        }

        b.warning, .progress-bar-warning {
            background-color: #ffad00;
        }

        b.success .progress-bar-success {
            background-color: #02b502;
        }

    </style>
@endsection

@section('content')
    <div class="wrap-login100">
        @include('adminos.partials.languages')
        <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
            @csrf
            <span class="login100-form-title p-b-34 p-t-27">
                 @if(canEditLang() && checkRequestOnEdit())
                    <editor_block data-name='Регистрация' contenteditable="true">{{ __('Регистрация') }}</editor_block>
                @else
                    {{ __('Регистрация') }}
                @endif
            </span>

            @if(canEditLang() && checkRequestOnEdit())
                <span style="color: white">Перевод для:</span> <editor_block class="white" data-name='Ваш Email' contenteditable="true">{{ __('Ваш Email') }}</editor_block>
            @endif
            <div class="wrap-input100 validate-input @error('email') alert-validate @enderror" data-validate="@error('email') {{ $message }} @enderror" @if(canEditLang() && checkRequestOnEdit()) style="margin-top: 20px" @endif>
                <input class="input100" type="text" name="email" placeholder="{{ __('Ваш Email') }}" value="{{ request()->email ?? old('email') }}">
                <span class="focus-input100" data-placeholder="&#xf132;"></span>
            </div>

            @if(canEditLang() && checkRequestOnEdit())
                <span style="color: white">Перевод для:</span> <editor_block class="white" data-name='Ваше имя' contenteditable="true">{{ __('Ваше имя') }}</editor_block>
            @endif
            <div class="wrap-input100 validate-input @error('name') alert-validate @enderror" data-validate="@error('name') {{ $message }} @enderror" @if(canEditLang() && checkRequestOnEdit()) style="margin-top: 20px" @endif>
                <input class="input100" type="text" name="name" placeholder="{{ __('Ваше имя') }}" value="{{ old('name') }}">
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>

            @if(canEditLang() && checkRequestOnEdit())
                <span style="color: white">Перевод для:</span> <editor_block class="white" data-name='Ваш логин' contenteditable="true">{{ __('Ваш логин') }}</editor_block>
            @endif
            <div class="wrap-input100 validate-input @error('login') alert-validate @enderror" data-validate="@error('login') {{ $message }} @enderror" @if(canEditLang() && checkRequestOnEdit()) style="margin-top: 20px" @endif>
                <input class="input100" type="text" name="login" placeholder="{{ __('Ваш логин') }}" value="{{ old('login') }}">
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>

            @if(canEditLang() && checkRequestOnEdit())
                <span style="color: white">Перевод для:</span> <editor_block class="white" data-name='Ваш телефон' contenteditable="true">{{ __('Ваш телефон') }}</editor_block>
            @endif

            <div class="wrap-input100 phone-input-wrap validate-input @error('phone') alert-validate @enderror" data-validate="@error('phone') {{ $message }} @enderror" @if(canEditLang() && checkRequestOnEdit()) style="margin-top: 20px" @endif>
                <div class="code-wrap">
                    <select id="country-code-select"></select>

                    <input type="hidden" id="dial_code" name="dial_code" value="">

                    <div class="code-select">
                        <button type="button" class="btn-select" value=""></button>
                        <div class="b">
                            <ul id="a"></ul>
                        </div>
                    </div>
                </div>

                <input id="phone" class="input100" type="text" name="phone" placeholder="{{ __('Ваш телефон') }}" value="{{ old('phone') }}">
                <span class="focus-input100" data-placeholder="&#xf2b9;"></span>
            </div>

            @if(canEditLang() && checkRequestOnEdit())
                <span style="color: white">Перевод для:</span> <editor_block class="white" data-name='Пароль' contenteditable="true">{{ __('Пароль') }}</editor_block>
            @endif
            <div class="password wrap-input100 validate-input @error('password') alert-validate @enderror" data-validate="@error('password') {{ $message }} @enderror" @if(canEditLang() && checkRequestOnEdit()) style="margin-top: 20px" @endif>
                <input class="input100" id="password" type="password" name="password" placeholder="{{ __('Пароль') }}" autocomplete="new-password">
                <span class="focus-input100" data-placeholder="&#xf191;"></span>

                <div id="popover-password">
                    <div class="progress">
                        <div id="password-strength"
                             class="progress-bar"
                             role="progressbar"
                             aria-valuenow="40"
                             aria-valuemin="0"
                             aria-valuemax="100"
                             style="width:0%">
                        </div>
                    </div>
                </div>
            </div>

            @if(canEditLang() && checkRequestOnEdit())
                <span style="color: white">Перевод для:</span> <editor_block class="white" data-name='Ваш пароль ненадежный' contenteditable="true">{{ __('Ваш пароль ненадежный') }}</editor_block>
            @endif

            @if(canEditLang() && checkRequestOnEdit())
                <span style="color: white">Перевод для:</span> <editor_block class="white" data-name='Ваш пароль нормальный' contenteditable="true">{{ __('Ваш пароль нормальный') }}</editor_block>
            @endif

            @if(canEditLang() && checkRequestOnEdit())
                <span style="color: white">Перевод для:</span> <editor_block class="white" data-name='Ваш пароль надежный' contenteditable="true">{{ __('Ваш пароль надежный') }}</editor_block>
            @endif

            @if(canEditLang() && checkRequestOnEdit())
                <span style="color: white">Перевод для:</span> <editor_block class="white" data-name='Подтвердите пароль' contenteditable="true">{{ __('Подтвердите пароль') }}</editor_block>
            @endif
            <div class="wrap-input100 validate-input @error('password_confirmation') alert-validate @enderror" data-validate="@error('password_confirmation') {{ $message }} @enderror" @if(canEditLang() && checkRequestOnEdit()) style="margin-top: 20px" @endif>
                <input class="input100" type="password" name="password_confirmation" placeholder="{{ __('Подтвердите пароль') }}" autocomplete="new-password">
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>

            @if(canEditLang() && checkRequestOnEdit())
                <span style="color: white">Перевод для:</span> <editor_block class="white" data-name='ID партнёра (не обязательно)' contenteditable="true">{{ __('ID партнёра (не обязательно)') }}</editor_block>
            @endif
            <div class="wrap-input100 validate-input @error('partner_id') alert-validate @enderror" data-validate="@error('partner_id') {{ $message }} @enderror" @if(canEditLang() && checkRequestOnEdit()) style="margin-top: 20px" @endif>
                <input class="input100" type="text" name="partner_id" placeholder="{{ __('ID партнёра (не обязательно)') }}" value="{{ $_COOKIE["partner_id"] ??  old('partner_id')  }}">
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>

            <div style="display: flex; justify-content: space-between; margin-bottom: 30px; color: white !important;">
                <div>
                    <label>
                        @if(canEditLang() && checkRequestOnEdit())
                            <editor_block data-name='Укажите ваш пол:' contenteditable="true">{{ __('Укажите ваш пол:') }}</editor_block>
                        @else {{ __('Укажите ваш пол:') }}@endif
                    </label>
                </div>
                <div>
                    <input type="radio" name="sex" id="test1" value="мужской" checked>
                    <label for="test1">
                        @if(canEditLang() && checkRequestOnEdit())
                            <editor_block data-name='Мужской' contenteditable="true">{{ __('Мужской') }}</editor_block>
                        @else {{ __('Мужской') }}@endif
                    </label>
                </div>

                <div>
                    <input type="radio" name="sex" id="test2" value="женский">
                    <label for="test2">
                        @if(canEditLang() && checkRequestOnEdit())
                            <editor_block data-name='Женский' contenteditable="true">{{ __('Женский') }}</editor_block>
                        @else {{ __('Женский') }}@endif
                    </label>
                </div>
            </div>

            <div style="display: flex; justify-content: space-between; margin-bottom: 30px; color: white !important;">
                <div>
                    <input type="checkbox" name="privacy-policy" value="1">
                </div>
                <div style="margin-left: 10px">
                    <label>
                        @if(canEditLang() && checkRequestOnEdit())
                            <editor_block data-name='Подтверждаю, что ознакомлен с' contenteditable="true">{{ __('Подтверждаю, что ознакомлен с') }}</editor_block>
                        @else {{ __('Подтверждаю, что ознакомлен с') }}@endif
                        <a href="https://skyline.investments/privacy-policy" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>
                            @if(canEditLang() && checkRequestOnEdit())
                                <editor_block data-name='Политикой приватности' contenteditable="true">{{ __('Политикой приватности') }}</editor_block>
                            @else {{ __('Политикой приватности') }}@endif
                        </a>
                            @if(canEditLang() && checkRequestOnEdit())
                                <editor_block data-name='этого сайта' contenteditable="true">{{ __('этого сайта') }}</editor_block>
                            @else {{ __('этого сайта') }}@endif
                    </label>
                </div>
            </div>

            @error('privacy-policy')
                <div>
                    <span style="color: red">{{ $message }}</span>
                </div>
            @enderror

            <div class="container-login100-form-btn">
                <button class="login100-form-btn" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>
                    @if(canEditLang() && checkRequestOnEdit())
                        <editor_block data-name='Регистрация' contenteditable="true">{{ __('Регистрация') }}</editor_block>
                    @else
                        {{ __('Регистрация') }}
                    @endif
                </button>
            </div>

            <div class="text-center p-t-90" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>
                <a class="txt1" href="{{ route('login') }}">
                    @if(canEditLang() && checkRequestOnEdit())
                        <editor_block data-name='Авторизоваться' contenteditable="true">{{ __('Авторизоваться') }}</editor_block>
                    @else
                        {{ __('Авторизоваться') }}
                    @endif
                </a>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script src="{{ asset('adminos/plugins/jqvmap/js/jquery.vmap.sampledata.js') }}"></script>
    <script src="//geoip-js.com/js/apis/geoip2/v2.1/geoip2.js" type="text/javascript"></script>
    <script>
        $(function () {
            // $('#phone').mask('+000000000000');

            let state = false;
            let password = document.getElementById("password");
            let passwordStrength = document.getElementById("password-strength");
            let progress = $('#popover-password');

            password.addEventListener("keyup", function(){
                let pass = document.getElementById("password").value;
                checkStrength(pass);
            });

            password.addEventListener("focus", function(){
                progress.fadeIn();

                $('.password.wrap-input100').css({'border-bottom': 'none'})
            });

            password.addEventListener("focusout", function(){
                let pass = document.getElementById("password").value;
                if(pass == '') {
                    progress.fadeOut();
                    $('.password.wrap-input100').css({'border-bottom': '2px solid rgba(255,255,255,0.24)'})
                } else {
                    progress.fadeIn();
                }
            });

            function toggle(){
                if(state){
                    document.getElementById("password").setAttribute("type","password");
                    state = false;
                }else{
                    document.getElementById("password").setAttribute("type","text")
                    state = true;
                }
            }

            function myFunction(show){
                show.classList.toggle("fa-eye-slash");
            }

            function checkStrength(password) {
                let strength = 0;

                //If password contains both lower and uppercase characters
                if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
                    strength += 1;
                }
                //If it has numbers and characters
                if (password.match(/([0-9])/)) {
                    strength += 1;
                }
                //If it has one special character
                if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
                    strength += 1;
                }
                //If password is greater than 7
                if (password.length > 7) {
                    strength += 1;
                }

                // If value is less than 2
                if (strength < 2) {
                    passwordStrength.classList.remove('progress-bar-warning');
                    passwordStrength.classList.remove('progress-bar-success');
                    passwordStrength.classList.add('progress-bar-danger');
                    passwordStrength.style = 'width: 10%';
                } else if (strength == 3) {
                    passwordStrength.classList.remove('progress-bar-success');
                    passwordStrength.classList.remove('progress-bar-danger');
                    passwordStrength.classList.add('progress-bar-warning');
                    passwordStrength.style = 'width: 60%';
                } else if (strength == 4) {
                    passwordStrength.classList.remove('progress-bar-warning');
                    passwordStrength.classList.remove('progress-bar-danger');
                    passwordStrength.classList.add('progress-bar-success');
                    passwordStrength.style = 'width: 100%';
                }
            }

            var sessionCountry = null;

            var fillInPage = (function () {
                var updateCityText = function (geoipResponse) {
                    sessionCountry = geoipResponse.country.iso_code.toLowerCase();

                    init();
                };

                var onSuccess = function (geoipResponse) {
                    updateCityText(geoipResponse);
                };

                var onError = function (error) {
                    init();

                };

                return function () {
                    if (typeof geoip2 !== 'undefined') {
                        geoip2.city(onSuccess, onError);
                    } else {
                        console.log('a browser that blocks GeoIP2 requests');
                    }
                };
            }());
            fillInPage();

            let $phone = $('#phone');

            if($phone.val().length) {
                $('.code-wrap').fadeIn('slow')
                $phone.focus();
                setTimeout(() => {
                    $phone.css({'margin-left': $('.btn-select').width() + 5})
                }, 200)
            }

            function init() {

                $phone.focus(function () {
                    $('.code-wrap').fadeIn('slow')
                    $(this).css({'margin-left': $('.btn-select').width() + 5})
                    return false;
                })

                $(document).click(function (e) {
                    if (!$(e.target).closest('.phone-input-wrap').length) {
                        $(".b").hide();
                        if(!$phone.val().length) {
                            $('.code-wrap').hide();
                            $phone.css({'margin-left': '0px'});
                        }
                    }

                    if($(e.target).closest('.btn-select').length || $(e.target).closest('.b').length) {
                        $(".b").toggle();
                        if(!$phone.val().length) {
                            $phone.css({'margin-left': '0px'});
                            $phone.focus();
                        }
                    }
                })

                var langArray = [];

                let countriesWithDial = []

                let currentLanguageIndex = 0;

                dials.map(dialCode => {
                    world_countries.map(country => {
                        if(dialCode.code.toLowerCase() === country.alpha2) {
                            let countryName = country[sessionCountry];

                            countriesWithDial.push({
                                flag:  '/adminos/img/flag-icon-css/flags/4x3/' + country.alpha2.toLowerCase() + '.svg',
                                name: countryName !== undefined ? countryName : country.ru,
                                dialCode: dialCode.dial_code,
                                code: dialCode.code.toLowerCase()
                            })
                        }
                    });
                });


                $(document).keypress(function (e) {
                    let element = $(e.target);
                    if(element.attr('id') === 'phone' && element.val().length > 10) {
                        return false;
                    }

                    if(element.attr('id') === 'phone') {
                        if(isNaN(Number(element.val()))) {
                            element.val(element.val().slice(0, -1))
                            return false;
                        }
                    }
                })

                countriesWithDial.map((country, index) => {
                    if (country.code === sessionCountry) {
                        currentLanguageIndex = index
                        $('#dial_code').attr('value', country.dialCode);
                    }

                    var img = country.flag;
                    var text = country.name + ' (' + country.dialCode + ')';
                    var value = country.dialCode;
                    var item = '<li><img src="'+ img +'" alt="" value="'+value+'"/><span>'+ text +'</span></li>';
                    langArray.push(item);
                })

                $('#a').html(langArray);

                $('.btn-select').html(langArray[currentLanguageIndex]);
                $('.btn-select').attr('value', currentLanguageIndex);

                $('#a li').click(function(){
                    var img = $(this).find('img').attr("src");
                    var value = $(this).find('img').attr('value');
                    var text = this.innerText;
                    var item = '<li><img src="'+ img +'" alt="" /><span>'+ text +'</span></li>';
                    $('.btn-select').html(item);
                    $('.btn-select').attr('value', value);
                    $('#dial_code').attr('value', value);
                    $(".b").toggle();
                    $phone.css({'margin-left': '0px'});
                    $phone.focus();

                    $phone.css({'margin-left': $('.btn-select').width() + 5});
                    return false;
                });

                if (sessionCountry){
                    var langIndex = langArray.indexOf(sessionCountry);
                    $('.btn-select').html(langArray[langIndex]);
                    $('.btn-select').attr('value', sessionCountry);
                } else {
                    var langIndex = langArray.indexOf('ru');
                    $('.btn-select').html(langArray[langIndex]);
                }
            }
        })
    </script>
@endpush
