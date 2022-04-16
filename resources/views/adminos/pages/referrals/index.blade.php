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

        @media screen and (max-width: 620px) {
            .row.w-50 {
                width: 100% !important;
            }

            .row.w-50:nth-child(2) {
                margin-top: 30px;
            }
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
                            <div class="col-sm-12 mt-3">
                                <div class="card hovercard text-center">
{{--                                    <div class="cardheader"--}}{{-- style="background: url('{{ asset('images/crypto.png') }}') no-repeat; background-size: cover;max-height: 600px;"--}}{{--></div>--}}
{{--                                    <div class="user-image">--}}
{{--                                        <div class="avatar">--}}
{{--                                            @if(!$upliner)--}}
{{--                                                <img alt="" src="{{ $user->avatar ? route('accountPanel.profile.get.avatar', $user->id) : asset('accountPanel/images/user/user.png') }}">--}}
{{--                                            @else--}}
{{--                                                <img alt="" src="{{ $upliner->avatar ? route('accountPanel.profile.get.avatar', $upliner->id) : asset('accountPanel/images/user/user.png') }}">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="info mt-4">
                                        <div class="row ml-2">
                                            <div class="col-sm-12 col-lg-12 order-sm-1 order-xl-0">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="ttl-info text-start">
                                                            <h6>
                                                                @if(canEditLang() && checkRequestOnEdit())
                                                                    <editor_block data-name='Referral link transitions' contenteditable="true">{{ __('Referral link transitions') }}</editor_block> @else {{ __('Referral link transitions') }} @endif
                                                            </h6>
                                                            <span>{{ $referral_link_clicks ?? 0 }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 ttl-info text-start">
                                                        <h6>@if(canEditLang() && checkRequestOnEdit())
                                                                <editor_block data-name='Registered partners' contenteditable="true">{{ __('Registered partners') }}</editor_block> @else {{ __('Registered partners') }} @endif</h6>
                                                        <span>{{ $referral_link_registered }}</span>
                                                    </div>
                                                    <div class="col-md-2 ttl-info text-start">
                                                        <h6>@if(canEditLang() && checkRequestOnEdit())
                                                                <editor_block data-name='Active partners' contenteditable="true">{{ __('Active partners') }}</editor_block> @else {{ __('Active partners') }} @endif</h6>
                                                        <span>{{ $activeReferrals }}</span>
                                                    </div>


                                                    @if(!$upliner)
                                                        <div class="col-md-3 ttl-info text-start">
                                                            <h6>
                                                                @if(canEditLang() && checkRequestOnEdit())
                                                                    <editor_block data-name='Your login' contenteditable="true">{{ __('Your login') }}</editor_block> @else {{ __('Your login') }} @endif
                                                            </h6>
                                                            <span>{{ $user->login }}</span>
                                                        </div>
                                                    @else
                                                        <div class="col-md-2 ttl-info text-start">
                                                            <h6>
                                                                @if(canEditLang() && checkRequestOnEdit())
                                                                    <editor_block data-name='Your upliner' contenteditable="true">{{ __('Your upliner') }}</editor_block> @else {{ __('Your upliner') }} @endif
                                                            </h6>
                                                            <span>{{ $upliner->login }}</span>
                                                        </div>
                                                    @endif

                                                    <div class="col-md-3 ttl-info text-start">
                                                        <h6>
                                                            @if(canEditLang() && checkRequestOnEdit())
                                                                <editor_block data-name='Your referral link' contenteditable="true">{{ __('Your referral link') }}</editor_block> @else {{ __('Your referral link') }} @endif
                                                        </h6>
                                                        <span>{{ route('ref_link', $user->my_id) }}</span>

                                                        <div class="pt-2 pl-3 pr-3  d-flex justify-content-center">
                                                            <span class="pull-left" style="font-weight: bold">
                                                                 <button type="button" class="btn btn-outline-primary btn-xs" onclick="copyToClipboard()">
                                                                     @if(canEditLang() && checkRequestOnEdit())
                                                                         <editor_block data-name='Скопировать ссылку' contenteditable="true">{{ __('Скопировать ссылку') }}</editor_block>
                                                                     @else
                                                                         {{ __('Скопировать ссылку') }}
                                                                     @endif
                                                                 </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
{{--                                            <div class="col-lg-5" style="text-align: center;">--}}
{{--                                                <div class="follow">--}}
{{--                                                    <div class="row">--}}
{{--                                                        <div class="col-lg-12">--}}
{{--                                                            <div class="ttl-info text-start">--}}
{{--                                                                <h4 style="text-align: center;">--}}
{{--                                                                    <i class="fa fa-link"></i>&nbsp;&nbsp;&nbsp;@if(canEditLang() && checkRequestOnEdit())--}}
{{--                                                                        <editor_block data-name='Your referral link' contenteditable="true">{{ __('Your referral link') }}</editor_block> @else {{ __('Your referral link') }} @endif--}}
{{--                                                                </h4>--}}
{{--                                                                <h4 style="text-align: center; margin-left:45px;">{{ route('ref_link', $user->my_id) }}</h4>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">--}}
{{--                                                <div class="user-designation">--}}
{{--                                                    <div class="title">--}}
{{--                                                        <a target="_blank" href="" data-bs-original-title="" title="">@if(!$upliner) {{ $user->name }} @else {{ $upliner->name }} @endif </a>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="desc">@if(!$upliner) @if(canEditLang() && checkRequestOnEdit())--}}
{{--                                                            <editor_block data-name='Your login' contenteditable="true">{{ __('Your login') }}</editor_block> @else {{ __('Your login') }} @endif: {{ $user->login }} @else {{ $upliner->login }} @endif--}}
{{--                                                    </div>--}}
{{--                                                    <div class="desc">@if($upliner) @if(canEditLang() && checkRequestOnEdit())--}}
{{--                                                            <editor_block data-name='Your upliner' contenteditable="true">{{ __('Your upliner') }}</editor_block> @else {{ __('Your upliner') }} @endif @endif--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        <div class="ttl-info text-start">--}}
{{--                                                            <h6>--}}
{{--                                                                <i class="fa fa-location-arrow"></i>&nbsp;&nbsp;&nbsp;@if(canEditLang() && checkRequestOnEdit())--}}
{{--                                                                    <editor_block data-name='Profit amount' contenteditable="true">{{ __('Profit amount') }}</editor_block> @else {{ __('Profit amount') }} @endif--}}
{{--                                                            </h6>--}}
{{--                                                            <span>{{ number_format($personal_turnover, 2,'.', ' ') }}$</span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        <div class="ttl-info text-start">--}}
{{--                                                            <h6><i class="fa fa-calendar"></i>&nbsp;&nbsp;&nbsp;@if(canEditLang() && checkRequestOnEdit())--}}
{{--                                                                    <editor_block data-name="Partners' investment amount" contenteditable="true">{{ __("Partners' investment amount") }}</editor_block> @else {{ __("Partners' investment amount") }} @endif--}}
{{--                                                            </h6>--}}
{{--                                                            <span>{{ number_format($total_referral_invested, 2,'.', ' ') }}$</span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </div>
                                        <hr>
                                        <div class="row">
                                                <div class="row d-flex justify-content-center w-50">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-5 pr-5">
                                                        <p class="float-left">
                                                            @if(canEditLang() && checkRequestOnEdit())
                                                                <editor_block data-name='Персональный оборот' contenteditable="true">{{ __('Персональный оборот') }}</editor_block>
                                                            @else {{ __('Персональный оборот') }}@endif
                                                        </p>
                                                        <p class="float-right">{{ $nextRank ? number_format($user->personal_turnover, 2) . '$ / '. $nextRank->personal_turnover . '$ (' .  \App\Models\UserDepositBonus::getStatsPercentage($user->personal_turnover, $nextRank->personal_turnover) . '%)' : 100 . '%' }}</p>
                                                        <div class="progress" style="height: 4px; clear: both;">
                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{ $nextRank ? \App\Models\UserDepositBonus::getStatsPercentage($user->personal_turnover, $nextRank->personal_turnover) : 100 }}%"></div>
                                                        </div>
                                                        <br>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-5 pr-5 mb-4">
                                                        <p class="float-left">
                                                            @if(canEditLang() && checkRequestOnEdit())
                                                                <editor_block data-name='Оборот структуры' contenteditable="true">{{ __('Оборот структуры') }}</editor_block>
                                                            @else {{ __('Оборот структуры') }}@endif
                                                        </p>
                                                        <p class="float-right">{{ $nextRank ? number_format($user->referrals_invested_total, 2) . '$ / '. $nextRank->total_turnover . '$ (' .  \App\Models\UserDepositBonus::getStatsPercentage($user->referrals_invested_total, $nextRank->total_turnover) . '%)' : 100 . '%' }}</p>
                                                        <div class="progress" style="height: 4px; clear: both;">
                                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{ $nextRank ? \App\Models\UserDepositBonus::getStatsPercentage($user->referrals_invested_total, $nextRank->total_turnover) : 100 }}%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="row d-flex justify-content-center w-50">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-5 pr-5">
                                                    <h5>
                                                        @if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Project Descriptions' contenteditable="true">{{ __('Project Descriptions') }}</editor_block>
                                                        @else {{ __('Project Descriptions') }}@endif
                                                    </h5>
                                                    <p style="font-size: 12px">
                                                        @if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Lorem ipsum text' contenteditable="true">{{ __('Lorem ipsum text') }}</editor_block>
                                                        @else {{ __('Lorem ipsum text') }}@endif
                                                    </p>
                                                </div>
                                                <a href="https://www.youtube.com/watch?v=JTIKXvLGosU" target="_blank" class="btn btn-outline-primary" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>
                                                    @if(canEditLang() && checkRequestOnEdit())
                                                        <editor_block data-name='Презентация' contenteditable="true">{{ __('Презентация') }}</editor_block>
                                                    @else {{ __('Презентация') }}@endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <div class="w-50">
                                            <form class="form-inline mb-4 d-flex justify-content-center" action="/referrals/progress" method="get">
                                                <div class="form-group mr-3">
                                                    <label for="pwd" class="mr-3">
                                                        @if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Поиск партнеров:' contenteditable="true">{{ __('Поиск партнеров:') }}</editor_block> @else {{ __('Поиск партнеров:') }} @endif
                                                    </label>
                                                    <input type="text" name="search" class="form-control" id="pwd" value="{{ request()->search }}">
                                                </div>
                                                <button type="submit" class="btn btn-outline-primary mt-1">
                                                    @if(canEditLang() && checkRequestOnEdit())
                                                        <editor_block data-name='Поиск' contenteditable="true">{{ __('Поиск') }}</editor_block> @else {{ __('Поиск') }} @endif
                                                </button>
                                            </form>
                                        </div>
                                    </div>
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
                                                    @if(count($filteredReferrals))
                                                        @include('adminos.pages.referrals.filtered')
                                                    @elseif(cache()->has('referrals.array.' . auth()->user()->id))
                                                        @include('adminos.pages.referrals.childrens', ['us' => auth()->user(), 'level' => 0])
                                                    @endif
                                                    </tbody>
                                                </table>
                                                <div class="f1-buttons mb-4" style="text-align: center; margin-top:50px;">
                                                    <button class="btn btn-outline-primary btn-next" type="button" style="padding:15px 50px 15px 50px; font-size:21px;" onClick="location.assign('/referrals/progress?page={{ request()->has('page') && request('page') >= 2 ? request('page') - 1 : 1 }}')"> Предыдущая страница</button>
                                                    <button class="btn btn-outline-primary btn-next" type="button" style="padding:15px 50px 15px 50px; font-size:21px;" onClick="location.assign('/referrals/progress?page={{ request()->has('page') ? request('page') + 1 : 2 }}')"> Следующая страница</button>
                                                </div>
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

@push('scripts')
    <script>
        function copyToClipboard() {
            var inputc = document.body.appendChild(document.createElement("input"));
            inputc.value = '{{ route('ref_link', auth()->user()->my_id) }}';
            // inputc.focus();
            inputc.select();
            document.execCommand('copy');
            inputc.parentNode.removeChild(inputc);
            (new PNotify({
                type: 'success',
                text: 'Ссылка скопирована!'
            })).get();

            return false;
        }
    </script>
@endpush
