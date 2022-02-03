@extends('adminos.layouts.account')
@section('title')
    Account
@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('accountPanel/css/vendors/icofont.css') }}">

    <!-- And also Add Flag-Icon CSS Library -->
    <link rel="stylesheet" href="{{ asset('adminos/img/flag-icon-css/css/flag-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('adminos/plugins/jqvmap/css/jqvmap.css') }}">
    <link rel="stylesheet" href="{{ asset('adminos/plugins/bootstrap4-editable/css/bootstrap-editable.css') }}">

    <style>
        .earning-card.card .card-body .inner-top-left ul li, .earning-card.card .card-body .inner-top-right ul li {
            margin-right: 20px;
        }

        .dashboard-video-list {
            max-height: 350px;
            overflow: hidden auto;
        }

        .dashboard-video-list iframe {
            max-width: 100%;
        }

        .earning-card.card .card-body {
            overflow: hidden
        }

        .earning-card.card .card-body .chart-left {
            padding: 40px 0 40px 40px
        }

        .earning-card.card .card-body .chart-right {
            padding: 0 40px
        }

        .earning-card.card .card-body .chart-right .weekly-data {
            padding-bottom: 40px
        }

        .earning-card.card .card-body .chart-right .p-tb {
            padding: 40px 0
        }

        .earning-card.card .card-body .left_side_earning {
            margin-bottom: 30px
        }

        .earning-card.card .card-body .left_side_earning:last-child {
            margin-bottom: 0
        }

        .earning-card.card .card-body .left_side_earning h5 {
            line-height: 36px;
            font-weight: 500;
            margin: 0;
            font-size: 1rem
        }

        .earning-card.card .card-body .left_side_earning p {
            font-size: 14px;
            color: rgba(43, 43, 43, 0.7)
        }

        .earning-card.card .card-body .left-btn a.btn {
            padding: 10px 16px
        }

        .earning-card.card .card-body .inner-top-left ul li, .earning-card.card .card-body .inner-top-right ul li {
            line-height: 22px;
            color: rgba(43, 43, 43, 0.7);
            font-weight: 500;
            margin-left: 35px;
            letter-spacing: 1px
        }

        .earning-card.card .card-body .inner-top-left ul li.active, .earning-card.card .card-body .inner-top-right ul li.active {
            color: #7366FFFF
        }

        .earning-card.card .card-body .inner-top-left ul li:first-child {
            margin-left: 0
        }

        .earning-card.card .card-body .inner-top-right ul li {
            position: relative
        }

        .earning-card.card .card-body .inner-top-right ul li:before {
            content: "";
            position: absolute;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #7366FFFF;
            left: -40%;
            top: 27%
        }

        .earning-card.card .card-body .inner-top-right ul li:last-child:before {
            background-color: #dc3545
        }

        .earning-card.card .card-body .border-top {
            border-top: 1px solid #ecf3fa !important;
            padding: 38px 40px 37px
        }

        .earning-card.card .card-body .earning-content {
            border-right: 1px solid #ecf3fa
        }

        .earning-card.card .card-body .media .media-left {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background-color: #7366FFFF;
            margin-right: 15px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            color: #fff;
            cursor: pointer
        }

        .earning-card.card .card-body .media .media-left:nth-child(1) {
            color: #fff !important
        }

        .earning-card.card .card-body .media .media-left.secondary {
            background-color: #dc3545 !important
        }

        .earning-card.card .card-body .media .media-left i {
            font-size: 18px;
            -webkit-transition: 0.3s all linear;
            transition: 0.3s all linear
        }

        .earning-card.card .card-body .media .media-left:hover {
            -webkit-animation: tada 1.5s ease infinite;
            animation: tada 1.5s ease infinite
        }

        .earning-card.card .card-body .media .media-body h6 {
            margin-bottom: 2px;
            line-height: 24px
        }

        .earning-card.card .card-body .media .media-body p {
            font-size: 14px;
            color: rgba(43, 43, 43, 0.7)
        }

        .dashboard-video-list {
            padding-left: 0;
            list-style: none;
        }

        #pills-darkhome-tab .panel-body, #pills-darkprofile-tab .panel-body {
            padding: 20px 0 0 0;
        }

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

        .widget .usage-icon {
            top: -40px
        }

        .balances .col-xs-12 {
            margin-top: 30px;
        }

        .text-white {
            white-space: nowrap;
        }

        h6.text-white {
            white-space: unset;
        }
    </style>
@endpush
@section('content')
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <!--Page Content-->
                    <div class="wrapper wrapper-content">
                        {{ Breadcrumbs::render('dashboard') }}
                        <div class="col-12">
                            @if(!empty($wallets))
                                @php
                                    $colors = ['statistic-bg-purple', 'statistic-bg-info', 'statistic-bg-red', 'statistic-bg-yellow']
                                @endphp
                                <div class="row">
                                    @forelse($wallets as $items)
                                        @foreach($items as $key => $item)
                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                                <div class="panel-box {{ $colors[$loop->index] }} radius">
                                                    <div class="panel-box-content">
                                                        <div class="row">
                                                            <div class="col-6 statistic-box">
                                                                <h5 class="text-white">{{ $item->currency->symbol }}{{ number_format($item->balance) ?? 0 }}</h5>
                                                                <h6 class="m-b-0 text-white">{{ $item->currency->name }}</h6>
                                                            </div>
                                                            <div class="col-6 pl-1 pl-2 statistic-charts pt-3">
                                                                <div class="sparkline" data-wallet_id="{{ $item->id }}">
                                                                    <canvas width="94" height="40" style="display: inline-block; width: 100%; height: 40px; vertical-align: top;"></canvas>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 statistic-footer">
                                                                <p class="text-white"><i class="feather icon-clock f-14"></i>
                                                                    @if(canEditLang() && checkRequestOnEdit())
                                                                        <editor_block data-name='update' contenteditable="true">{{ __('update') }}</editor_block>
                                                                    @else {{ __('update') }}@endif: {{ $item->updated_at->format('H:i Y-m-d') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @empty
                                    @endforelse
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
                                <div class="panel-box">
                                    <div class="panel-box-title">
                                        <h5>
                                            @if(canEditLang() && checkRequestOnEdit())
                                                <editor_block data-name='by last 7 days' contenteditable="true">{{ __('by last 7 days') }}</editor_block>
                                            @else {{ __('by last 7 days') }}@endif
                                        </h5>
                                    </div>
                                    <div class="panel-box-content">
                                        <div id="visitor" style="height:317px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                <div class="panel-box">
                                    <div class="col-12 text-center panel-box-title">
                                        <h6>
                                            @if(canEditLang() && checkRequestOnEdit())
                                                <editor_block data-name='Текущие показатели' contenteditable="true">{{ __('Текущие показатели') }}</editor_block>
                                            @else {{ __('Текущие показатели') }}@endif
                                        </h6>
                                    </div>
                                    <div class="panel-box-content">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <div class="col-12">
                                                    <div class="mt-2">
                                                        <input type="text" class="dial" value="{{ round($rankPercentage, 1) }}" data-width="100" data-height="100" data-linecap="round" data-displayprevious="true" data-displayinput="true" data-readonly="true" data-fgcolor="#fe9365">
                                                    </div>
                                                    @if(!is_null($nextRank))
                                                        <p>
                                                            @if(canEditLang() && checkRequestOnEdit())
                                                                <editor_block data-name='Следующий Ранг' contenteditable="true">{{ __('Следующий Ранг') }}</editor_block>
                                                            @else {{ __('Следующий Ранг') }}@endif
                                                        </p>
                                                        <h6 class="yellow-link-color">
                                                            @if(canEditLang() && checkRequestOnEdit())
                                                                <editor_block data-name='{{ $nextRank->status_stage . ' ' . $nextRank->status_name }}' contenteditable="true">{{ __($nextRank->status_stage . ' ' . $nextRank->status_name) }}</editor_block>
                                                            @else {{ __($nextRank->status_stage . ' ' . $nextRank->status_name) }}@endif
                                                        </h6>
                                                    @else
                                                        <div class="yellow-link-color"></div>
                                                    @endif
                                                </div>
                                                <div class="pt-1 pl-3 pr-3">
                                                    <span class="pull-left">
                                                        @if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Персональный оборот' contenteditable="true">{{ __('Персональный оборот') }}</editor_block>
                                                        @else {{ __('Персональный оборот') }}@endif
                                                    </span>
                                                    @if(!is_null($nextRank))
                                                        <span class="pull-right">{{ $user->personal_turnover }}/{{ $nextRank->personal_turnover }} ({{ \App\Models\UserDepositBonus::getStatsPercentage($user->personal_turnover, $nextRank->personal_turnover) }}%)</span>
                                                        <div class="progress" style="height: 4px; clear: both;">
                                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:{{ \App\Models\UserDepositBonus::getStatsPercentage($user->personal_turnover, $nextRank->personal_turnover) }}%;"></div>
                                                        </div>
                                                    @else
                                                        <span class="pull-right">{{ $user->personal_turnover }}</span>
                                                        <div class="progress" style="height: 4px; clear: both;">
                                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="pt-2 pl-3 pr-3">
                                                    <span class="pull-left">
                                                        @if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Оборот структуры' contenteditable="true">{{ __('Оборот структуры') }}</editor_block>
                                                        @else {{ __('Оборот структуры') }}@endif
                                                    </span>
                                                    @if(!is_null($nextRank))
                                                        <span class="pull-right">{{ $user->referrals_invested_total }}/{{ $nextRank->total_turnover }} ({{ \App\Models\UserDepositBonus::getStatsPercentage($user->referrals_invested_total, $nextRank->total_turnover) }}%)</span>
                                                        <div class="progress" style="height: 4px; clear: both;">
                                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:{{ \App\Models\UserDepositBonus::getStatsPercentage($user->referrals_invested_total, $nextRank->total_turnover) }}%;"></div>
                                                        </div>
                                                    @else
                                                        <span class="pull-right">{{ $user->personal_turnover }}</span>
                                                        <div class="progress" style="height: 4px; clear: both;">
                                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="pt-2 pl-3 pr-3 mt-4">
                                                    <span class="pull-left">
                                                         @if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Ваша реферальная ссылка:' contenteditable="true">{{ __('Ваша реферальная ссылка:') }}</editor_block>
                                                        @else
                                                            {{ __('Ваша реферальная ссылка:') }}
                                                        @endif
                                                    </span>
                                                </div>

                                                <div class="pt-2 pl-3 pr-3 mt-1">
                                                    <span class="pull-left" style="font-weight: bold">
                                                         {{ route('ref_link', $user->my_id) }}
                                                    </span>
                                                </div>

                                                <div class="pt-2 pl-3 pr-3 mt-5">
                                                    <span class="pull-left" style="font-weight: bold">
                                                         <button type="button" class="btn btn-primary btn-xs" onclick="copyToClipboard()">
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
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="panel-box">
                                    <div class="panel-box-title">
                                        <h5>Monthly Earnings</h5>
                                    </div>
                                    <div class="panel-box-content">
                                        <canvas id="canvas" style="width:100%; height:400px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row second-chart-list third-news-update balances">

                            <div class="col-xl-12 xl-100 box-col-12">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header pt-4 pb-4">
                                                <h4 class="mb-0">@if(canEditLang() && checkRequestOnEdit())
                                                        <editor_block data-name='Last 5 transactions' contenteditable="true">{{ __('Last 5 transactions') }}</editor_block>
                                                    @else {{ __('Last 5 transactions') }}@endif</h4>
                                            </div>
                                            <div class="card-body pt-3 pb-3">
                                                <div class="table-responsive">
                                                    <div class="item">
                                                        <div class="table-responsive product-list">
                                                            <table class="table table-bordernone">
                                                                <thead>
                                                                <tr>
                                                                    <th>@if(canEditLang() && checkRequestOnEdit())
                                                                            <editor_block data-name='Type of transaction' contenteditable="true">{{ __('Type of transaction') }}</editor_block>
                                                                        @else {{ __('Type of transaction') }}@endif</th>
                                                                    <th>@if(canEditLang() && checkRequestOnEdit())
                                                                            <editor_block data-name='Amount' contenteditable="true">{{ __('Amount') }}</editor_block>
                                                                        @else {{ __('Amount') }}@endif</th>
                                                                    <th>@if(canEditLang() && checkRequestOnEdit())
                                                                            <editor_block data-name='Payment system' contenteditable="true">{{ __('Payment system') }}</editor_block>
                                                                        @else {{ __('Payment system') }}@endif</th>
                                                                    <th>@if(canEditLang() && checkRequestOnEdit())
                                                                            <editor_block data-name='Status operation' contenteditable="true">{{ __('Status operation') }}</editor_block>
                                                                        @else {{ __('Status operation') }}@endif</th>
                                                                    <th class="">@if(canEditLang() && checkRequestOnEdit())
                                                                            <editor_block data-name='Date of operation' contenteditable="true">{{ __('Date of operation') }}</editor_block>
                                                                        @else {{ __('Date of operation') }}@endif</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @if(isset($transactions) && !empty($transactions))
                                                                    @foreach($transactions as $transaction)
                                                                        <tr style="vertical-align: middle;">
                                                                            <td>
                                                                                @if(canEditLang() && checkRequestOnEdit())
                                                                                    <editor_block data-name='{{ 'locale.' . $transaction->type->name }}' contenteditable="true">{{ __('locale.' . $transaction->type->name) }}</editor_block> @else {{ __('locale.' . $transaction->type->name) }}@endif
                                                                                {{-- {{ __('locale.' . $transaction->type->name) ?? 'Не указано' }}--}}</td>
                                                                            <td>
                                                                                <span class="">{{$transaction->currency->symbol}} {{ number_format($transaction->amount, $transaction->currency->precision, '.', ',') ?? 0 }}</span>
                                                                                @if(!preg_match('/USD/', $transaction->currency->code))
                                                                                    <br>
                                                                                    <span class="badge rounded-pill pill-badge-info">$ {{ number_format($transaction->main_currency_amount, 2, '.', ',') ?? 0 }}</span>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                {{ $transaction->paymentSystem->name ?? $transaction->currency->code }}
                                                                            </td>
                                                                            <td>@switch($transaction->approved)
                                                                                    @case(1)
                                                                                    <span class="btn-success p-2 ps-4 pe-4" style="display: inline-block; min-width: 200px;text-align: center">@if(canEditLang() && checkRequestOnEdit())
                                                                                            <editor_block data-name='Confirmed' contenteditable="true">{{ __('Confirmed') }}</editor_block>
                                                                                        @else {{ __('Confirmed') }}@endif</span>
                                                                                    @break
                                                                                    @case(2)
                                                                                    <span class="btn-danger p-2 ps-4 pe-4" style="display: inline-block; min-width: 200px;text-align: center">@if(canEditLang() && checkRequestOnEdit())
                                                                                            <editor_block data-name='Rejected' contenteditable="true">{{ __('Rejected') }}</editor_block>
                                                                                        @else {{ __('Rejected') }}@endif</span>
                                                                                    @break
                                                                                    @default
                                                                                    <span class="btn-light p-2 ps-4 pe-4" style="display: inline-block; min-width: 200px;text-align: center">@if(canEditLang() && checkRequestOnEdit())
                                                                                            <editor_block data-name='Not confirmed' contenteditable="true">{{ __('Not confirmed') }}</editor_block>
                                                                                        @else {{ __('Not confirmed') }}@endif</span>
                                                                                    @break
                                                                                @endswitch</td>
                                                                            <td>{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 appointment">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="header-top">
                                            <h5 class="m-0">@if(canEditLang() && checkRequestOnEdit())
                                                    <editor_block data-name='Popularity by country' contenteditable="true">{{ __('Popularity by country') }}</editor_block>
                                                @else {{ __('Popularity by country') }}@endif</h5>
                                        </div>
                                    </div>
                                    <div class="card-Body">
                                        <div class="radar-chart">
                                            <div id="vmap" style="width:100%; height:356px;"></div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-dark">
                                        <div class="d-flex align-items-center">
                                            <img class="d-inline-block jqvmap-country-flag mr-3" alt="flag" src="/adminos/img/flag-icon-css/flags/4x3/us.svg" style="width:55px; height: auto;">
                                            <h6 class="d-inline-block fw-100 m-0 text-white">
                                                @if(canEditLang() && checkRequestOnEdit())
                                                    <editor_block data-name='Popularity by country' contenteditable="true">{{ __('Popularity by country') }}</editor_block>
                                                @else {{ __('Popularity by country') }}@endif:
                                                <small class="jqvmap-country">США - {{ $countries_stat['США'] ?? 0 }}</small>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header pb-3">
                                        <h5>@if(canEditLang() && checkRequestOnEdit())
                                                <editor_block data-name='Videos' contenteditable="true">{{ __('Videos') }}</editor_block>
                                            @else {{ __('Videos') }}@endif</h5>
                                    </div>
                                    <div class="card-body pt-3 pb-3">
                                        <div class="tabs-container">
                                            <ul class="nav nav-tabs mertial-tab">
                                                <li class="nav-item">
                                                    <a class="nav-link active" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif data-toggle="tab" href="#pills-darkhome-tab">
                                                        <i class="icofont icofont-ui-note"></i>
                                                        @if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Feed' contenteditable="true">{{ __('Feed') }}</editor_block>
                                                        @else {{ __('Feed') }}@endif
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif data-toggle="tab" href="#pills-darkprofile-tab">
                                                        <i class="icofont icofont-upload-alt"></i>
                                                        @if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Upload' contenteditable="true">{{ __('Upload') }}</editor_block>
                                                        @else {{ __('Upload') }}@endif
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="pills-darkhome-tab" class="tab-pane active">
                                                    <div class="panel-body">
                                                        <div class="tab-pane fade active show" id="pills-darkhome" role="tabpanel" aria-labelledby="pills-darkhome-tab">
                                                            <ul class="dashboard-video-list">
                                                                @if($users_videos !== null)
                                                                    @forelse($users_videos as $users_video)
                                                                        <li class="mb-3" style="background: #fafafa; padding: 15px">
                                                                            <div class="mb-3">
                                                                                <img src="{{  $users_video->user->avatar ? route('accountPanel.profile.get.avatar',$users_video->user->id) : asset('accountPanel/images/user/user.png')  }}" alt="" width="40" height="40" style="-webkit-border-radius: 50%;-moz-border-radius: 50%;border-radius: 50%;">
                                                                                {{ $users_video->user->login ?? '' }}</div>
                                                                            {!! htmlspecialchars_decode($users_video->link) !!}
                                                                        </li>
                                                                    @empty
                                                                        <li class="mb-3" style="background: #fafafa; padding: 15px">
                                                                            @if(canEditLang() && checkRequestOnEdit())
                                                                                <editor_block data-name='Nothing added' contenteditable="true">{{ __('Nothing added') }}</editor_block>
                                                                            @else {{ __('Nothing added ') }}@endif
                                                                        </li>
                                                                    @endforelse
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="pills-darkprofile-tab" class="tab-pane">
                                                    <div class="panel-body">
                                                        <form method="post" action="{{ route('accountPanel.dashboard.store.user.video') }}">
                                                            @csrf
                                                            <div class="input-group mb-4">

                                                                <span class="input-group-text"><i class="icofont icofont-link"></i></span>
                                                                <input class="form-control" name="video" value="{{ old('video') ?? '' }}" type="text" placeholder="Ссылка на видео" aria-label="">
                                                            </div>
                                                            <button class="btn btn-primary m-r-15" type="submit" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>@if(canEditLang() && checkRequestOnEdit())
                                                                    <editor_block data-name='Send' contenteditable="true">{{ __('Send') }}</editor_block>
                                                                @else {{ __('Send') }}@endif</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 risk-col ">
                                <div class="card total-users">
                                    <div class="card-header card-no-border pb-3 pt-3">
                                        <h5>@if(canEditLang() && checkRequestOnEdit())
                                                <editor_block data-name='Transfer' contenteditable="true">{{ __('Transfer') }}</editor_block> @else {{ __('Transfer') }} @endif
                                        </h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <form action="{{ route('accountPanel.dashboard.send.money') }}" method="post" class="send-money-to-user-form">
                                            @csrf
                                            <div class="apex-chart-container goal-status text-center">
                                                <div class="rate-card">
                                                    <h6 class="mb-2 mt-2 f-w-400">@if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='User' contenteditable="true">{{ __('User') }}</editor_block> @else {{ __('User') }} @endif
                                                    </h6>
                                                    <div class="input-group mb-3">
                                                        <input class="form-control" type="text" name="user" value="{{ old('user') ?? '' }}">
                                                    </div>
                                                    <h6 class="mb-2 mt-2 f-w-400">@if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Enter the amount' contenteditable="true">{{ __('Enter the amount') }}</editor_block> @else {{ __('Enter the amount') }} @endif
                                                    </h6>
                                                    <div class="input-group mb-3">
                                                        <input class="form-control" type="text" name="amount" value="{{ old('amount') ?? '' }}">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <select class="form-select form-control" name="wallet_id">
                                                            <option value="" disabled selected hidden>
                                                                Выберите баланс аккаунта
                                                            </option>
                                                            @forelse($wallets as $items)
                                                                @foreach($items as $wallet)
                                                                    <option value="{{ $wallet->id }}" @if(old('wallet_id') == $wallet->id) selected="selected" @endif>{{ $wallet->currency->name }} - {{ $wallet->balance }}{{ $wallet->currency->symbol }}</option>
                                                                @endforeach
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                    <div class="form-check checkbox mb-3">
                                                        <input class="form-check-input" id="checkbox3" type="checkbox">
                                                        <label class="form-check-label" for="checkbox3">
                                                            @if(canEditLang() && checkRequestOnEdit())
                                                                <editor_block data-name='Do insurance 1' contenteditable="true">{{ __('Do insurance 1') }}</editor_block>
                                                            @else
                                                                {{ __('Do insurance 1') }}
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <button class="btn btn-lg btn-primary btn-block send-money-to-user-btn" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>@if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Do transfer' contenteditable="true">{{ __('Do transfer') }}</editor_block> @else {{ __('Do transfer') }} @endif
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 risk-col ">
                                <div class="card height-equal">
                                    <div class="card-header">
                                        <h5>@if(canEditLang() && checkRequestOnEdit())
                                                <editor_block data-name='Моя мотивация' contenteditable="true">{{ __('Моя мотивация') }}</editor_block> @else {{ __('Моя мотивация') }} @endif
                                        </h5>
                                    </div>
                                    <div class="card-body mb-2">
                                        <div class="d-flex justify-content-center">
                                            <ul class="pin-board" id="draggablePanelList">
                                                    <li class="pin-board-info" id="sticker_{{ $userSticker->id }}">
                                                        <div class="change-color sticker-wrap bg-info">
                                                            <small class="pull-right editable editable-click date" data-type="text" data-placement="right" style="padding-top: 2px;">
                                                                <i class="far fa-clock"></i> {{ $userSticker->updated_at->format('Y-m-d H:i') }}
                                                            </small>
                                                            <h4 class="editable editable-click pin-board-title  mt-5" data-type="text" data-field="title" data-placement="right" data-title="Введите заголовок">{{ $userSticker->title }}</h4>
                                                            <p data-type="textarea" data-pk="1" data-field="description" data-placeholder="Ваше сообщение здесь" data-title="Введите сообщение" class="editable editable-pre-wrapped editable-click pin-board-text pin-board-message change-color">{{ $userSticker->description }}</p>
                                                        </div>
                                                    </li>
                                            </ul>
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
        var primary = localStorage.getItem("primary") || '#7366ff';
        var secondary = localStorage.getItem("secondary") || '#f73164';

        window.CubaAdminConfig = {
            // Theme Primary Color
            primary: primary,
            // theme secondary color
            secondary: secondary,
        };
    </script>

    <script src="{{ asset('accountPanel/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('accountPanel/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('accountPanel/js/chart/apex-chart/chart-custom.js') }}"></script>
    <script src="{{ asset('adminos/plugins/google-charts/loader.js') }}"></script>

    <script src="{{ asset('accountPanel/js/dashboard/default.js') }}"></script>

    <script src="{{ asset('adminos/plugins/jqvmap/js/jquery.vmap.js') }}"></script>
    <script src="{{ asset('adminos/plugins/jqvmap/js/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('adminos/plugins/jqvmap/js/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('adminos/plugins/sparkline/js/jquery.sparkline.min.js') }}"></script>

    <script src="{{ asset('adminos/plugins/amcharts/amcharts.js') }}"></script>
    <script src="{{ asset('adminos/plugins/amcharts/serial.js') }}"></script>

    <script src="{{ asset('adminos/plugins/amcharts/serial.js') }}"></script>
    <script src="{{ asset('adminos/plugins/knob/jquery.knob.js') }}"></script>

    <script src="{{ asset('adminos/plugins/chartJS/js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('adminos/plugins/chartJS/js/utils.js') }}"></script>
    <script>

        var config = {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'dataset - big points',
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()
                    ],
                    backgroundColor: '#DC3545',
                    borderColor: '#DC3545',
                    fill: false,
                    borderDash: [5, 5],
                    pointRadius: 15,
                    pointHoverRadius: 10,
                }, {
                    label: 'dataset - individual point sizes',
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()
                    ],
                    backgroundColor: '#28A745',
                    borderColor: '#28A745',
                    fill: false,
                    borderDash: [5, 5],
                    pointRadius: [2, 4, 6, 18, 0, 12, 20],
                }, {
                    label: 'dataset - large pointHoverRadius',
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()
                    ],
                    backgroundColor: '#17A2B8',
                    borderColor: '#17A2B8',
                    fill: false,
                    pointHoverRadius: 30,
                }, {
                    label: 'dataset - large pointHitRadius',
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()
                    ],
                    backgroundColor: '#FFC107',
                    borderColor:  '#FFC107',
                    fill: false,
                    pointHitRadius: 20,
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
                hover: {
                    mode: 'index'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                },
                title: {
                    display: true
                }
            }
        };

        window.onload = function () {
            var ctx = document.getElementById('canvas').getContext('2d');
            window.myLine = new Chart(ctx, config);
        };

        $(".dial").knob();

        let $walletsStats = @json($walletsStats);

        $(".sparkline").each((key, item) => {
            let chart = $(item);

            chart.sparkline($walletsStats[chart.data('wallet_id')], {
                type: 'bar',
                barWidth: 4,
                height: '40px',
                barColor: '#fff',
                barSpacing: '5px',
                negBarColor: '#fff',
                width: '100%',
            });
        })

        AmCharts.makeChart("visitor", {
            type: "serial",
            hideCredits: !0,
            theme: "light",
            dataDateFormat: "YYYY-MM-DD",
            precision: 2,
            valueAxes: [{
                id: "v2",
                title: "Доходност",
                gridAlpha: 0,
                position: "right",
                autoGridCount: !1
            }],
            graphs: [ {
                id: "g1",
                valueAxis: "v2",
                bullet: "round",
                bulletBorderAlpha: 1,
                bulletColor: "#FFFFFF",
                bulletSize: 5,
                hideBulletsCount: 50,
                lineThickness: 2,
                lineColor: "#0df3a3",
                type: "smoothedLine",
                title: "Прибыль",
                useLineColorForBulletBorder: !0,
                valueField: "replenishment",
                balloonText: "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
            }, {
                id: "g2",
                valueAxis: "v2",
                bullet: "round",
                bulletBorderAlpha: 1,
                bulletColor: "#FFFFFF",
                bulletSize: 5,
                hideBulletsCount: 50,
                lineThickness: 2,
                lineColor: "#fe5d70",
                dashLength: 5,
                title: "Выводы",
                useLineColorForBulletBorder: !0,
                valueField: "withdrawals",
                balloonText: "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
            }],
            chartCursor: {
                pan: !0,
                valueLineEnabled: !0,
                valueLineBalloonEnabled: !0,
                cursorAlpha: 0,
                valueLineAlpha: .2
            },
            categoryField: "date",
            categoryAxis: {
                parseDates: !0,
                dashLength: 1,
                minorGridEnabled: !0
            },
            legend: {
                useGraphSettings: !0,
                position: "top"
            },
            balloon: {
                borderThickness: 1,
                cornerRadius: 5,
                shadowAlpha: 0
            },
            dataProvider: @json($userYieldChartData)
        });

        let countriesStat = @json($countries_stat);

        $(document).ready(function() {
            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#00b3b3',
                hoverOpacity: 0.7,
                selectedColor: '#FFC107',
                enableZoom: true,
                showTooltip: true,
                values: data_array,
                scaleColors: ['#F8AC59', '#28A745'],
                normalizeFunction: 'polynomial',
                onRegionClick: function(element, country_code, country)
                {
                    world_countries.map(item => {
                        if(item.alpha2 === country_code || item.alpha3 === country_code) {
                            country = item.ru
                        }
                    })
                    $('.jqvmap-country-flag').attr('src', '/adminos/img/flag-icon-css/flags/4x3/' + country_code.toLowerCase() + '.svg');
                    $('.jqvmap-country').html(country + ' - ' + countriesStat[country].count.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                }
            });
        });


        $(".send-money-to-user-btn").on('click', function (e) {
            e.preventDefault();
            swal({
                title: "Вы подтверждаете?",
                text: "С вашего баланса будут списаны денежные средства!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        //create-deposit-form
                        $(".send-money-to-user-form").submit();
                        swal("Подождите немного!", {
                            icon: "success",
                        });
                    }
                });
        });
    </script>
    <script>
        $(document).ready(function () {
            var options = {
                series: [{
                    name: 'Начислено, $',
                    data: [@foreach($accruals_week as $item) {{ number_format($item, 2, '.', '') }}@if(!$loop->last), @endif @endforeach]
                }, {
                    name: 'Выведено, $',
                    data: [@foreach($withdraws_week as $item) {{ number_format($item, 2, '.', '') }}@if(!$loop->last), @endif @endforeach]
                }],
                chart: {
                    height: 240,
                    type: 'area',
                    toolbar: {
                        show: true
                    },
                },
                dataLabels: {
                    enabled: true
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    type: 'period',
                    low: 0,
                    offsetX: 0,
                    offsetY: 0,
                    show: true,
                    categories: [@foreach($period_graph as $period) "{{ $period['start']->format('d.m.Y') }}", @endforeach],
                    labels: {
                        low: 0,
                        offsetX: 0,
                        show: false,
                    },
                    axisBorder: {
                        low: 0,
                        offsetX: 0,
                        show: true,
                    },
                },
                markers: {
                    strokeWidth: 3,
                    colors: "#ffffff",
                    strokeColors: [CubaAdminConfig.primary, CubaAdminConfig.secondary],
                    hover: {
                        size: 6,
                    }
                },
                yaxis: {
                    low: 0,
                    offsetX: 0,
                    offsetY: 0,
                    show: false,
                    labels: {
                        low: 0,
                        offsetX: 0,
                        show: true,
                    },
                    axisBorder: {
                        low: 0,
                        offsetX: 0,
                        show: true,
                    },
                },
                grid: {
                    show: true,
                    padding: {
                        left: 0,
                        right: 0,
                        bottom: -15,
                        top: -40
                    }
                },
                colors: ['#51bb25', CubaAdminConfig.secondary], // CubaAdminConfig.primary
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.7,
                        opacityTo: 0.5,
                        stops: [0, 80, 100]
                    }
                },
                legend: {
                    show: false,
                },
                tooltip: {
                    x: {
                        format: 'MM'
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart-currently"), options);
            chart.render();
        });
    </script>
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
    <script src="{{ asset('adminos/plugins/bootstrap4-editable/js/bootstrap-editable.js') }}"></script>
    <script>
        $(function () {
            let stickerID = 0;
            let text_color = null;
            let sticker_color = null;

            let $sticker = null;

            $('.settings').on('click', function(){
                let modal = $('#settingsModal');

                stickerID = $(this).data('sticker_id');

                text_color = $(this).data('text_color');
                sticker_color = $(this).data('sticker_color');

                modal.find('#textColor').val(text_color);
                modal.find('#stickerColor').val(sticker_color);

                $sticker = $('#sticker_' + stickerID)
            });

            let field = null;

            $('.editable').click(function () {
                stickerID = $(this).closest('.pin-board-info').attr('id').replace('sticker_', '')
                field = $(this).data('field');
            });

            $(document).on('click', '.editable-submit', function () {
                let data = {};

                data['field'] = field;
                data[field] = field !== 'description' ? $('.editable-input input').val() : $('.editable-input .input-large').val();
                data['_token'] = $('meta[name="csrf-token"]').attr('content')

                console.log(data, field)

                $.ajax({
                    method: 'post',
                    url: '/stickers/update/' + stickerID,
                    data: data,
                    dataType: 'json',
                    success: (response) => {
                        (new PNotify({
                            type: response.success ? 'success' : 'error',
                            text: response.message,
                        })).get();
                    },
                    error: (xhr) => {
                        (new PNotify({
                            type: 'error',
                            text: 'Неизвестная ошибка',
                        })).get();

                        return false;
                    }
                })
            })


            $('.pin-board-title').editable({});
            $('.pin-board-message').editable({});
        })
    </script>
@endpush
