@extends('adminos.layouts.account')
@section('title')
    Security settings
@endsection

@push('styles')
    <link href="{{ asset('adminos/css/social/wall.css') }}" rel="stylesheet">
@endpush

@section('content')
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <!--Page Content-->
                    <div class="wrapper wrapper-content">
                        @include('adminos.partials.breadcrumbs')
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body pb-4 pt-4">
                                        <h4 class="card-title mb-4">@if(canEditLang() && checkRequestOnEdit())
                                                <editor_block data-name='Verify phone' contenteditable="true">{{ __('Verify phone') }}</editor_block> @else {{ __('Verify phone') }} @endif
                                        </h4>
                                        <form action="{{ route('accountPanel.settings.update.phone') }}" method="post">
                                            @csrf
                                            <div class="mt-3 mb-3">@include('partials.inform')</div>
                                            <div class="mb-3">
                                                <label class="form-label">Номер телефона:</label>
                                                <input class="form-control input-air-primary" id="phone" name="phone" value="{{ $user->phone ?? '' }}">
                                            </div>
                                            <button class="btn btn-primary">Сохранить</button>
                                        </form>
                                        @if($verification_enable == 'on')
                                            <div class="mt-4">
                                                @if($user->phone_verified)
                                                    <div class="d-flex align-items-center mb-3">
                                                        Статус:
                                                        <i data-feather="check" class="" style="margin: 0 5px; color: #1eb000"></i>
                                                        Верифицирован
                                                    </div>
                                                @else
                                                    <div class="d-flex align-items-center mb-3">
                                                        Статус:
                                                        <i data-feather="x" style="margin: 0 5px;color: #c40033"></i>
                                                        Не верифицирован
                                                    </div>
                                                    <a href="{{ route('accountPanel.settings.send.verify.code') }}" class="btn btn-success @if(!$user->phone) disabled @endif">Верифицировать</a>
                                                    <div class="text-danger mt-2">@if(!$user->phone) Нужно указать телефон! @endif</div>
                                                @endif
                                            </div>
                                            @if($user->phone_verified)
                                                <div class="mt-4">
                                                    <form action="{{ route('accountPanel.settings.auth.with.phone') }}" method="post">
                                                        @csrf
                                                        <div class="mb-3">Вход</div>
                                                        <div class="form-check radio radio-primary">
                                                            <input class="form-check-input" id="radio1" type="radio" name="auth_with_phone" value="0" @if($user->auth_with_phone == false) checked @endif>
                                                            <label class="form-check-label" for="radio1">Без кода на телефон</label>
                                                        </div>
                                                        <div class="form-check radio radio-primary">
                                                            <input class="form-check-input" id="radio2" type="radio" name="auth_with_phone" value="1" @if($user->auth_with_phone == true) checked @endif>
                                                            <label class="form-check-label" for="radio2">С кодом на телефон</label>
                                                        </div>
                                                        <button class="btn btn-success">Сохранить</button>
                                                    </form>
                                                </div>
                                            @endif
                                        @else
                                            <div class="mt-3">Верификация отключена</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:50px;">
                            <div class="col-xl-5">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Общие</h4>
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
                                            <label class="form-check-label" for="ffa_field">исползовать двух-факторную
                                                аутентификацию</label>
                                        </div>
                                        <div class="form-footer">
                                            <button class="btn btn-primary btn-block" id="ffa_save">Применить изменения</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="card">
                                    <div class="card-header pb-2">
                                        <h4 class="card-title mb-0">Пароль</h4>
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
                                            <label class="form-label">Введите старый пароль</label>
                                            <input class="form-control" id="password_old_field" type="password" name="password_old">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Введите новый пароль</label>
                                            <input class="form-control" id="password_field" type="password" name="password">
                                        </div>
                                        <div class="form-footer">
                                            <button class="btn btn-primary btn-block" id="password_save">Сменить пароль</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-md-12">
                                <div class="panel-box">
                                    <div class="panel-box-title bg-info">
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
                    @include('adminos.partials.footer')
                </div>
            </div>
        </div>

@endsection

@push('scripts')
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
                            $.notify('<i class="fa fa-bell-o"></i><strong>Данные обновлены!</strong> ' + $data['msg'], {
                                type: 'theme',
                                allow_dismiss: true,
                                delay: 3000,
                                showProgressbar: true,
                                timer: 300,
                                animate: {
                                    enter: 'animated fadeInDown',
                                    exit: 'animated fadeOutUp'
                                }
                            });

                            $('#password_field').val('');
                            $('#password_old_field').val('');
                        } else {
                            $.notify('<i class="fa fa-bell-o"></i><strong>Ошибка!</strong> ' + $data['msg'], {
                                type: 'theme',
                                allow_dismiss: true,
                                delay: 3000,
                                showProgressbar: true,
                                timer: 300,
                                animate: {
                                    enter: 'animated fadeInDown',
                                    exit: 'animated fadeOutUp'
                                }
                            });
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

                        $.notify('<i class="fa fa-bell-o"></i><strong>Данные обновлены</strong> 2FA был изменен', {
                            type: 'theme',
                            allow_dismiss: true,
                            delay: 2000,
                            showProgressbar: true,
                            timer: 300,
                            animate: {
                                enter: 'animated fadeInDown',
                                exit: 'animated fadeOutUp'
                            }
                        });
                    }
                })
            })
        });
    </script>
@endpush
