@extends('adminos.layouts.account')
@section('title')
    Edit profile
@endsection

@push('styles')
    <style>
        .media {
            align-items: flex-start !important;
        }

        .user-image {
            margin-left: 20px;
        }

        .hidden {
            display: none;
        }

        .preview {
            width: 100%;
            height: auto;
        }
        #profileUpdateForm {
            padding: 20px;
        }
        .avatar {
            margin-left: 10px;
        }
    </style>
@endpush

@section('content')
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <!--Page Content-->
                    <div class="wrapper wrapper-content">
                        {{ Breadcrumbs::render('settings.profile') }}
                        <div class="row card">
                            <div class="col-xl-12">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Editing a profile' contenteditable="true">{{ __('Editing a profile') }}</editor_block> @else {{ __('Editing a profile') }} @endif</h4>
                                        <div class="card-options">
                                            <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse">
                                                <i class="fe fe-chevron-up"></i></a>
                                            <a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                                    class="fe fe-x"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('accountPanel.profile.update.photo') }}" id="avatarForm" enctype="multipart/form-data" method="post" class="text-center d-flex justify-content-center card p-3">
                                            @csrf
                                            <div class="avatar ">
                                                <label class="position-relative" style="cursor: pointer;">
                                                    <input type="file" name="avatar"
                                                           class="profile-avatar-input d-none">
                                                        <img class="avatar-image img-100 rounded-circle" alt=""
                                                             src="{{ auth()->user()->getAvatar() }}"
                                                             data-old="{{ auth()->user()->getAvatar() }}">
                                                </label>
                                            </div>
                                            <div>
                                                <button type="button" id="saveAvatar" class="btn btn-pill btn-outline-success btn-xs ml-2" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>
                                                    @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Save photo' contenteditable="true">{{ __('Save photo') }}</editor_block> @else {{ __('Save photo') }} @endif
                                                </button>
                                                <a href="{{ route('accountPanel.profile.delete.photo') }}" class="btn btn-pill btn-outline-danger btn-xs ml-2" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>
                                                    @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Удалить фото' contenteditable="true">{{ __('Удалить фото') }}</editor_block> @else {{ __('Удалить фото') }} @endif
                                                </a>
                                            </div>
                                        </form>
                                        <form class="card" id="profileUpdateForm" method="post" action="{{ route('accountPanel.profile.update') }}">
                                            @csrf
                                            {{ method_field('PUT') }}
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                @include('partials.inform')
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Login' contenteditable="true">{{ __('Login') }}</editor_block> @else {{ __('Login') }} @endif</label>
                                                    <input class="form-control" type="text" name="login"
                                                           value="{{ $user->login ?? '' }}" placeholder="Username">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Email' contenteditable="true">{{ __('Email') }}</editor_block> @else {{ __('Email') }} @endif</label>
                                                    <input class="form-control" type="text" name="email"
                                                           value="{{ $user->email ?? '' }}" placeholder="your-email@domain.com">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Name' contenteditable="true">{{ __('Name') }}</editor_block> @else {{ __('Name') }} @endif</label>
                                                    <input class="form-control" type="text" name="name"
                                                           value="{{ $user->name ?? '' }}" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Telephone' contenteditable="true">{{ __('Telephone') }}</editor_block> @else {{ __('Telephone') }} @endif</label>
                                                    <input class="form-control" type="text" id="phone" name="phone"
                                                           value="{{ $user->phone ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Gender' contenteditable="true">{{ __('Gender') }}</editor_block> @else {{ __('Gender') }} @endif</label>
                                                    <select class="form-control" name="sex" type="text">
                                                        <option value="">Не выбран</option>
                                                        <option value="мужской"
                                                                @if($user->sex == 'мужской') selected="selected" @endif>Мужской
                                                        </option>
                                                        <option value="женский"
                                                                @if($user->sex == 'женский') selected="selected" @endif>Женский
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Skype' contenteditable="true">{{ __('Skype') }}</editor_block> @else {{ __('Skype') }} @endif</label>
                                                    <input class="form-control" type="text" name="skype"
                                                           value="{{ $user->skype ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Telegram' contenteditable="true">{{ __('Telegram') }}</editor_block> @else {{ __('Telegram') }} @endif</label>
                                                    <input class="form-control" type="text" name="telegram"
                                                           value="{{ $user->telegram ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Index' contenteditable="true">{{ __('Index') }}</editor_block> @else {{ __('Index') }} @endif</label>
                                                    <input class="form-control" type="text" name="index"
                                                           value="{{ $user->index ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Country' contenteditable="true">{{ __('Country') }}</editor_block> @else {{ __('Country') }} @endif</label>
                                                    <input class="form-control" type="text" name="country_manual"
                                                           value="{{ $user->country_manual ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='City' contenteditable="true">{{ __('City') }}</editor_block> @else {{ __('City') }} @endif</label>
                                                    <input class="form-control" type="text" name="city_manual"
                                                           value="{{ $user->city_manual ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                            <div class="w-20">
                                                <button class="btn btn-outline-primary" id="saveProfileData" type="button">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Save' contenteditable="true">{{ __('Save') }}</editor_block> @else {{ __('Save') }} @endif</button>
                                            </div>
                                        </form>
                                    </div>
                                <div class="row p-3">
                                    <div class="col-sm-12 col-xl-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Payment system details' contenteditable="true">{{ __('Payment system details') }}</editor_block> @else {{ __('Payment system details') }} @endif</h5>
                                            </div>
                                            <div class="card-body">
                                                @include('partials.inform')
                                                <div class="row">
                                                    <div class="col-sm-3 tabs-responsive-side">
                                                        <div class="nav flex-column nav-pills border-tab nav-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                            @forelse($wallets as $wallet)
                                                                <?php
                                                                /** @var \App\Models\Currency $currency */
                                                                $currency = $wallet->currency;
                                                                $walletName = $currency->name;
                                                                if ($currency->code == 'USD') {
                                                                    $walletName = 'PerfectMoney / Payeer';
                                                                } elseif ($currency->code == 'UAH') {
                                                                    $walletName = 'UAH VISA/MASTERCARD';
                                                                } elseif ($currency->code == 'RUB') {
                                                                    $walletName = 'RUB VISA/MC / QIWI';
                                                                } elseif ($currency->code == 'KZT') {
                                                                    $walletName = 'KZT VISA/MASTERCARD';
                                                                } elseif ($currency->code == 'EUR') {
                                                                    $walletName = 'EUR VISA/MASTERCARD';
                                                                }
                                                                ?>
                                                                <a class="nav-link @if($loop->first) active @endif" id="v-pills-{{ $wallet->id }}-tab" data-bs-toggle="pill" href="#v-pills-{{ $wallet->id }}" role="tab" aria-controls="v-pills-{{ $wallet->id }}">{{ $walletName }}</a>
                                                            @empty
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="tab-content" id="v-pills-tabContent">
                                                            @forelse($wallets as $wallet)
                                                                <div class="tab-pane fade @if($loop->first) active show @endif" id="v-pills-{{ $wallet->id }}" role="tabpanel" aria-labelledby="v-pills-{{ $wallet->id }}-tab">

                                                                    <form action="{{ route('accountPanel.profile.wallet.details.update') }}" method="post" class="mb-3">
                                                                        @csrf
                                                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                                        <input type="hidden" name="wallet_id" value="{{ $wallet->id }}">
                                                                        <input type="hidden" name="currency_id" value="{{ $wallet->currency->id }}">

                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="">
                                                                                    <label>@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Wallet external {{ $wallet->currency_id }}' contenteditable="true">{{ __('Wallet external '.$wallet->currency_id) }}</editor_block> @else {{ __('Wallet external '.$wallet->currency_id) }} @endif</label>
                                                                                    <input class="form-control input-air-primary" type="text" name="external" value="{{ $wallet->external ?? '' }}" placeholder="" data-bs-original-title="" title="">
                                                                                </div>

                                                                                @if($wallet->currency->code == 'USD')
                                                                                    <div style="margin-top:30px;">
                                                                                        <label>@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Wallet external Payeer' contenteditable="true">{{ __('Wallet Payeer') }}</editor_block> @else {{ __('Wallet external Payeer') }} @endif</label>
                                                                                        <input class="form-control input-air-primary" type="text" name="external_payeer" value="{{ $wallet->external_payeer ?? '' }}" placeholder="" data-bs-original-title="" title="">
                                                                                    </div>
                                                                                @endif

                                                                                @if($wallet->currency->code == 'RUB')
                                                                                    <div style="margin-top:30px;">
                                                                                        <label>@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Wallet external Qiwi' contenteditable="true">{{ __('Wallet Qiwi') }}</editor_block> @else {{ __('Wallet external Qiwi') }} @endif</label>
                                                                                        <input class="form-control input-air-primary" type="text" name="external_qiwi" value="{{ $wallet->external_qiwi ?? '' }}" placeholder="" data-bs-original-title="" title="">
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            @if($wallet->currency->code == 'USD' || $wallet->currency->code == 'RUB')
                                                                                <div style="clear:both; margin:20px 0 20px 0;"></div>
                                                                            @endif
                                                                            <div class="col align-self-end">
                                                                                <button class="btn btn-outline-success">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Save' contenteditable="true">{{ __('Save') }}</editor_block> @else {{ __('Save') }} @endif</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            @empty
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-3">
                                    <div class="col-xl-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">
                                                    @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Общие' contenteditable="true">{{ __('Общие') }}</editor_block> @else {{ __('Общие') }} @endif
                                                </h4>
                                                <div class="card-options">
                                                    <a class="card-options-collapse" href="#"
                                                       data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                    <a
                                                        class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                                            class="fe fe-x"></i></a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-check checkbox checkbox-success mb-3 ml-3">
                                                    <input class="form-check-input" type="checkbox" name="ffa_field"
                                                           data-bs-original-title="" title="" id="ffa_field" @if($fa_field) checked="checked" @endif>
                                                    <label class="form-check-label" for="ffa_field">
                                                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Исползовать двух-факторную аутентификацию' contenteditable="true">{{ __('Исползовать двух-факторную аутентификацию') }}</editor_block> @else {{ __('Исползовать двух-факторную аутентификацию') }} @endif
                                                    </label>
                                                </div>
                                                <div class="form-footer">
                                                    <button class="btn btn-outline-primary btn-block" id="ffa_save">
                                                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Применить изменения' contenteditable="true">{{ __('Применить изменения') }}</editor_block> @else {{ __('Применить изменения') }} @endif
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="card">
                                            <div class="card-header pb-2">
                                                <h4 class="card-title mb-0">
                                                    @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Пароль' contenteditable="true">{{ __('Пароль') }}</editor_block> @else {{ __('Пароль') }} @endif
                                                </h4>
                                                <div class="card-options">
                                                    <a class="card-options-collapse" href="#"
                                                       data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                    <a
                                                        class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                                            class="fe fe-x"></i></a>
                                                </div>
                                            </div>
                                            <div class="card-body pt-2">
                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Введите старый пароль' contenteditable="true">{{ __('Введите старый пароль') }}</editor_block> @else {{ __('Введите старый пароль') }} @endif
                                                    </label>
                                                    <input class="form-control" id="password_old_field" type="password" name="password_old">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Введите новый пароль' contenteditable="true">{{ __('Введите новый пароль') }}</editor_block> @else {{ __('Введите новый пароль') }} @endif
                                                    </label>
                                                    <input class="form-control" id="password_field" type="password" name="password">
                                                </div>
                                                <div class="form-footer">
                                                    <button class="btn btn-outline-primary btn-block" id="password_save">
                                                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Сменить пароль' contenteditable="true">{{ __('Сменить пароль') }}</editor_block> @else {{ __('Сменить пароль') }} @endif
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="panel-box">
                                            <div class="panel-box-title" style="background-color: #007aff; color: white">
                                                <h5>@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Login history' contenteditable="true">{{ __('Login history') }}</editor_block> @else {{ __('Login history') }} @endif</h5>
                                            </div>
                                            <div class="panel-box-content years-timeline pt-2">
                                                <ul>
                                                    @forelse($auth_log as $item)
                                                        <li><a href="#">ip: {{ $item->ip }} ({{ $item->created_at->format('H:i:s d.F.Y') }})</a></li>
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('adminos.partials.footer')
                </div>
            </div>
        </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#phone').mask('+000000000000');
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        console.log(e.target.result)
                        $('.avatar-image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $('.avatar-image').attr('src', $('.avatar-image').attr('data-old'));
                }
            }

            $(".profile-avatar-input").change(function () {
                readURL(this);
            });

            $('#saveProfileData').click(function () {
                $('#profileUpdateForm').submit();
            })

            $('#saveAvatar').click(function () {
                $('#avatarForm').submit();
            })
        });
    </script>
    <script>
        $(document).ready(() => {
            $('#phone').mask('+000000000000');
            $("#password_save").click((e) => {
                e.preventDefault();

                $.ajax({
                    url: "{{route('accountPanel.settings.setPassword')}}",
                    type: 'post',
                    data: [
                        '#password_old_field',
                        '#password_field'
                    ]
                        .map((val) => $(val).attr('name') + "=" + $(val).val())
                        .reduce((accum, next) => accum + "&" + next),
                    success: (response) => {
                        var $data = $.parseJSON(response);
                        if ($data['status'] == 'good') {
                            (new PNotify({
                                type: 'success',
                                text: $data['msg'],
                            })).get();

                            $('#password_field').val('');
                            $('#password_old_field').val('');
                        } else {
                            (new PNotify({
                                type: 'error',
                                text: $data['msg'],
                            })).get();
                        }
                    },
                })
            });

            $("#ffa_save").click((e) => {
                e.preventDefault();

                $.ajax({
                    url: "{{route('accountPanel.settings.set2FA')}}",
                    type: 'post',
                    data: 'ffa_field=' + $('#ffa_field').is(':checked'),
                    success: (response) => {
                        console.log(response);

                        if (response.result === 'redirect')
                            window.location.replace(response.to);

                        (new PNotify({
                            type: 'success',
                            text: '<strong>Данные обновлены</strong> 2FA был изменен',
                        })).get();
                    }
                })
            })
        });
    </script>
@endpush
