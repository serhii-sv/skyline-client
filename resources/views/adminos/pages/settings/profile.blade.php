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
            position: relative;
        }

        .hidden {
            display: none;
        }

        .preview {
            width: 100%;
            height: auto;
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
                        @include('adminos.partials.breadcrumbs')
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-header pb-3 pt-3">
                                        <h4 class="card-title mb-0">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='My Profile' contenteditable="true">{{ __('My Profile') }}</editor_block> @else {{ __('My Profile') }} @endif</h4>
                                        <div class="card-options">
                                            <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse">
                                                <i class="fe fe-chevron-up"></i>
                                            </a>
                                            <a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                                    class="fe fe-x"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body pt-3">
                                        <div class="row mb-4">
                                            <div class="profile-title">
                                                <div class="media">
                                                    <div class="user-image">
                                                        <form action="{{ route('accountPanel.profile.update.photo') }}" enctype="multipart/form-data" method="post" class="text-center d-flex justify-content-center">
                                                            @csrf
                                                            <div class="avatar ">
                                                                <label class="position-relative" style="cursor: pointer;">
                                                                    <input type="file" name="avatar"
                                                                           class="profile-avatar-input d-none">
                                                                    @if(auth()->user()->avatar)
                                                                        <img class="avatar-image img-100 rounded-circle" alt=""
                                                                             src="{{ route('accountPanel.profile.get.avatar', auth()->user()->id) }}"
                                                                             data-old="{{ route('accountPanel.profile.get.avatar', auth()->user()->id) }}">
                                                                    @else
                                                                        <img class="avatar-image img-100 rounded-circle" alt=""
                                                                             src="{{ asset('accountPanel/images/user/user.png') }}"
                                                                             data-old="{{ asset('accountPanel/images/user/user.png') }}">
                                                                    @endif
                                                                    <button type="submit" class="btn btn-pill btn-success btn-air-success btn-xs ml-2" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>
                                                                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Save photo' contenteditable="true">{{ __('Save photo') }}</editor_block> @else {{ __('Save photo') }} @endif
                                                                    </button>
                                                                </label>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Investor' contenteditable="true">{{ __('Investor') }}</editor_block> @else {{ __('Investor') }} @endif</label>
                                            <p><strong>{{ $user->name ?? '' }}</strong></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Email' contenteditable="true">{{ __('Email') }}</editor_block> @else {{ __('Email') }} @endif</label>
                                            <p><strong>{{ $user->email ?? 'Не указан' }}</strong></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Telephone' contenteditable="true">{{ __('Telephone') }}</editor_block> @else {{ __('Telephone') }} @endif</label>
                                            <p><strong>{{ $user->phone ?? 'Не указан' }}</strong></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Skype' contenteditable="true">{{ __('Skype') }}</editor_block> @else {{ __('Skype') }} @endif</label>
                                            <p><strong>{{ $user->skype ?? 'Не указан' }}</strong></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Telegram' contenteditable="true">{{ __('Telegram') }}</editor_block> @else {{ __('Telegram') }} @endif</label>
                                            <p><strong>{{ $user->telegram ?? 'Не указан' }}</strong></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Gender' contenteditable="true">{{ __('Gender') }}</editor_block> @else {{ __('Gender') }} @endif</label>
                                            <p><strong>{{ $user->sex ?? 'Не указан' }}</strong></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Country' contenteditable="true">{{ __('Country') }}</editor_block> @else {{ __('Country') }} @endif</label>
                                            <p><strong>{{ $user->country_manual ?? 'Не указана' }}</strong></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='City' contenteditable="true">{{ __('City') }}</editor_block> @else {{ __('City') }} @endif</label>
                                            <p><strong>{{ $user->city_manual ?? 'Не указан' }}</strong></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Referral link' contenteditable="true">{{ __('Referral link') }}</editor_block> @else {{ __('Referral link') }} @endif</label>
                                            <p><strong>{{ route('ref_link', $user->my_id) }}</strong></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <form class="card" method="post" action="{{ route('accountPanel.profile.update') }}">
                                    @csrf
                                    {{ method_field('PUT') }}
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
                                    </div>
                                    <div class="card-footer text-end">
                                        <button class="btn btn-primary" type="submit">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Save' contenteditable="true">{{ __('Save') }}</editor_block> @else {{ __('Save') }} @endif</button>
                                    </div>
                                </form>
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
        });
    </script>
@endpush
