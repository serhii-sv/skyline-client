@extends('adminos.layouts.account')
@section('title')
    Referrals page
@endsection
@push('styles')
    <style>


        .best-seller-table table tbody tr td {
            vertical-align: middle;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            position: relative;
            font-weight: 500
        }

        .best-seller-table table tbody tr td .flag-icon {
            font-size: 18px;
            position: relative;
            display: inline-block;
            width: 1.33333em;
            line-height: 1em
        }

        .best-seller-table table tbody tr td p {
            font-size: 11px;
            color: rgba(43, 43, 43, 0.8);
            -webkit-transition: 0.5s;
            transition: 0.5s
        }

        .best-seller-table table tbody tr td .label {
            padding: 0px;
            color: #2b2b2b !important;
            border-radius: 10px;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            font-size: 13px
        }

        .best-seller-table table tbody tr td .align-middle {
            position: relative
        }

        .best-seller-table table tbody tr td .align-middle .status-circle {
            width: 10px;
            height: 10px;
            top: 2px;
            left: 32px;
            opacity: 0;
            -webkit-transition: 0.5s;
            transition: 0.5s
        }

        .best-seller-table table tbody tr:last-child td {
            padding-bottom: 0
        }

        .img-40 {
            width: 40px !important;
            height: auto !important;
        }

        .social-media {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .user-profile .hovercard .info .title a {
            color: #242934;
            font-size: 20px;
            font-weight: 500;
        }

        .ttl-info span, .social-media h5, .follow .ttl-info h2, .follow .ttl-info h4 {
            font-weight: bold !important;
        }

        .card.hovercard .cardheader {
            height: 400px !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('adminos/css/profile/profile.css') }}">
@endpush
@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <!--Page Content-->
                <div class="wrapper wrapper-content">
                    {{ Breadcrumbs::render('referrals.progress') }}
                    <div class="user-profile">
                        <div class="row">
                            <!-- user profile first-style start-->
                            <div class="col-sm-12 mt-5">
                                <div class="card hovercard text-center">
{{--                                    <div class="cardheader"--}}{{-- style="background: url('{{ asset('images/crypto.png') }}') no-repeat; background-size: cover;max-height: 600px;"--}}{{--></div>--}}
                                    <div class="user-image">
                                        <div class="avatar">
                                            @if(!$upliner)
                                                <img alt="" src="{{ $user->avatar ? route('accountPanel.profile.get.avatar', $user->id) : asset('accountPanel/images/user/user.png') }}">
                                            @else
                                                <img alt="" src="{{ $upliner->avatar ? route('accountPanel.profile.get.avatar', $upliner->id) : asset('accountPanel/images/user/user.png') }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="ttl-info text-start">
                                                            <h6>@if(canEditLang() && checkRequestOnEdit())
                                                                    <editor_block data-name='Referral link transitions' contenteditable="true">{{ __('Referral link transitions') }}</editor_block> @else {{ __('Referral link transitions') }} @endif
                                                            </h6>
                                                            <span>{{ $referral_link_clicks ?? 0 }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ttl-info text-start">
                                                        <h6>@if(canEditLang() && checkRequestOnEdit())
                                                                <editor_block data-name='Registered partners' contenteditable="true">{{ __('Registered partners') }}</editor_block> @else {{ __('Registered partners') }} @endif</h6>
                                                        <span>{{ $referral_link_registered }}</span>
                                                    </div>
                                                    <div class="col-md-4 ttl-info text-start">
                                                        <h6>@if(canEditLang() && checkRequestOnEdit())
                                                                <editor_block data-name='Active partners' contenteditable="true">{{ __('Active partners') }}</editor_block> @else {{ __('Active partners') }} @endif</h6>
                                                        <span>{{ $activeReferrals }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                                                <div class="user-designation">
                                                    <div class="title">
                                                        <a target="_blank" href="" data-bs-original-title="" title="">@if(!$upliner) {{ $user->name }} @else {{ $upliner->name }} @endif </a>
                                                    </div>
                                                    <div class="desc">@if(!$upliner) @if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Your login' contenteditable="true">{{ __('Your login') }}</editor_block> @else {{ __('Your login') }} @endif: {{ $user->login }} @else {{ $upliner->login }} @endif
                                                    </div>
                                                    <div class="desc">@if($upliner) @if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Your upliner' contenteditable="true">{{ __('Your upliner') }}</editor_block> @else {{ __('Your upliner') }} @endif @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="ttl-info text-start">
                                                            <h6>
                                                                <i class="fa fa-location-arrow"></i>&nbsp;&nbsp;&nbsp;@if(canEditLang() && checkRequestOnEdit())
                                                                    <editor_block data-name='Profit amount' contenteditable="true">{{ __('Profit amount') }}</editor_block> @else {{ __('Profit amount') }} @endif
                                                            </h6>
                                                            <span>{{ number_format($personal_turnover, 2,'.', ' ') }}$</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="ttl-info text-start">
                                                            <h6><i class="fa fa-calendar"></i>&nbsp;&nbsp;&nbsp;@if(canEditLang() && checkRequestOnEdit())
                                                                    <editor_block data-name="Partners' investment amount" contenteditable="true">{{ __("Partners' investment amount") }}</editor_block> @else {{ __("Partners' investment amount") }} @endif
                                                            </h6>
                                                            <span>{{ number_format($total_referral_invested, 2,'.', ' ') }}$</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="social-media">
                                                    <h5>@if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Share your referral link on social media' contenteditable="true">{{ __('Share your referral link on social media') }}</editor_block> @else {{ __('Share your referral link on social media') }} @endif
                                                    </h5>
                                                    <script src="https://yastatic.net/share2/share.js"></script>
                                                    <div class="ya-share2" data-url="{{ route('ref_link', auth()->user()->my_id) }}" data-curtain data-size="l" data-color-scheme="whiteblack" data-services="vkontakte,facebook,telegram,twitter,viber,whatsapp,skype,linkedin"></div>

                                                </div>
                                            </div>
                                            <div class="col-lg-6" style="text-align: center;">
                                                <div class="follow">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="ttl-info text-start">
                                                                <h2 style="text-align: center;"><i class="fa fa-link"></i>&nbsp;&nbsp;&nbsp;@if(canEditLang() && checkRequestOnEdit())
                                                                        <editor_block data-name='Your referral link' contenteditable="true">{{ __('Your referral link') }}</editor_block> @else {{ __('Your referral link') }} @endif
                                                                </h2>
                                                                <h4 style="text-align: center; margin-left:45px;">{{ route('ref_link', $user->my_id) }}</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="best-seller-table responsive-tbl">
                                    <div class="item">
                                        <div class="table-responsive product-list">
                                            <table class="table table-bordernone">
                                                <thead>
                                                <tr>
                                                    <th class="f-22">
                                                        @if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='User acc' contenteditable="true">{{ __('User acc') }}</editor_block> @else {{ __('User acc') }} @endif
                                                    </th>
                                                    <th>@if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Telephone acc' contenteditable="true">{{ __('Telephone acc') }}</editor_block> @else {{ __('Telephone acc') }} @endif
                                                    </th>
                                                    <th>@if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Date/Time of registration acc' contenteditable="true">{{ __('Date/Time of registration acc') }}</editor_block> @else {{ __('Date/Time of registration acc') }} @endif
                                                    </th>
                                                    <th>@if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Upliner login acc' contenteditable="true">{{ __('Upliner login acc') }}</editor_block> @else {{ __('Upliner login acc') }} @endif
                                                    </th>
                                                    <th>@if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Invested acc' contenteditable="true">{{ __('Invested acc') }}</editor_block> @else {{ __('Invested acc') }} @endif
                                                    </th>
                                                    <th>@if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Reward acc 3' contenteditable="true">{{ __('Reward acc 3') }}</editor_block> @else {{ __('Reward acc 3') }} @endif
                                                    </th>
                                                    <th>@if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Accruals acc' contenteditable="true">{{ __('Accruals acc') }}</editor_block> @else {{ __('Accruals acc') }} @endif
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(cache()->has('referrals.array.' . auth()->user()->id))
                                                    @include('adminos.pages.referrals.childrens', ['us' => auth()->user(), 'level' => 0])
                                                @endif
                                                </tbody>
                                            </table>
                                            <div class="f1-buttons mb-4" style="text-align: center; margin-top:50px;">
                                                <button class="btn btn-primary btn-next" type="button" style="padding:15px 50px 15px 50px; font-size:21px;" onClick="location.assign('/referrals/progress?page={{ request()->has('page') && request('page') >= 2 ? request('page') - 1 : 1 }}')"> Предыдущая страница</button>
                                                <button class="btn btn-primary btn-next" type="button" style="padding:15px 50px 15px 50px; font-size:21px;" onClick="location.assign('/referrals/progress?page={{ request()->has('page') ? request('page') + 1 : 2 }}')"> Следующая страница</button>
                                            </div>
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
